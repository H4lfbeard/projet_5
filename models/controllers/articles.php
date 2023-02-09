<?php

require_once 'lib/database.php';
require_once 'models/article.php';
require_once 'models/comment.php';

use Application\Models\Article\PostRepository;
use Application\Models\Comment\CommentRepository;

/**
 * Fonction qui permet de récupérer un article et ses commentaires
 *
 * @return void
 */
function post(string $identifier)
{

    $connection = new DatabaseConnection();

    $postRepository = new PostRepository();
    $postRepository->connection = $connection;
    $post = $postRepository->getPost($identifier);

    $commentRepository = new CommentRepository();
    $commentRepository->connection = $connection;
    $comments = $commentRepository->getComments($identifier);

    require 'vues/articles-vues.php';
}
