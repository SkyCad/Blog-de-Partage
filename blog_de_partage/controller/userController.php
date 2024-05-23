<?php
/*
L'ensemble des fonctions se trouvent dans le dossier model fichier "userModel.php"
*/
session_start();
//On récupère notre model avec toutes les fonctions
require('../model/userModel.php');

// Si le bouton inscription à été envoyé OU le bouton édition à été envoyé
if (isset($_POST['bInscription']) || isset($_POST['bEditUserData'])) {
    //Récupération des données du formulaire
    $email = htmlspecialchars(trim($_POST['email']));
    $username = htmlspecialchars(strtolower(trim($_POST['username'])));
    $password1 = htmlspecialchars(trim($_POST['password1']));
    $password2 = htmlspecialchars(trim($_POST['password2']));
    $questionSercrete = htmlspecialchars(trim($_POST['questionSecrete']));
    $reponseSecrete = htmlspecialchars(trim($_POST['reponseSecrete']));
    //Si les données récupérés ne sont pas vides
    if (!empty($email) && !empty($username)) {
        //Si le mot de passe et la confirmation correspondent
        if ($password1 === $password2) {
            // Si le mot de passe n'est pas vide lors de l'inscription
            if (!empty($password1) && isset($_POST['bInscription'])) {
                // On crypte le mot de passe reçu
                $password1 = md5($password1);
                // On transmet à la fonction "insertdata" les données à introduire en base de données, si l'inscription a rencontré un problème, on envoi un message a l'utilisateur
                $message = insertData($email, $username, $password1, $questionSercrete, $reponseSecrete);
                if (isset($message)) {
                    //On transmet le message par l'url avec la redirection
                    header("Location: ../vue/pInscription.php?message=" . $message);
                    exit;
                }
                //On redirige et transmet à l'utilisateur la réussite de l'inscription
                header("Location: ../vue/pConnexion.php?success");
                exit;
                // Sinon ce n'est pas une inscription, c'est une modification des données d'un utilisateur déjà inscrit
            } else {
                // SI le mot de passe est vide on récupère son mot de passe dans la session
                if (empty($password1)) {
                    $password1 = $_SESSION['user']['password'];
                }
                //On récupère l'id de l'utilisateur dans la session
                $id = $_SESSION['user']['ID'];
                // On transmet les données à la fonction update (Si la fonction s'est correctement déroulée, on entre dans la condition)
                if (update($id, $email, $username, $password1)) {
                    // On détruit l'ancienne session
                    session_destroy();
                    // On démarre une session 
                    session_start();
                    // On récupère les données de l'utilisateur grâce a la fonction login (qui permet de créer une session avec les données utilisateur)
                    login($username, $password);
                    // On redirige vers l'accueil avec un message de réussite
                    header("Location: ../vue/pAccueil.php?success");
                    exit;
                } else {
                    // On redirige vers l'inscription avec un message d'erreur
                    header("Location: ../vue/pInscription.php?error");
                    exit;
                }
            }
            //Si les mots de passes ne correspondent pas, on indique le message dans la variable message
        } else {
            $message = "Les mots de passes ne correspondent pas.";
        }
        echo $message;
    }
    // Si l'utilisateur a appuyer sur le bouton connexion
} else if (isset($_POST['bConnexion'])) {
    //On récupère le login et le mdp
    $username = htmlspecialchars(strtolower(trim($_POST['login'])));
    $password = md5(htmlspecialchars(trim($_POST['password'])));
    // On appelle la fonction login
    login($username, $password);
    // On le redirige vers l'accueil
    header("Location: ../vue/pAccueil_connecté.php");
    exit;
    // Si l'utilisateur a appuyer sur le bouton modifier ses données
} else if (isset($_POST['bEditUser'])) {
    header("Location: ../vue/pInscription.php");
    exit;
    // Si l'utilisateur a appuyer sur le bouton deconnexion
} else if (isset($_POST['bDeconnect'])) {
    //On appelle la fonction déconnexion qui
    logout();
    header("Location: ../index.php");
    exit;
    //Si on supprime l'utilisateur
} 

