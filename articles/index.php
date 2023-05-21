<?php
require_once('../database.php');
ini_set("date.timezone", "Europe/Paris");

$request = $database->prepare("SELECT * FROM tweets ORDER BY date DESC");
$request->execute();
$tweets = $request->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (
        isset($_POST['form'])
        && $_POST['form'] === "formulaire_ajout_article"
    ) {
        if (
            !empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['tag'])
        ) {
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $tag = $_POST['tag'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (
        !empty($_GET['recherche'])
    ) {
        $data = [
            "recherche" => "%" . $_GET['recherche'] . "%"
        ];

        $request = $database->prepare("SELECT * FROM tweets WHERE titre LIKE :recherche ORDER BY date DESC");
        $request->execute($data);
        $tweets = $request->fetchAll(PDO::FETCH_ASSOC);
    }
}
require_once 'index.template.php';
?>