<?php
require_once('../database.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (
        isset($_POST['form'])
        && $_POST['form'] === "formulaire_ajout_article"
    ) {
        if (
            !empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['tag'])
        ) {
            $data = [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'tag' => $_POST['tag']
            ];

            $request = $database->prepare("INSERT INTO tweets (titre, contenu, tag, date) VALUES (:titre, :contenu, :tag, NOW())");
            $request->execute($data);
            header("Location: index.php");
        }
    }
}
require_once 'index.template.php';
?>