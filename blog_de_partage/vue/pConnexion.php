<!DOCTYPE html lang="fr">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="../css/pConnexion_style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap">
    </head>
<body>
    <div class="header_div">
        <a href="pInscription.php" class="inscription_link">Inscription</a>
        <h1 class="title">Blog de Partage</h1>
        <img src="logo.png" alt="logo" class="logo">
   </div>
    <form action="../controller/userController.php" method="post">
        <div class="inscription_div">
            <p class="inscription_text">Formulaire de connexion</p>
            <label type="text" class="label1">Nom d'utilisateur :</label>
            <input type="text" name="login" class="pseudo" required>
            <label for="text" class="label2">Mot de passe :</label>
            <input type="password" name="password" class="mdp" required>
            <a href="pModifier.php" class="form_link">Oublié son mot de passe ?</a>
            <input type="submit" value="Connexion" name="bConnexion" class="submit">
        </div>
    </form>
    <div class="footer_div">
        <p class="footer_text">© 2024 Blog de Partage</p>
        <img src="logo.png" alt="logo" class="footer_logo">
    </div>
</body>

