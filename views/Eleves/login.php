<?php
// Check if there is a login.
if(isset($_SESSION['Admins'])) {
    include_once ROOT.'controllers/Admins.php';
    header('location: ../Admins');
}
if(isset($_SESSION['Responsable_filieres'])){
    include_once ROOT.'controllers/Responsable_filieres.php';
    header('location: ../Responsable_filieres');
}

if(isset($_SESSION['Eleves'])) {
    header("Location: Eleves");
}else{
    ?>
    <form
            id="admin_form"
            class="login_form"
            action="signin/"
            method="POST"
    >
        <div class="center">
            <p> Connectez-vous à votre compte Eleve </p>
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
            <button type="submit" name="controller" value="Eleves">Login</button>
        </div>
    </form>
    </div>
    </body>

    </html>
<?php } ?>