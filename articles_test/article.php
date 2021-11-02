<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);

    $articles = $bdd->prepare('SELECT * FROM article WHERE id = ?');
    $articles->execute(array($get_id));

    if ($articles->rowCount() == 1) {
        $articles = $articles->fetch();
        $titre = $articles['titre'];
        $id = $articles['id'];
        $intro = $articles['intro'];
        $conclu = $articles['conclu'];

    } else {
        die('Cette article n\'existe pas ou à été supprimé !');
    }
} else {
    die('erreur');
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page articles</title>
</head>

<body>
    <h1><?= $titre ?></h1>
    <img src="../illustration/<?= $id ?>.jpg" />
    <p><?= $intro ?></p>
    <p><?= $conclu ?></p>
    <br /> 
    <p><a href="index.php">Retour accueil</a></p>
</body>

</html>