<?php
// Check if there is a login.
if(isset($_SESSION['Admins'])) {
    include_once ROOT.'controllers/Admins.php';
    header('location: ../Admins');
}
if(isset($_SESSION['Eleves'])) {
    include_once ROOT.'controllers/Eleves.php';
    header('location: ../Eleves');
}

if(isset($_SESSION['Responsable_filieres'])){
    header("Location: Responsable_filieres");
}else{
?>
<form
        id="admin_form"
        class="login_form"
        action="signin/"
        method="POST"
>
    <div class="center">
        <p> Connectez-vous à votre compte responsable filiere </p>
        <input
                type="text"
                name="login"
                placeholder="CIN ou Utilisateur"
                required
        /><br/>
        <input
                type="password"
                name="password"
                placeholder="Mot de passe"
                autocomplete="on"
                required
        /><br />
        <button type="submit" name="controller" value="Responsable_filieres">Login</button>
    </div>
</form>
</div>
</body>

</html>
<?php } ?>