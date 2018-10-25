<?php

function getPosts(){

try
{
    $db = new PDO('mysql:host=localhost;dbname=project_4;charset=utf8', 'root', 'Enseeiht8');
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '. $e->getMessage() );
}

$req = $db-> query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y") AS post_date_fr FROM posts ORDER BY post_date_fr LIMIT 0,5' );

return $req;

}