<?php
if(isset($_SESSION['Admin'])) {
    header('location: ../../Admins');
}

if(isset($_SESSION['Eleve'])) {
    header('location: ../../Eleves');
}

if(isset($_SESSION['Responsable_filieres'])) {

?>
<center>
    <table>
        <tr>
            <th>ID</th><td><?=$data->id?> </td></td>
        </tr>
        <tr>
            <th>code_elv</th><td><?=$data->code?> </td></td>
        </tr>
        <tr>
            <th>Nom</th><td><?=$data->nom?> </td></td>
        </tr>
        <tr>
            <th>Prénom</th><td><?=$data->prenom ?></td>
        </tr>
        <tr>
            <th>Niveau</th><td><?=$data->niveau ?></td>
        </tr>
        <tr>
            <th>Filiere</th><td><?=$data->code_fil ?></td>
        </tr>
        <tr>
            <th>Login</th> <td><?=$data->login ?></td>
        </tr>
    </table>
    <?php }else{
        Responsable_filieres::redirect('../login');
    }
    ?>
</center>
