<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="blog.css" />
        <title>Billet simple pour l'Alaska</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:regular,black" rel="stylesheet"> 
               
       
    </head>

    <section>
        <h1>Billet simple pour l'Alaska</h1>

<?php

while ($data = $posts->fetch())
{

?>
    <div class="news">
        <h3> <?= htmlspecialchars($data['title']); ?>
        <em>le <?= $data['post_date_fr']; ?></em>
        </h3>
        <p> <?= htmlspecialchars($data['content']) ; ?> 
            <a href="post.php?id=<?= $data['id']; ?>">Commentaires</a>
        </p>

    </div>

<?php

}
$posts->closeCursor();
?>
    

</section>


</html>