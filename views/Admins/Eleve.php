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
    <h1> <?= "La liste des eleves niveau ".$data[0]->niveau ?></h1>
    <table border="1">
        <tr>
            <th> ID </th>
            <th> Code </th>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Niveau </th>
            <th> Filière </th>
            <th> Login </th>
            <th colspan="3"><a href="../Ecreate">Ajouter</a> </th>
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
                <td> <a href="../Edestroy/<?=$E->login?>"> delete </a> </td>
                <td> <a href="../Eedit/<?=$E->login?>"> edit </a> </td>
                <td> <a href="../Eshow/<?=$E->login?>"> show </a> </td>
            </tr>
    <?php  } ?>
    </table>
    <table><tr><th><h4><?="La moyenne de ".$data[0]->niveau." est : ".$_SERVER[$data[0]->niveau]?>  </h4></th></tr></table>    <table border="1">
<a href="../logout"> logout </a>
</center>

<?php }else{
        Admins::redirect('login');
    }
?>


