<?php
if(isset($_SESSION['Resonsable_filieres'])) {
    header('location: ../../Resonsable_filieres');
}

if(isset($_SESSION['Eleves'])) {
    header('location: ../../Eleves');
}

if(isset($_SESSION['Admins'])) {

?>

<center>
    <h1> Formulaire de modification </h1>
    <form action="<?= "../Nupdate/".$data[0]->login?>" method="post">
        <table border="1">
            <tr>
                <th> Code élément de module </th>
                <th> Designation </th>
                <th> Note/20 </th>
            </tr>
            <?php
            //$data=(array)$data;
            foreach ($data as $N)
            {?>
                <tr>
                    <td><?=$N->code_elm_module ?></td>
                    <td><?=$N->designation ?></td>
                    <td><input type="text" name="<?=$N->code_elm_module?>" value="<?=$N->note?>"></td>
                </tr>
            <?php } ?>
            <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Annuler"></td>
            </tr>
        </table>
    </form>
</center>

<?php }else{
    Admins::redirect('../../login');
}
?>

