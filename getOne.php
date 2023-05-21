<?php
require_once('database.php');

$request = $database->prepare("SELECT * FROM tweets ORDER BY id DESC LIMIT 1");
$request->execute();
$tweets = $request->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($tweets)
?>