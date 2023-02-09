<?php
// models/controllers/login.php

require_once 'lib/database.php';
require_once 'models/user.php';

use Application\Models\User\UserRepository;

/**
 * Fonction qui permet de s'inscrire
 *
 * @return void
 */
function signin()
{
    require 'vues/signin.php';
}

/**
 * Fonction qui permet d'ajouter un utilisateur
 *
 * @return void
 */
function addUser(array $input)
{
    $pseudo = null;
    $email = null;
    $password = null;
    if (!empty($input)) {
        // Le formulaire à été envoyé
        // On vérifie que TOUS les champs requis soient remplis
        if (!empty($input['pseudo']) && !empty($input['email']) && !empty($input['password'])) {
            $pseudo = $input['pseudo'];
            $email = $input['email'];
            $password = $input['password'];
        } else {
            throw new Exception('Les données du formulaire sont invalides.');
        }

        if (($input["password"] === $input["password-confirm"])) {
            // Le formulaire est complet
            // On récupère les données en les protégeant
            $pseudo = strip_tags($input["pseudo"]);

            if (!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("l'adresse email est incorrecte");
            }

            //On va hasher le mot de passe
            $password = password_hash($input["password"], PASSWORD_ARGON2ID);

        } else {
            throw new Exception("Les deux mot de passe ne sont pas similaire");
        }
    }

    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->createUser($pseudo, $email, $password);
    if (!$success) {
        throw new Exception('Impossible de créer un nouveau compte !');

    } else {
        header('Location: index.php?');
    }
}
