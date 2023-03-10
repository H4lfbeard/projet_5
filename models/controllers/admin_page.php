<?php
// models/controllers/admin_page.php

require_once 'lib/database.php';
require_once 'models/article.php';
require_once 'models/comment.php';
require_once 'models/user.php';

use Application\Models\Comment\CommentRepository;
use Application\Models\User\UserRepository;

/**
 * Fonction qui permet de récupérer les articles non-validés et les utilisateurs pour les administrer
 *
 * @return void
 */
function admin()
{

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $comments = $commentRepository->getAllComments();

    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $users = $userRepository->getAllUsers();

    require 'vues/admin_page.php';
}
