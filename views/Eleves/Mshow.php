<?php
if(isset($_SESSION['Admins'])) {
    header('location: ../../Admins');
}

if(isset($_SESSION['Responsable_filieres'])) {
    header('location: ../../Responsable_filieres');
}

if(isset($_SESSION['Eleves'])) {
    ?>
    <center>
    <table border="1">
        <tr>
            <th> login </th>
            <th> code filière </th>
            <th> Niveau </th>
            <th> Moyenne </th>
        </tr>
        <tr>
            <td><?=$data->login?></td>
            <td><?=$data->code_fil ?></td>
            <td><?=$data->niveau ?></td>
            <td><?=$data->moyenne ?></td>
        </tr>
    </table>
        <a href="Eleves/logout"> logout </a>
<?php }else{
    Responsable_filieres::redirect('../login');
}
?>
</center>
