<?php
// Models/controllers/login.php

require_once 'lib/database.php';
require_once 'models/user.php';

use Application\Models\User\UserRepository;

/**
 * Fonction qui permet d'afficher la page de connection'
 *
 * @return void
 */
function login()
{
    require 'vues/login.php';
}

/**
 * Fonction qui permet de se connecter
 *
 * @return void
 */
function logUser(array $input)
{
    $email = null;
    $password = null;
    if (!empty($input)) {
        // Le formulaire à été envoyé
        // On vérifie que TOUS les champs requis soient remplis
        if (isset($input["email"], $input["password"]) && !empty($input['email']) && !empty($input['password'])) {
            $email = $input["email"];
            $password = $input["password"];
            if (!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Ce n'est pas un email valide");
                return;
            }
        }
        throw new Exception('Les informations sont trop invalides.');
    }

    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->loginUser($email, $password);
    if (!$success) {
        throw new Exception('Impossible se connecter à votre compte !');
        return;
    }
    header('Location: index.php?');
}
