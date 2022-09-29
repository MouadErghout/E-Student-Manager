<?php
if(isset($_SESSION['Responsable_filieres'])) {
    header('location: ../Responsable_filieres');
}

if(isset($_SESSION['Eleves'])) {
    header('location: ../Eleves');
}

if(isset($_SESSION['Admins'])) {
    ?>
    <center>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GINF1"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Admins">GINF1</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GINF2"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">GINF2</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GINF3"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">GINF3</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GSTR1"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Admins">GSTR1</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GSTR2"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">GSTR2</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GSTR3"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">GSTR3</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GSEA1"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Admins">GSEA1</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GSEA2"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">GSEA2</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GSEA3"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">GSEA3</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GIL1"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Admins">GIL1</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GIL2"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">GIL2</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/GIL3"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">GIL3</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/G3EI1"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Admins">G3EI1</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/G3EI2"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">G3EI2</button>
            </div>

        </form>
        <form
                id="admin_form"
                class="login_form"
                action="<?="Niveau/G3EI3"?>"
                method="POST"
        >
            <div class="center">
                <button type="submit" name="view" value="Eleves">G3EI3</button>
            </div>

        </form>
        <a href="logout"> logout </a>
    </center>

<?php }else {
    Admins::redirect('Admins/login');
}
?>
