<?php
// models/controllers/add_comment.php

require_once 'lib/database.php';
require_once 'models/article.php';
require_once 'models/comment.php';

use Application\Models\Comment\CommentRepository;

function addComment(string $post, array $input)
{
    $author = null;
    $comment = null;
    $author_id = null;
    if (!empty($input['author']) && !empty($input['comment']) && !empty($input['author_id'])) {
        $author = $input['author'];
        $author_id = $input['author_id'];
        $comment = $input['comment'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $success = $commentRepository->createComment($post, $author, $comment, $author_id);
    if (!$success) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $post . '#show_comments');
    }
}
