<?php
if(isset($_SESSION['Responsable_filieres'])) {
    header('location: ../../Responsable_filieres');
}

if(isset($_SESSION['Eleves'])) {
    header('location: ../../Eleves');
}

if(isset($_SESSION['Admins'])) {
?>
<center>
    <table>
        <tr>
            <th>ID</th><td><?=$data->id?> </td></td>
        </tr>
        <tr>
            <th>Nom</th><td><?=$data->nom?> </td></td>
        </tr>
        <tr>
            <th>Prénom</th><td><?=$data->prenom ?></td>
        </tr>
        <tr>
            <th>Département</th><td><?=$data->departement ?></td>
        </tr>
        <tr>
            <th>Filière</th><td><?=$data->code_fil ?></td>
        </tr>
        <tr>
            <th>Login</th> <td><?=$data->login ?></td>
        </tr>
    </table>
    <a href="../../Admins/Rgestion"> Lister</a>

</center>

<?php }else {
        Admins::redirect('Admins/login');
    }
    ?>
