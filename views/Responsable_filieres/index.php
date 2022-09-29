<?php
if(isset($_SESSION['Admins'])) {
    header('location: ../Admins');
}

if(isset($_SESSION['Eleves'])) {
    header('location: ../Eleves');
}

if(isset($_SESSION['Responsable_filieres'])) {
    ?>
    <center>

        <table>
            <tr>
                <th><h3>Nom</h3></th><td><?=$data->nom?> </td></td>
            </tr>
            <tr>
                <th><h3>Prénom</h3></th><td><?=$data->prenom ?></td>
            </tr>
            <tr>
                <th><h3>Département</h3></th><td><?=$data->departement ?></td>
            </tr>
            <tr>
                <th><h3>Filière</h3></th><td><?=$data->code_fil ?></td>
            </tr>
            <tr>
                <th><h3>Login</h3></th> <td><?=$data->login ?></td>
            </tr>
        </table>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Responsable_filieres/Niveau/".$data->code_fil."1"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Responsable_filieres"><?= $data->code_fil."1"?></button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Responsable_filieres/Niveau/".$data->code_fil."2"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves"><?= $data->code_fil."2"?></button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Responsable_filieres/Niveau/".$data->code_fil."3"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves"><?= $data->code_fil."3"?></button>
            </div>

        </form>
        <a href="Responsable_filieres/logout"> logout </a>
    </center>

<?php }else {
    Responsable_filieres::redirect('Responsable_filieres/login');
}
?>
