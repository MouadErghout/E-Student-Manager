<?php
if(isset($_SESSION['Admins'])) {
    header('location: ../../Admins');
}

if(isset($_SESSION['Eleves'])) {
    header('location: ../../Eleves');
}

if(isset($_SESSION['Responsable_filieres'])) {
    ?>

    <center>
    <h1> <?= "La liste des eleves niveau ".$data[0]->niveau ?></h1>
    <table border="1">
        <tr>
            <th> ID </th>
            <th> Code </th>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Niveau </th>
            <th> Code filière </th>
            <th> Login </th>
        </tr>
        <?php
        foreach ($data as $E)
        {?>
            <tr>
                <td><?=$E->id ?></td>
                <td><?=$E->code ?></td>
                <td><?=$E->nom ?></td>
                <td><?=$E->prenom ?></td>
                <td><?=$E->niveau ?></td>
                <td><?=$E->code_fil ?></td>
                <td><?=$E->login ?></td>
                <td> <a href="../show/<?=$E->login?>"> show </a> </td>
            </tr>
        <?php  } ?>
    </table>
    <table><tr><th><h4><?="La moyenne de ".$data[0]->niveau." est : ".$_SERVER[$data[0]->niveau]?>  </h4></th></tr></table>
    <a href="../logout"> logout </a>
<?php }else{
    Responsable_filieres::redirect('Responsable_filieres/login');
}
?>

    </center>


<?php
