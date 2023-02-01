<?php
// models/controllers/add_comment.php

require_once('lib/database.php');
require_once('models/article.php');
require_once('models/comment.php');

use Application\Models\Article\PostRepository;
use Application\Models\Comment\CommentRepository;

function deleteComment(string $identifier)
{
    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $identifiant = $commentRepository->getComment($identifier);
    $article_id = $identifiant->post;

	$commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $success = $commentRepository->deleteComment($identifier);
    if (!$success) {
        throw new Exception('Impossible de supprimer le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $article_id . '#show_comments');
    }
}