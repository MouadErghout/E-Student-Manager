<?php

abstract class Controller
{
    public function __construct($model)
    {
        include_once ROOT.'models/'.$model.'.php';
    }

    public function view($fichier, $data=null)
    {
        include_once  ROOT."views/".get_class($this)."/$fichier.php";
    }

    public function redirect($chemin)
    {
        header('Location:'.$chemin);
    }
    
    public function login()
    {
        $this->view("login");
    }

    public function signin($request="")
    {
        $class = substr(get_class($this), 0, -1);
        $c = get_class($this);
        include_once ROOT . 'models/' . $class . '.php';
        include_once ROOT . 'models/Eleve.php';
        $object = new $c;
        if (isset($_SESSION[$c])) {
            $object->redirect('../'.$c);
        }elseif( isset($request->login) && isset($request->password) ){
                $data=$class::login($request->login, $request->password);
                if($data!=false && $data['type']==$class){
                    // Set session
                    $_SESSION[$c] = $_POST['login'];
                    // Redirect.
                    //echo $_SESSION[$c];
                    $object->redirect('../../'.$c);
                }else{$c::redirect('../login');}
        }else
            $c::redirect('login');
        // Return to login.
    }

    public function logout()
    {
        $c=get_class($this);
        if(isset($_SESSION[$c])){
            session_unset();
            session_destroy();
            echo "session destroyed";
            header("location: ../");
        }
    }
}