<?php

namespace Application\Models\User;

require_once('lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class User
{
	public string $identifier;
	public string $pseudo;
	public string $email;
	public string $password;
}

class UserRepository
{
	public \DatabaseConnection $connection;

	public function getUser(string $identifier): ?User
    {	
		
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, pseudo, email, user_role FROM users WHERE id = ?"
			
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

		$user = new User();
		$user->identifier = $row['id'];
		$user->pseudo = $row['pseudo'];
		$user->email = $row['email'];
		$user->user_role = $row['user_role'];

        return $user;
    }

	public function getUsers(string $user): array
	{
		$statement = $this->connection->getConnection()->prepare(
			"SELECT id, pseudo, email, user_role password FROM users DESC"
		);
		$statement->execute([$user]);
	
		$users = [];
		while (($row = $statement->fetch())) {
			$user = new User();
			$user->identifier = $row['id'];
			$user->pseudo = $row['pseudo'];
			$user->email = $row['email'];
			$user->password = $row['password'];
			$user->user_role = $row['user_role'];
	
			$users[] = $user;
		}
	
		return $users;
	}

	public function getAllUsers(): array
	{
		$statement = $this->connection->getConnection()->prepare(
			"SELECT id, pseudo, user_role FROM users ORDER BY user_role"

		);
		$statement->execute();
		$users = [];
		while (($row = $statement->fetch())) {
			$user = new User();
			$user->identifier = $row['id'];
			$user->pseudo = $row['pseudo'];
			$user->user_role = $row['user_role'];
	
			$users[] = $user;
		}
	
		return $users;
	}
	
	
	public function createUser(string $pseudo, string $email, string $password)
	{
		$statement = $this->connection->getConnection()->prepare(
			"INSERT INTO users(pseudo, email, password, user_role) VALUES(?, ?, ?, 'USER')"
		);
		$affectedLines = $statement->execute([$pseudo, $email, $password]);
		// On récupère l'ID du User qui vient de s'inscrire
		$statement = $this->connection->getConnection()->prepare(
			"SELECT `id`, `user_role` FROM `users`  WHERE `email` = :email"
		);
		$statement->bindValue(":email", $email);
		$statement->execute();
		$row = $statement->fetch();
		$_SESSION['pseudo'] = $pseudo;
		$_SESSION['id'] = $row['id'];
		$_SESSION['user_role'] = $row['user_role'];
		return ($affectedLines > 0);
	}

	public function passAdmin(string $identifier)
	{
		$statement = $this->connection->getConnection()->prepare(
			'UPDATE users SET user_role = "ADMIN" WHERE id = ?'
		);
		$affectedLines = $statement->execute([$identifier]);
		return ($affectedLines > 0);
	}

	public function passUser(string $identifier)
	{
		$statement = $this->connection->getConnection()->prepare(
			'UPDATE users SET user_role = "USER" WHERE id = ?'
		);
		$affectedLines = $statement->execute([$identifier]);
		return ($affectedLines > 0);
	}

	public function loginUser(string $email)
	{
		$statement = $this->connection->getConnection()->prepare(
			"SELECT * FROM `users` WHERE `email` = :email"
		);
		$statement->bindValue(":email", $email);
		$statement->execute();
		$user = $statement->fetch();
		if ($user) {
			
			if (password_verify($_POST["password"], $user["password"])) {
				session_start();
				$_SESSION['pseudo'] = $user["pseudo"];
				$_SESSION['id'] = $user["id"];
				$_SESSION['user_role'] = $user['user_role'];
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
		$statement->close();
	}

}

