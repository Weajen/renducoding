<?php
require_once('database.php');
// formulaire d'ajout d'un nouvel utilisateur
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (
        isset($_POST['form'])
        && $_POST['form'] === "formulaire_ajout_user"
    ) {
        if (
            !empty($_POST['user_prenom'])
            && !empty($_POST['user_nom'])
            && !empty($_POST['user_pseudo'])
            && !empty($_POST['user_email'])
            && !empty($_POST['user_password'])
            && !empty($_POST['user_picture'])
        ) {
            $data = [
                'user_prenom' => $_POST['user_prenom'],
                'user_nom' => $_POST['user_nom'],
                'user_pseudo' => $_POST['user_pseudo'],
                'user_email' => $_POST['user_email'],
                'user_password' => password_hash($_POST['user_password'], PASSWORD_DEFAULT), //pour crypter le mot de passe
                'user_picture' => $_POST['user_picture'],
            ];
            // insertion des données dans la db
            $request = $database->prepare(
                "INSERT INTO users (user_prenom, user_nom, user_pseudo, user_email, user_password, user_picture) 
            VALUES (:user_prenom, :user_nom, :user_pseudo, :user_email, :user_password, :user_picture)");
            $request->execute($data);
            header("Location: index.php");
        }
    }
}
require_once 'index.template.php';
?>