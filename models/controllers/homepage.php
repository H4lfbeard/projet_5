<?php

require_once 'lib/database.php';
require_once 'models/article.php';
require_once 'models/comment.php';

use Application\Models\Article\PostRepository;

function Homepage()
{

    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $posts = $postRepository->getPosts();

    require 'vues/homepage.php';

}
