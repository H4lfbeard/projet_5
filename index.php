<?php
session_start();

require_once('models/controllers/homepage.php');
require_once('models/controllers/admin_page.php');
require_once('models/controllers/administrate_user.php');
require_once('models/controllers/articles.php');
require_once('models/controllers/contact.php');
require_once('models/controllers/curriculum.php');
require_once('models/controllers/add_comment.php');
require_once('models/controllers/update_comment.php');
require_once('models/controllers/delete_comment.php');
require_once('models/controllers/submit_comment.php');
require_once('models/controllers/login.php');
require_once('models/controllers/logout.php');
require_once('models/controllers/signin.php');
require_once('models/controllers/add_article.php');
require_once('models/controllers/update_article.php');
require_once('models/controllers/delete_article.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
	if ($_GET['action'] === 'post') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];
        	post($identifier);
    	}
		else {
        	echo 'Erreur : aucun identifiant de billet envoyé action';
        	die;
    	}
	} 

	// ACTIONS ABOUT ADMIN PAGE ARE HERE

	elseif($_GET['action'] === 'admin') {
		if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMIN') {
			admin();
			}
			else {
				homepage();
			}
	}

	elseif ($_GET['action'] === 'passAdmin') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$identifier = $_GET['id'];
			(new PassAdmin())->execute($identifier);
		} else {
			throw new Exception('Impossible de passer en Admin');
		}
	}

	elseif ($_GET['action'] === 'passUser') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$identifier = $_GET['id'];
			(new PassUser())->execute($identifier);
		} else {
			throw new Exception('Impossible de passer en Admin');
		}
	}

	// ACTIONS ABOUT ARTICLES ARE HERE

	elseif($_GET['action'] === 'addArticle') {
		if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'ADMIN') {
		addArticle();
		}
		else {
			homepage();
		}
	}

	elseif($_GET['action'] === 'submitArticle') {
		if (isset($_POST)) {
			submitArticle($_POST);
    	}
		else {
        	echo 'Impossible d\'enregistrer l\'article';
        	die;
    	}
	}

	elseif ($_GET['action'] === 'updateArticle') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$identifier = $_GET['id'];
			// It sets the input only when the HTTP method is POST (ie. the form is submitted).
			$input = null;
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$input = $_POST;
			}
			(new UpdateArticle())->execute($identifier, $input);
		} else {
			throw new Exception('Aucun identifiant d\'article envoyé');
		}
	}

	elseif ($_GET['action'] === 'deleteArticle') {		
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];
        	deleteArticle($identifier);
    	}
		else {
        	echo 'Erreur : aucun identifiant de billet envoyé pour la suppression de l\'article';
        	die;
    	}
	}

	// ACTIONS ABOUT COMMENTS ARE HERE

	elseif ($_GET['action'] === 'addComment') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];
			$author_id = $_SESSION['id'];
        	addComment($identifier, array_merge($_POST, ['author_id' => $author_id]));
    	}
		else {
        	echo 'Erreur : aucun identifiant de billet envoyé addcomment';
        	die;
    	}
	}

	elseif ($_GET['action'] === 'updateComment') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$identifier = $_GET['id'];
			// It sets the input only when the HTTP method is POST (ie. the form is submitted).
			$input = null;
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$input = $_POST;
			}
			(new UpdateComment())->execute($identifier, $input);
		} else {
			throw new Exception('Aucun identifiant de commentaire envoyé');
		}
	}

	elseif ($_GET['action'] === 'submitComment') {
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$identifier = $_GET['id'];
			(new SubmitComment())->execute($identifier);
		} else {
			throw new Exception('Impossible de valider le commentaire');
		}
	}
	
	elseif ($_GET['action'] === 'deleteComment') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];
        	deleteComment($identifier);
    	}
		else {
        	echo 'Erreur : aucun identifiant de billet envoyé pour la suppression du commentaire';
        	die;
    	}
	}

	// ACTIONS ABOUT CURRICULUM VITAE PAGE ARE HERE

	elseif($_GET['action'] === 'curriculum') {
		curriculum();
	}

	// ACTIONS ABOUT CONTACT PAGE ARE HERE

	elseif($_GET['action'] === 'contact') {
		contact();
	}
	elseif($_GET['action'] === 'submitContactForm') {
		if (isset($_POST)) {
			submitContactForm($_POST);
    	}
		else {
        	echo 'Impossible d\'envoyer votre formulaire de contact';
        	die;
    	}
	}

	// ACTIONS ABOUT USERS ARE HERE

	elseif($_GET['action'] === 'login') {
		login();
	}

	elseif($_GET['action'] === 'logout') {
		logout();
	}

	elseif($_GET['action'] === 'signin') {
		signin();
	}

	elseif ($_GET['action'] === 'addUser') {
    	if (isset($_POST)) {
			addUser($_POST);
    	}
		else {
        	echo 'Marche pas';
        	die;
    	}
	}

	elseif ($_GET['action'] === 'logUser') {
    	if (isset($_POST)) {
			logUser($_POST);
    	}
		else {
        	echo 'Ne peux pas vous connecter';
        	die;
    	}
	}

    else {
    	echo "Erreur 404 : la page que vous recherchez n'existe pas du tout.";
	}
	
	
} else {
	
	homepage();
}
