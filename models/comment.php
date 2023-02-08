<?php

namespace Application\Models\Comment;

require_once('lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Comment
{
	public string $identifier;
	public string $author;
	public string $author_id;
	public string $CreationDate;
	public string $comment;
	public string $post;
}

class CommentRepository 
{
	/**
	 * Cette fonction permet de récupérer un commentaire
	 *
	 * @return void
	 */
	public function getComment(string $identifier): ?Comment
    {	
		
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, author, comment, article_id, author_id, comment_date FROM comments WHERE id = ?"
			
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $comment = new Comment();
		$comment->identifier = $row['id'];
		$comment->author = $row['author'];
		$comment->author_id = $row['author_id'];
		$comment->CreationDate = $row['comment_date'];
		$comment->comment = $row['comment'];
		$comment->post = $row['article_id'];

        return $comment;
    }

	/**
	 * Cette fonction permet de récupérer tous les commentaires
	 *
	 * @return void
	 */
	public function getComments(string $post): array
	{
		$statement = $this->connection->getConnection()->prepare(
			"SELECT id, author, comment, article_id, author_id, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date FROM comments WHERE article_id = ? AND validity = 1 ORDER BY comment_date DESC"
		);
		$statement->execute([$post]);
	
		$comments = [];
		while (($row = $statement->fetch())) {
			$comment = new Comment();
			$comment->identifier = $row['id'];
			$comment->author = $row['author'];
			$comment->author_id = $row['author_id'];
			$comment->CreationDate = $row['creation_date'];
			$comment->comment = $row['comment'];
			$comment->post = $row['article_id'];
	
			$comments[] = $comment;
		}
	
		return $comments;
	}

	/**
	 * Cette fonction permet de récupérer les commentaires non validés
	 *
	 * @return void
	 */
	public function getAllComments(): array
	{
		$statement = $this->connection->getConnection()->prepare(
			"SELECT id, author, comment, article_id, author_id, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date FROM comments WHERE validity = 0 ORDER BY comment_date DESC"
		);
		$statement->execute();
	
		$comments = [];
		while (($row = $statement->fetch())) {
			$comment = new Comment();
			$comment->identifier = $row['id'];
			$comment->author = $row['author'];
			$comment->author_id = $row['author_id'];
			$comment->CreationDate = $row['creation_date'];
			$comment->comment = $row['comment'];
			$comment->post = $row['article_id'];
	
			$comments[] = $comment;
		}
	
		return $comments;
	}
	
	/**
	 * Cette fonction permet de créer un commentaire
	 *
	 * @return void
	 */
	public function createComment(string $post, string $author, string $comment, string $author_id)
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO comments(article_id, author, comment, author_id, comment_date) VALUES(?, ?, ?, ?, NOW())'
		);
		$affectedLines = $statement->execute([$post, $author, $comment, $author_id]);
	
		return ($affectedLines > 0);
	}

	/**
	 * Cette fonction permet de mettre à jour un commentaire
	 *
	 * @return void
	 */
	public function updateComment(string $identifier, string $author, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE comments SET author = ?, comment = ?, comment_date = NOW() WHERE id = ?'
        );
        $affectedLines = $statement->execute([$author, $comment, $identifier]);

        return ($affectedLines > 0);
    }

	/**
	 * Cette fonction permet de valider un commentaire
	 *
	 * @return void
	 */
	public function submitComment(string $identifier): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE comments SET validity = "1" WHERE id = ?'
        );
        $affectedLines = $statement->execute([$identifier]);

        return ($affectedLines > 0);
    }

	/**
	 * Cette fonction permet de supprimer un commentaire
	 *
	 * @return void
	 */
	public function deleteComment(string $identifier)
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM comments WHERE id = ?'
        );
        $affectedLines = $statement->execute([$identifier]);

        return ($affectedLines > 0);
    }

}

