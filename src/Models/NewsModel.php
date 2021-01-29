<?php


/**
 * Fonctions de modèles relatives à la table Post
 */

namespace App\Models;

use App\Core\Model;

class NewsModel extends Model

{
    /**
     * Récupère tous les articles
     */
    function getAllNews(): array
    {
        $sql = ' SELECT*
            FROM news 
            JOIN category 
            ON news.categoryId = category.id
            ORDER BY createdAt DESC LIMIT 0,5';

        // Récupération des résultats
        return self::$database->fetchAllRows($sql);
    }


    // Récupère 1 article



    function getOnePost(int $postId): array
    {
        //<!--  INNER JOIN category ON news.categoryId = category.id -->
        //id, title, content, CreatedAt, image, categoryId
        // récupérer les données de l'article
        $sql = 'SELECT *
            FROM news 
            ON news.newsid = "?"';

        // Récupération des résultats
        return self::$database->fetchOneRow($sql, [$postId]);
    }



    function insertNews(string $title, string $content, int $categoryId, string $image): ?int
    {
        $sql = 'INSERT INTO news
                (title, content, createdAt , categoryId  ,image)
                VALUES (?, ? , NOW(), ?, ?)';

        return self::$database->insertQuery($sql, [$title, $content, $categoryId, $image]);
    }
    /**
     * Met à jour un article
     */
    function updatePost(string $title, string $content, int $categoryId, string $image, int $postid)
    {
        $sql = 'UPDATE news
                SET title = ?, content = ?, categoryId = ?, image = ?, updatedAt = NOW()
                WHERE id = ?';

        self::$database->executeQuery($sql, [$title, $content, $categoryId, $image, $postid]);
    }

    /**
     * Supprime un article
     */
    function deleteNews(int $postId)
    {
        $sql = 'DELETE FROM news WHERE newsid = ?';

        self::$database->executeQuery($sql, [$postId]);
    }
}
