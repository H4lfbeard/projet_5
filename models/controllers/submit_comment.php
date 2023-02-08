<?php

require_once 'lib/database.php';
require_once 'models/article.php';
require_once 'models/comment.php';

use Application\Models\Comment\CommentRepository;

class SubmitComment
{
    public function execute(string $identifier)
    {
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $identifiant = $commentRepository->getComment($identifier);

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->submitComment($identifier);
        if (!$success) {
            throw new \Exception('Impossible de modifier le commentaire !');
        } else {
            header('Location: index.php?action=admin#show_comments');
        }

        require 'vues/update_comment.php';
    }
}
