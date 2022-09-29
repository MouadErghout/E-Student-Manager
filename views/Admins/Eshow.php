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
    <h1>Le Relevé de note 2021/2022</h1>
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
            <th>Filière</th><td><?=$data->code_fil ?></td>
        </tr>
        <tr>
            <th>Login</th> <td><?=$data->login ?></td>
        </tr>
    </table>
    <?php }else{
        Admins::redirect('../login');
    }
    ?>

</center>
