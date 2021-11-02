<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");

if (isset($_POST['article_titre'], $_POST['article_intro'], $_POST['article_conclu'], $_FILES['illustration'])) {
    if (!empty($_POST['article_titre']) and !empty($_POST['article_intro']) and !empty($_POST['article_conclu']) and !empty($_FILES['illustration']['name'])) {
        $article_titre = htmlspecialchars($_POST['article_titre']);
        $article_intro = htmlspecialchars($_POST['article_intro']);
        $article_conclu = htmlspecialchars($_POST['article_conclu']);

        $ins = $bdd->prepare('INSERT INTO article (titre, intro, conclu, date_time_publication, date_time_edition) 
        VALUE (?, ?, ?, NOW(), NOW())');
        $ins->execute(array($article_titre, $article_intro, $article_conclu));
        $lastid = $bdd->lastInsertId();

        if (exif_imagetype($_FILES['illustration']['tmp_name']) == 2) {
            $chemin = '../illustration/' . $lastid . '.jpg';
            move_uploaded_file($_FILES['illustration']['tmp_name'], $chemin);
        } else {
            $message = "L'image doit être au format JPG";
        }

        $message = "L'articles à bien été ajouté";
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
    <title>Page articles</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="article_titre" placeholder="Titre" /><br /><br />
        <textarea name="article_intro" cols="30" rows="10" placeholder="Introduction de l'article"></textarea>
        <textarea name="article_conclu" cols="30" rows="10" placeholder="Conclusion de l'article"></textarea><br />
        <input type="file" name="illustration"><br></br>
        <input type="submit" value="Envoyer l'article" />
    </form>
    <?php if (isset($message)) {
        echo $message;
    } ?>
    <p><a href="index.php">Retour</a></p>

</body>

</html>