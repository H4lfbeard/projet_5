<?php
session_start();
require_once 'models/controllers/homepage.php';
require_once 'models/controllers/admin_page.php';
require_once 'models/controllers/administrate_user.php';
require_once 'models/controllers/articles.php';
require_once 'models/controllers/contact.php';
require_once 'models/controllers/curriculum.php';
require_once 'models/controllers/add_comment.php';
require_once 'models/controllers/update_comment.php';
require_once 'models/controllers/delete_comment.php';
require_once 'models/controllers/submit_comment.php';
require_once 'models/controllers/login.php';
require_once 'models/controllers/logout.php';
require_once 'models/controllers/signin.php';
require_once 'models/controllers/add_article.php';
require_once 'models/controllers/update_article.php';
require_once 'models/controllers/delete_article.php';
require_once 'models/controllers/error.php';
require_once 'models/controllers/globals.php';

$globals = new Globals;

$get = $globals->getGET();
$post = $globals->getPOST();
$server = $globals->getSERVER();

if (isset($get['action']) && $get['action'] !== '') {
    if ($get['action'] === 'post') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            post($identifier);
        } else {
            error();
        }
    }

    // ACTIONS ABOUT ADMIN PAGE ARE HERE

    elseif ($get['action'] === 'admin') {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMIN') {
            admin();
        } else {
            homepage();
        }
    } elseif ($get['action'] === 'passAdmin') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            (new PassAdmin())->execute($identifier);
        } else {
            throw new Exception('Impossible de passer en Admin');
        }
    } elseif ($get['action'] === 'passUser') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            (new PassUser())->execute($identifier);
        } else {
            throw new Exception('Impossible de passer en Admin');
        }
    }

    // ACTIONS ABOUT ARTICLES ARE HERE

    elseif ($get['action'] === 'addArticle') {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMIN') {
            addArticle();
        } else {
            homepage();
        }
    } elseif ($get['action'] === 'submitArticle') {
        if (isset($post)) {
            submitArticle($post);
        } else {
            error();
        }
    } elseif ($get['action'] === 'updateArticle') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            // It sets the input only when the HTTP method is POST (ie. the form is submitted).
            $input = null;
            if ($server['REQUEST_METHOD'] === 'POST') {
                $input = $post;
            }
            (new UpdateArticle())->execute($identifier, $input);
        } else {
            throw new Exception('Aucun identifiant d\'article envoyé');
        }
    } elseif ($get['action'] === 'deleteArticle') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            deleteArticle($identifier);
        } else {
            error();
        }
    }

    // ACTIONS ABOUT COMMENTS ARE HERE

    elseif ($get['action'] === 'addComment') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            $author_id = $_SESSION['id'];
            addComment($identifier, array_merge($post, ['author_id' => $author_id]));
        } else {
            error();
        }
    } elseif ($get['action'] === 'updateComment') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            // It sets the input only when the HTTP method is POST (ie. the form is submitted).
            $input = null;
            if ($server['REQUEST_METHOD'] === 'POST') {
                $input = $post;
            }
            (new UpdateComment())->execute($identifier, $input);
        } else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
    } elseif ($get['action'] === 'submitComment') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            (new SubmitComment())->execute($identifier);
        } else {
            throw new Exception('Impossible de valider le commentaire');
        }
    } elseif ($get['action'] === 'deleteComment') {
        if (isset($get['id']) && $get['id'] > 0) {
            $identifier = $get['id'];
            deleteComment($identifier);
        } else {
            error();
        }
    }

    // ACTIONS ABOUT CURRICULUM VITAE PAGE ARE HERE

    elseif ($get['action'] === 'curriculum') {
        curriculum();
    }

    // ACTIONS ABOUT CONTACT PAGE ARE HERE

    elseif ($get['action'] === 'contact') {
        contact();
    } elseif ($get['action'] === 'submitContactForm') {
        if (isset($post)) {
            submitContactForm($post);
        } else {
            error();
        }
    }

    // ACTIONS ABOUT USERS ARE HERE

    elseif ($get['action'] === 'login') {
        login();
    } elseif ($get['action'] === 'logout') {
        logout();
    } elseif ($get['action'] === 'signin') {
        signin();
    } elseif ($get['action'] === 'addUser') {
        if (isset($post)) {
            addUser($post);
        } else {
            error();
        }
    } elseif ($get['action'] === 'logUser') {
        if (isset($post)) {
            logUser($post);
        } else {
            error();
        }
    } else {
        error();
    }

} else {

    homepage();
}
