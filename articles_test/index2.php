<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");
$article = $bdd->query('SELECT * FROM article ORDER BY date_time_publication DESC');
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page articles</title>
    
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <p><a href="ajout.php">Ajouter un article</a></p>

<ul>
    <?php while ($a = $article->fetch()) { ?>
    <li><a href="article.php?id=<?= $a['id'] ?>"><img src="../illustration/<?= $a['id'] ?>.jpg" width="100px" />
        </a>
        <br />
        <a href="article.php?id=<?= $a['id'] ?>">
            <?= $a['titre'] ?>
        </a> |
        <a href="edit.php?id=<?= $a['id'] ?>">Modifier</a> |
        <a href="suppr.php?id=<?= $a['id'] ?>">Supprimer</a>
    </li>
    <?php } ?>
</ul>

</body>

</html>