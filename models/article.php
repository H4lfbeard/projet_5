<?php

namespace Application\Models\Article;

require_once 'lib/database.php';

use Application\Lib\Database\DatabaseConnection;

class Article
{
    public string $title;
    public string $hat;
    public string $CreationDate;
    public string $content;
    public string $identifier;
}

class PostRepository
{
	public \DatabaseConnection $connection;
    /**
	 * Cette fonction permet de récupérer les infos d'un article
	 *
	 * @return void
	 */
    public function getPost(string $identifier): Article {
        
    	$statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, content, hat, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date FROM article WHERE id = ?"
        );
        $statement->execute([$identifier]);
    
        $row = $statement->fetch();
        $post = new Article();
        $post->title = $row['title'];
        $post->hat = $row['hat'];
        $post->CreationDate = $row['creation_date'];
        $post->content = $row['content'];
        $post->identifier = $row['id'];
    
        return $post;
    }

    /**
	 * Cette fonction permet de récupérer les infos de tous les articles
	 *
	 * @return void
	 */
    public function getPosts(): array {
       
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, content, hat, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date FROM article ORDER BY creation_date DESC LIMIT 0, 10"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Article();
            $post->title = $row['title'];
            $post->hat = $row['hat'];
            $post->CreationDate = $row['creation_date'];
            $post->content = $row['content'];
            $post->identifier = $row['id'];
    
            $posts[] = $post;
        }
    
        return $posts;
    }
    
    /**
	 * Cette fonction permet de créer un article
	 *
	 * @return void
	 */
    public function createArticle(string $title, string $hat, string $content)
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO article(title, hat, content, creation_date) VALUES(?, ?, ?, NOW())'
		);
		$affectedLines = $statement->execute([$title, $hat, $content]);
	
		return ($affectedLines > 0);
	}
    
    /**
	 * Cette fonction permet de mettre à jour les infos d'un article
	 *
	 * @return void
	 */
	public function updateArticle(string $title, string $hat, string $content, $identifier): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE article SET title = ?, hat = ?, content = ?, creation_date = NOW() WHERE id = ?'
        );
        $affectedLines = $statement->execute([$title, $hat, $content, $identifier]);

        return ($affectedLines > 0);
    }

    /**
	 * Cette fonction permet de supprimer un article
	 *
	 * @return void
	 */
	public function deleteArticle(string $identifier)
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM article WHERE id = ?'
        );
        $affectedLines = $statement->execute([$identifier]);

        return ($affectedLines > 0);
    }

    
}


