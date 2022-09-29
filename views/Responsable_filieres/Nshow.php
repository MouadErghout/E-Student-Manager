<?php
if(isset($_SESSION['Admins'])) {
    header('location: ../../Admins');
}

if(isset($_SESSION['Eleves'])) {
    header('location: ../../Eleves');
}

if(isset($_SESSION['Responsable_filieres'])  ) {
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
            </tr>
        <?php } ?>
    </table>

    <?php }else{
        Responsable_filieres::redirect('../login');
    }
    ?>

</center>

