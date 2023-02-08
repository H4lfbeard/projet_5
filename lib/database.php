<?php
class DatabaseConnection
{
	public ?PDO $database = null;
	/**
	 * Cette fonction permet de se connecter à la BDD
	 *
	 * @return void
	 */
	public function getConnection(): PDO
	{
    	if ($this->database === null) {
        	$this->database = new PDO('mysql:host=localhost;dbname=projet5_blog;charset=utf8', 'root', 'root');
    	}
    	return $this->database;
	}
}