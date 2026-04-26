<?php
require_once ('./models/user.php');
$article = new user;
$testotas = $article->getUserCommentaire(10);
var_dump($testotas[0]['comm']);
?>