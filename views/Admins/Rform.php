<center>
    <h1> Formulaire <?=$data==null?"d'insertion":"de modification"?> </h1>
    <form action="<?=$data==null?"Rstore":"../Rupdate/".$data->login?>" method="post">
        <table>
            <?php
            if($data==null){
                ?>
                <tr>
                    <td>Login</td>
                    <td><input type="text" name="login" value="" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="" required></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><input type="text" name="type" value="" required></td>
                </tr>
            <?php } ?>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" value="<?=$data!=null?$data->nom:""?>" required></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td> <input type="text" name="prenom" value="<?=$data!=null?$data->prenom:""?>" required></td>
            </tr>
            <tr>
                <td>Département</td>
                <td><input type="text" name="departement" value="<?=$data!=null?$data->departement:""?>" required></td>
            </tr>
            <tr>
                <td>Filière</td>
                <td><input type="text" name="code_fil" value="<?=$data!=null?$data->code_fil:""?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Envoyer"></td>
                <td><input type="reset" value="Annuler"></td>
            </tr>
        </table>
    </form>
</center>
