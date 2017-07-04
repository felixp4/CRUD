<?php

require_once 'model/model.php';

$article = new Article();
$rows = $article->findAll();

require_once 'view/indexTemplate.php';
