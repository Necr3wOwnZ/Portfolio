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
    <link rel="stylesheet" href="../lib/fontawesome_pro/css/all.css">
</head>

<body>
    <div class="div_page">
        <p class="head_p"><a href="ajout.php">Ajouter un article</a></p>
        <div class="card_contain">
            <?php while ($a = $article->fetch()) { ?>
                <!-- <a class="card_link" href="article.php?id=<?= $a['id'] ?>">  -->

                <div class="card" style="background-image: url('../illustration/<?= $a['id'] ?>.jpg')" onclick="redirect_article(<?= $a['id'] ?>)">
                    <div class="border">
                        <h2><?= $a['titre'] ?></h2>
                        <!-- <div class="card_contenu"> -->
                            <div class="intro">
                                <p><?= $a['intro'] ?></p>
                            </div>
                            <div class="icons">
                                <a href="edit.php?id=<?= $a['id'] ?>">
                                    <i class="far fa-comment-edit fa-2x"></i>
                                </a>
                                <a href="suppr.php?id=<?= $a['id'] ?>">
                                    <i class="far fa-minus-circle fa-2x"></i>
                                </a>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <script type="text/javascript" src="app.js"></script>
</body>

</html>