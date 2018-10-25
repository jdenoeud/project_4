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
<?php 
// Appel à la BDD
try
{
    $db = new PDO('mysql:host=localhost;dbname=project_4;charset=utf8', 'root', 'Enseeiht8');
}
catch(Exception $e)
{
        die('Erreur : '. $e->getMessage() );
}
?>

<?php
//On récupère le billet sélectionné avec une requête préparée
$req = $db-> prepare('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y") AS post_date_fr FROM posts WHERE id= :postId' );
$req -> execute(array(
    'postId' => $_GET['id']
));

$data = $req->fetch()
?>
    <div class="news">
        <h3> <?php echo htmlspecialchars($data['title']) . ' le '. $data['post_date_fr'] ; ?> 
        </h3>
        <p> <?php echo htmlspecialchars($data['content']) ; ?> 
            
        </p>

    </div>
<?php
$req->closeCursor();
?>

<h2>Commentaires</h2>

<?php
//On récupère les commentaires asociés au billet choisi avec une requête préparée
$req = $db -> prepare('SELECT author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y") AS comment_date_fr FROM comments WHERE post_id= :postId ORDER BY comment_date ');
$req -> execute(array(
    'postId' => $_GET['id']
));

while ($data = $req->fetch())
{
?>
    <p>
        <strong> <?php echo htmlspecialchars($data['authot']); ?> </strong> 
        <?php echo ' le '. $data['comment_date_fr'] . ' : <br/>'; ?>
        <?php echo htmlspecialchars($data['comment']); ?>
    </p>

<?php

}
$req->closeCursor();

?>






</html>
