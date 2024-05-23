<!DOCTYPE html lang="fr">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="../css/pInscription_style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap">
    </head>
<body>
    <div class="header_div">
        <a href="pConnexion.php" class="inscription_link">connexion</a>
        <h1 class="title">Blog de Partage</h1>
        <img src="logo.png" alt="logo" class="logo">
   </div>
    <form action="../controller/userController.php" method="post">
        <div class="inscription_div">
            <p class="inscription_text">Formulaire d'Inscription</p>
            <label type="text" class="label1">Nom d'utilisateur :</label>
            <input type="text" name="username" class="pseudo" required>
            <label for="text" class="label2">Mot de passe :</label>
            <input type="password" name="password1" class="mdp" required>
            <label for="text" class="label3">Confirmer le mot de passe :</label>
            <input type="password" name="password2" class="mdp2" required>
            <label for="text" class="label4">Adresse mail :</label>
            <input type="email" name="email" class="mail" required>
            <label for="text" class="label5">Question secrete :</label>
            <input type="text" name="questionSecrete" class="question" required>
            <label for="text" class="label6">Reponse :</label>
            <input type="text" name="reponseSecrete" class="reponse" required>
            <a href="pConnexion.php" class="form_link">Déjà un compte ? connectez-vous.</a>
            <input type="submit" value="S'inscrire" name="bInscription" class="submit">
        </div>
    </form>
    <div class="footer_div">
        <p class="footer_text">© 2024 Blog de Partage</p>
        <img src="logo.png" alt="logo" class="footer_logo">
    </div>
</body>

