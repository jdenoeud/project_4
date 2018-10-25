<?php

require('model.php');

$posts = getPosts();

var_dump($posts);

require('view.php');