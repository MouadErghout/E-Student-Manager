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
                <td><?=$N->note ?></td>
                <td> <a href="../Nedit/<?=$N->login?>"> edit </a> </td>
            </tr>
        <?php } ?>
    </table>
    <?php }else{
        Admins::redirect('../../login');
    }
    ?>

</center>

