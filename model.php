<?php


function getPosts(){

	$db = dbConnect();

	$req = $db-> query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y") AS post_date_fr FROM posts ORDER BY post_date_fr LIMIT 0,5' );

	return $req;

}

function getPost($postId){

	$db = dbConnect();

	$req = $db-> prepare('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y") AS post_date_fr FROM posts WHERE id = ?' );
	$req->execute(array($postId));
	$post = $req->fetch();
	return $post;

}

function getComments($postId){

	$db = dbConnect();

	$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y") AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');

	$comments->execute(array($postId));
	return $comments;
}

 //Connexion à la BDD
function dbConnect()
{
	try
    {
        $db = new PDO('mysql:host=localhost;dbname=project_4;charset=utf8', 'root', 'Enseeiht8');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

