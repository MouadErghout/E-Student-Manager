<?php
if(isset($_SESSION['Admin'])) {
    header('location: ../../Admins');
}

if(isset($_SESSION['Eleve'])) {
    header('location: ../../Eleves');
}

if(isset($_SESSION['Admins'])) {

?>
<form
        id="admin_form"
        class="login_form"
        action="Admins/Rgestion"
        method="POST"
>
    <div class="center">
        <button type="submit" name="view" value="Responsable_filieres">Gestion des Responsables des filieres</button>
    </div>

</form>
<form
         id="admin_form"
         class="login_form"
         action="Admins/Egestion"
         method="POST"
>
        <div class="center">
            <button type="submit" name="view" value="Eleves">Gestion des etudiants</button>
            <a href="Admins/logout"> logout </a>
        </div>

    </form>
<?php }else{
            Admins::redirect('Admins/login');
        }
        ?>
