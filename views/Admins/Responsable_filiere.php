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
    <h1>La liste des responsables des filieres </h1>
    <table border="1">
        <tr>
            <th> ID </th>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Département </th>
            <th> Filière </th>
            <th> Login </th>
            <th colspan="3"><a href="Rcreate">Ajouter</a> </th>
        </tr>
        <?php
        foreach ($data as $E)
        {?>
            <tr>
                <td><?=$E->id ?></td>
                <td><?=$E->nom ?></td>
                <td><?=$E->prenom ?></td>
                <td><?=$E->departement?></td>
                <td><?=$E->code_fil?></td>
                <td><?=$E->login?></td>


                <td> <a href="Rdestroy/<?=$E->login?>"> delete </a> </td>
                <td> <a href="Redit/<?=$E->login?>"> edit </a> </td>
                <td> <a href="Rshow/<?=$E->login?>"> show </a> </td>
            </tr>
        <?php  } ?>
    </table>
    <a href="logout"> logout </a>
    <?php }else {
            Admins::redirect('Admins/login');
        }
        ?>
</center>


