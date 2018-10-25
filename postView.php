<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="" />
        <title>Chapitre</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:regular,black" rel="stylesheet">    
    </head>

<p>Retourner à la <a href="index.php">liste des billets</a></p>

    <div class="news">
        <h3> <?= htmlspecialchars($post['title']) . ' le '. $post['post_date_fr'] ; ?> 
        </h3>
        <p> <?= htmlspecialchars($post['content']) ; ?> 
            
        </p>

    </div>


<h2>Commentaires</h2>

<?php

while ($comment = $comments->fetch())
{
?>
    <p>
        <strong> <?= htmlspecialchars($comment['author']); ?> </strong> 
        <?= ' le '. $comment['comment_date_fr'] . ' : <br/>'; ?>
        <?= htmlspecialchars($comment['comment']); ?>
    </p>

<?php
}
?>

</html>
