<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");

if (isset($_GET['id']) and !empty($_GET['id'])) {
    $edit_id = htmlspecialchars($_GET['id']);
    $edit_articles = $bdd->prepare('SELECT * FROM article WHERE id = ?');
    $edit_articles->execute(array($edit_id));

    if ($edit_articles->rowCount() == 1) {
        $edit_articles = $edit_articles->fetch();
    } else {
        die('L\'articles concerné n\'existe pas !');
    }
}

if (isset($_POST['article_titre'], $_POST['article_intro'], $_POST['article_conclu'])) {
    if (!empty($_POST['article_titre']) and !empty($_POST['article_intro']) and !empty($_POST['article_conclu'])) {
        $article_titre = htmlspecialchars($_POST['article_titre']);
        $article_intro = htmlspecialchars($_POST['article_intro']);
        $article_conclu = htmlspecialchars($_POST['article_conclu']);

        // $ins = $bdd->prepare('INSERT INTO article (titre, intro, conclu, date_time_publication) 
        // VALUE (?, ?, ?, NOW())');
        // $ins->execute(array($article_titre, $article_intro, $article_conclu));
        $ins = $bdd->prepare('UPDATE article SET titre = ?, intro = ?, conclu = ?, date_time_edition = NOW() WHERE id = ?');
        $ins->execute(array($article_titre, $article_intro, $article_conclu, $edit_id));
        header('Location: /tristan.labaume/Projet%20perso/Portfolio%201.0/articles_test/article.php?id=' . $edit_id);
        $message = "L'articles à bien été modifié";
    } else {

        $message = "Champ(s) incomplet(s) !";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition / Suppression</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="article_titre" placeholder="Titre" value="<?= $edit_articles['titre'] ?>" /><br /><br />
        <textarea name="article_intro" cols="30" rows="10" placeholder="Introduction de l'article"><?= $edit_articles['intro'] ?></textarea>
        <textarea name="article_conclu" cols="30" rows="10" placeholder="Conclusion de l'article"><?= $edit_articles['conclu'] ?></textarea><br />
        <input type="submit" value="Envoyer l'article" src="index.php" />
    </form>
    <?php if (isset($message)) {
        echo $message;
    } ?>

</body>

</html>