<?php
// models/controllers/login.php

require_once 'lib/database.php';

/**
 * Fonction qui permet de se déconnecter
 *
 * @return void
 */
function logout()
{
    session_destroy();
    header('Location: index.php?');
}
