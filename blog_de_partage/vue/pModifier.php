<!DOCTYPE html lang="fr">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="../css/pModifier_style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap">
    </head>
<body>
    <div class="header_div">
        <a href="pAccueil.php" class="inscription_link">retour page accueil</a>
        <h1 class="title">Blog de Partage</h1>
        <img src="logo.png" alt="logo" class="logo">
   </div>
    <form action="pInscription.php" method="post">
        <div class="inscription_div">
            <p class="inscription_text">Formulaire de changement de mot de passe</p>
            <label type="text" class="label1">Nouveau mot de passe :</label>
            <input type="text" name="pseudo" class="pseudo" required>
            <label type="text" class="label2">Confirmation nouveau Mot de passe :</label>
            <input type="password" name="mdp" class="mdp" required>
            <label type="text" class="label3">Réponse question secrete :</label>
            <input type="text" name="reponse" class="reponse" required>
            <a href="pModifier.php" class="form_link">Oublié son mot de passe ?</a>
            <input type="submit" value="Connexion" name="bvalider" class="submit">
        </div>
    </form>
    <div class="footer_div">
        <p class="footer_text">© 2024 Blog de Partage</p>
        <img src="logo.png" alt="logo" class="footer_logo">
    </div>
</body>

