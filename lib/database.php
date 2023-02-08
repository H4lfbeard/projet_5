<?php
class DatabaseConnection
{
	public ?PDO $database = null;

	public function getConnection(): PDO
	{
    	if ($this->database === null) {
        	$this->database = new PDO('mysql:host=localhost;dbname=projet5_blog;charset=utf8', 'root', 'root');
    	}
    	return $this->database;
	}
}