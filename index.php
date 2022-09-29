<?php
$chemin=substr($_SERVER['SCRIPT_FILENAME'],0,-9);
define("ROOT",$chemin);

//chargement du modele et du controleur principal

include_once ROOT.'models/Model.php';
include_once ROOT.'controllers/Controller.php';
require_once 'index.css';


$url=$_GET['url'];
session_start();
//echo $url."<br>";
$login="";
$infos_url=explode("/",$url);
if($infos_url[0]!="") {
    if (file_exists(ROOT . 'controllers/' . $infos_url[0] . '.php')) //verifier si le controleur
    {                                                                    //specifique existe.
        include_once ROOT . 'controllers/' . $infos_url[0] . '.php'; //charger le controlleur specifique
        $controlleur = new $infos_url[0](); //creer une instance de type du controlleur

        $action = "index";//action par defaut
        if (isset($infos_url[1]))                // verifier s'il y a une action
            $action = $infos_url[1];             //initialiser l'action
        if (method_exists($controlleur, $action))// l'action n'est qu'une methode, verifions alors si ce controlleur dispose de cette methode
        {

            $request = null;
            if (isset($infos_url[2]))
                $login = $infos_url[2];

            if (!empty($_POST)) {
                $request = new stdClass();
                foreach ($_POST as $key => $value)
                    $request->$key = $value;
            }
            if ($request != null)
                if ($login != "")
                    $controlleur->$action($login, $request);//update
                else
                    $controlleur->$action($request);//store gestion signin
            else
                if ($login == "")
                    $controlleur->$action();// login index
                else
                    $controlleur->$action($login);//destroy and edit and show

        }else
            echo "URL introuvable !";
    } else
        echo "URL introuvable !";
}else{
        ?>
        <div >
            <h1 class="btn-div"><a href="Responsable_filieres">Se connecter entant que Responsable</a></h1>
            <h1><a href="Admins">Se connecter entant qu'Administrateur</a></h1>
            <h1><a href="Eleves">Se connecter entant qu'Etudiant</a></h1>
        </div>
        <?php

}

//include_once ROOT.'views/public/footer.php';

?>