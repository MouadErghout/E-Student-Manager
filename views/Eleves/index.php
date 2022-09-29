<?php
if(isset($_SESSION['Admin'])) {
    header('location: ../../Admins');
}

if(isset($_SESSION['Responsable_filieres'])) {
    header('location: ../../Responsable_filieres');
}

if(isset($_SESSION['Eleves'])){
    if($_SESSION['Eleves']==$data->login){
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
    <?php }}else{
            Eleves::redirect('Eleves/login');
    }
    ?>
</center>
