<?php

require_once('lib/database.php');
require_once('models/article.php');
require_once('models/user.php');

use Application\Models\Article\PostRepository;
use Application\Models\User\UserRepository;

class PassAdmin
{
    public function execute(string $identifier)
    { 
            $userRepository = new UserRepository();
            $userRepository->connection = new DatabaseConnection();
            $identifiant = $userRepository->getUser($identifier);
            
            $userRepository = new UserRepository();
            $userRepository->connection = new DatabaseConnection();
            $success = $userRepository->passAdmin($identifier);
            if (!$success) {
                throw new \Exception('Impossible passer le compte en compte Admin');
            } else {
                header('Location: index.php?action=admin#show_users');
            }

        require('vues/update_comment.php');
    }
}

class PassUser
{
    public function execute(string $identifier)
    { 
            $userRepository = new UserRepository();
            $userRepository->connection = new DatabaseConnection();
            $identifiant = $userRepository->getUser($identifier);
            
            $userRepository = new UserRepository();
            $userRepository->connection = new DatabaseConnection();
            $success = $userRepository->passUser($identifier);
            if (!$success) {
                throw new \Exception('Impossible passer le compte en compte User');
            } else {
                header('Location: index.php?action=admin#show_users');
            }

        require('vues/update_comment.php');
    }
}