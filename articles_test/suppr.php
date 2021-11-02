<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");

if (isset($_GET['id']) and !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);
    $edit_articles = $bdd->prepare('DELETE FROM article WHERE id = ?');
    $edit_articles->execute(array($suppr_id));
    unlink('../illustration/'.$suppr_id.'.jpg');

    header('Location: /Portfolio%201.0/articles_test/index.php');
}