<?php
// models/controllers/add_comment.php

require_once('lib/database.php');
require_once('models/article.php');
require_once('models/comment.php');

use Application\Models\Article\PostRepository;
use Application\Models\Comment\CommentRepository;

function deleteArticle(string $identifier)
{
    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $identifiant = $postRepository->getPost($identifier);

	$postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $success = $postRepository->deleteArticle($identifier);
    if (!$success) {
        throw new Exception('Impossible de supprimer l\'article !');
    } else {
        header('Location: index.php?action');
    }
}