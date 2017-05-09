<?php

require_once 'model/model.php';

$id = $_GET['id'];

$article = new Article();
$article->deleteById($id);

header('Location: index.php');