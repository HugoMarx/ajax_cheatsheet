<?php

namespace App\Model;

class ArticleManager extends AbstractManager
{
    public const TABLE = 'Article';

    public function selectRandomeOne()
    {
        $statement = $this->pdo->query('SELECT * FROM ' . self::TABLE . ' ORDER BY RAND() LIMIT 1');
        return $statement->fetch();
    }

    public function searchFor($search)
    {
        $statement = $this->pdo->query('SELECT * FROM ' . self::TABLE . ' WHERE title LIKE "%'. $search .'%"');
        //$statement->bindValue('search', $search);
        //$statement->execute();
        return $statement->fetchAll();
    }
}
