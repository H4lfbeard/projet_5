<?php
// models/controllers/add_article.php

require_once 'lib/database.php';
require_once 'models/article.php';
require_once 'models/comment.php';

use Application\Models\Article\PostRepository;

function addArticle()
{

    require 'vues/add_article.php';
}

function submitArticle(array $input)
{

    $title = null;
    $hat = null;
    $content = null;
    if (!empty($input['title']) && !empty($input['hat']) && !empty($input['content'])) {
        $title = $input['title'];
        $hat = $input['hat'];
        $content = $input['content'];
    } else {
        throw new Exception('Les informations de l\'article sont invalides.');
    }

    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $success = $postRepository->createArticle($title, $hat, $content);
    if (!$success) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    } else {
        header('Location: index.php?action#article_blog');
    }
}
