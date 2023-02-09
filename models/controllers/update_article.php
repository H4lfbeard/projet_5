<?php

require_once 'lib/database.php';
require_once 'models/article.php';
require_once 'models/comment.php';

use Application\Models\Article\PostRepository;

class UpdateArticle
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
            $title = null;
            $hat = null;
            $content = null;
            if (!empty($input['title']) && !empty($input['hat']) && !empty($input['content'])) {
                $title = $input['title'];
                $hat = $input['hat'];
                $content = $input['content'];
                return;
            }
            throw new \Exception('Les données du formulaire sont invalides.');

            $postRepository = new PostRepository();
            $postRepository->connection = new DatabaseConnection();
            $success = $postRepository->updateArticle($title, $hat, $content, $identifier);
            if (!$success) {
                throw new \Exception('Impossible de modifier l\'article !');
                return;
            }
            header('Location: index.php?action=post&id=' . $identifier);
        }

        // Otherwise, it displays the form.
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $post = $postRepository->getPost($identifier);
        if ($post === null) {
            throw new \Exception("Le commentaire $identifier n'existe pas.");
        }

        require 'vues/update_article.php';
    }
}
