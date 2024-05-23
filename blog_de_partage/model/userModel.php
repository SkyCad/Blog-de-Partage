<?php
//on include le fichier de connexion à la base de données
include("dbConnect.php");

//Fonction insertion de données
function insertData($email,$username,$password,$question,$reponse){
    //Récupération de la connexion à la BDD
    global $bdd;
    $role = 0;
    //on prépare la requete pour l'insertion des données de connexion de l'utilisateur
    $querysql = "INSERT INTO users (mail,username,password,question_secrete,reponse_secrete) VALUES (:mmail,:username,:password,:question_secrete,:reponse_secrete)";
    //Prépare la requête SQL
    $stmtUserData = $bdd->prepare($querysql);
    //BindParam
    $stmtUserData->bindParam(":mail",$email);
    $stmtUserData->bindParam(":username",$username);
    $stmtUserData->bindParam(":password",$password);
    $stmtUserData->bindParam(":question",$question);
    $stmtUserData->bindParam(":reponse",$reponse);
    //Exécuter la requête SQL
    try{
        $stmtUserData->execute();
    }catch(PDOException $e){
        $message = "Une erreur s'est produite dans l'insertion.";
    }

    if(isset($message)){return $message;}
    //On récupère le dernier enregistrement
    $sqlLastUser = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
    $stmtUsers = $bdd->prepare($sqlLastUser);
    $stmtUsers->execute();
    // On récupère l'id du dernier enregistrement
    $idUsers = $stmtUsers->fetchColumn();
}

// Fonction de vérification avant connexion
function login($username,$password){
    //Récupération de la connexion à la BDD
    global $bdd;
    //Préparation de la requete qui permet de vérifier si l'utilisateur correspond à un utilisateur de base de données grâce a son username et password (vérification en bdd)
    $sqlUser = "SELECT * FROM `users`  WHERE username= :username AND password= :password";
    $stmtUsers = $bdd->prepare($sqlUser);
    $stmtUsers->bindParam(":username",$username);
    $stmtUsers->bindParam(":password",$password);
    try{
        $stmtUsers->execute();
     }catch(PDOException $e){
         $message = "Erreur 2";
     }
     //On récupère les données de la base de données dans un tableau
     $user = $stmtUsers->fetch();
     //On stock le tableau dans une variable session
     $_SESSION['user'] = $user;
}

// Fonction update, qui permet de mettre a jour les données en base de données
function update($id,$nom,$prenom,$email,$dateDeNaissance,$adresse,$username,$password){
    //Récupération de la connexion à la BDD
    global $bdd;
    //On prépare la requete qui permet de modifier les données de connexion de l'utilisateur
    $querysqlData = "UPDATE users SET username= :username,password= :password WHERE id = :id";
    //Prépare la requête SQL
    $stmtUsersInsert = $bdd->prepare($querysqlData);
    $stmtUsersInsert->bindParam(":id",$id);
    $stmtUsersInsert->bindParam(":username",$username);
    $stmtUsersInsert->bindParam(":password",$password);
    
    try{
       $stmtUsersInsert->execute();
    }catch(PDOException $e){
        $message = "Erreur 1";
    }
    //Si la variable message n'existe pas c'est que tout s'est bien passé, sinon on renvoi faux
    if(!isset($message)){
        return true;
    }
    return false;
}
// Fonction qui permet de déconnecter l'utilisateur (supprime les données qui sont stockées en session)
function logout(){
   session_destroy();
}
?>