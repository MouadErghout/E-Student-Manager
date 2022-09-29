<?php
if(isset($_SESSION['Resonsable_filieres'])) {
    header('location: ../../Admins');
}

if(isset($_SESSION['Eleves'])) {
    header('location: ../../Eleves');
}

if(isset($_SESSION['Admins'])) {

?>
<center>
    <h1> Formulaire <?=$data==null?"d'insertion":"de modification"?> </h1>
    <form action="<?=$data==null?"Estore":"../Eupdate/".$data->login?>" method="post">
        <table>
            <?php
            if($data==null){
            ?>
            <tr>
                <td>Login</td>
                <td><input type="text" name="login" value=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value=""></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><input type="text" name="type" value=""></td>
            </tr>
            <?php }else{
            ?>
            <tr>
                <td>Login</td>
                <td><input type="text" name="login" value="<?=$data!=null?$data->login:""?>"></td>
            </tr>
            <?php }?>
            <tr>
                <td>Code</td>
                <td><input type="text" name="code" value="<?=$data!=null?$data->code:""?>"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" value="<?=$data!=null?$data->nom:""?>"></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td> <input type="text" name="prenom" value="<?=$data!=null?$data->prenom:""?>"></td>
            </tr>
            <tr>
                <td>Niveau</td>
                <td><input type="text" name="niveau" value="<?=$data!=null?$data->niveau:""?>"></td>
            </tr>
            <tr>
                <td>Filière</td>
                <td><input type="text" name="code_fil" value="<?=$data!=null?$data->code_fil:""?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Annuler"></td>
            </tr>
        </table>
    </form>
    </table>
    <?php if($data==null){?>
          <a href="logout"> logout </a>
    <?php }else{ ?>  <a href="../logout"> logout </a> <?php } ?>
</center>
    <?php }else{
        Admins::redirect('login');
    }
    ?>
