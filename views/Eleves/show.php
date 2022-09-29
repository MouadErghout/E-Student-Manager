<?php
if(isset($_SESSION['Admins'])) {
    header('location: ../../Admins');
}

if(isset($_SESSION['Responsable_filieres'])) {
    header('location: ../../Responsable_filieres');
}

if(isset($_SESSION['Eleves']))
if($_SESSION['Eleves']==$data[0]->login){
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
        Eleves::redirect('Eleves/login');
    }
    ?>

</center>


