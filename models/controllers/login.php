<?php
// Models/controllers/login.php

require_once('lib/database.php');
require_once('models/user.php');

use Application\Models\User\UserRepository;

function login() {

	require('vues/login.php');
 }

 function logUser(array $input)
{
	$email = null;
    $password = null;
    if (!empty($input)){
        // Le formulaire à été envoyé
        // On vérifie que TOUS les champs requis soient remplis
        if (isset($input["email"], $input["password"]) && !empty($input['email']) && !empty($input['password'])) {
            $email = $input["email"];
            $password = $input["password"];
            if(!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
                die("Ce n'est pas un email valide");
            }
        } else {
            die('Les informations sont trop invalides.');
        }
    }
  
	$userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->loginUser($email, $password);
    if (!$success) {
        throw new Exception('Impossible se connecter à votre compte !');
    } else {
        header('Location: index.php?');
    }
    
}
