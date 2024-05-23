
<?php
//on redirige vers la page d'accueil
if (isset($_SESSION['user'])) header("Location: vue/pAccueil_connecté.php");
else{
    header("Location: vue/pAccueil.php");

}

?>
