<?php

require_once 'lib/database.php';
require_once 'models/article.php';
require_once 'models/comment.php';

use Application\Models\Comment\CommentRepository;

class UpdateComment
{
    /**
     * Fonction qui permet de mettre à jour un commentaire
     *
     * @return void
     */
    public function execute(string $identifier, ?array $input)
    {
        // It handles the form submission when there is an input.
        if ($input !== null) {
            $author = null;
            $comment = null;

            if (!empty($input['author']) && !empty($input['comment'])) {
                $author = $input['author'];
                $comment = $input['comment'];
                return;
            }
            throw new \Exception('Les données du formulaire sont invalides.');

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $identifiant = $commentRepository->getComment($identifier);
            $article_id = $identifiant->post;

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment($identifier, $author, $comment);
            if (!$success) {
                throw new \Exception('Impossible de modifier le commentaire !');
                return;
            }
            header('Location: index.php?action=post&id=' . $article_id . '#show_comments');
        }

        // Otherwise, it displays the form.
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($identifier);
        if ($comment === null) {
            throw new \Exception("Le commentaire $identifier n'existe pas.");
        }

        require 'vues/update_comment.php';
    }
}
