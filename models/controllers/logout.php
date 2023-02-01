<?php
// models/controllers/login.php

require_once('lib/database.php');

function logout() {

	session_destroy();
    header('Location: index.php?');
 }