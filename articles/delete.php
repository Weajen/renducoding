<?php
require_once('../database.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (
        isset($_POST['form'])
        && $_POST['form'] === "formulaire_supp_article"
    ) {
        if (
            !empty($_POST['tweet_id']) 
        ) {
            $data = [
                'tweet_id' => $_POST['tweet_id'],
            ];

            $request = $database->prepare("DELETE FROM tweets WHERE id = :tweet_id");
            $request->execute($data);
            header("Location: index.php");
        }
    }
}
require_once 'index.template.php';
?>