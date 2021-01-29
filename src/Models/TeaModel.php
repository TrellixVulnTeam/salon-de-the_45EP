<?php



namespace App\Models;

use App\Core\Model;

class TeaModel extends Model
{

    function getAllPosts(): array
    {
        $sql =

            'SELECT *
FROM the
JOIN couleur
ON the.couleurId = couleur.id
ORDER BY color';


        // Récupération des résultats
        return self::$database->fetchAllRows($sql);
        //  return fetchAllRows($sql);
    }

    function getAllCategories()
    {
        $sql = 'SELECT *
            FROM couleur
            ORDER BY color';

        return self::$database->fetchAllRows($sql);
    }

    function lastTeaId()
    {
        $sql = 'SELECT MAX(teaid)
        FROM  the';

        return self::$database->fetchOneRow($sql);
    }

    function insertTea(string $title, string $image, string $content, int $categoryId): ?int
    {
        $sql = 'INSERT INTO the
            (name, image, description, couleurId)
            VALUES (?, ?, ?, ?)';

        return self::$database->insertQuery($sql, [$title, $image, $content, $categoryId]);
    }

    function deleteTea(int $postId) 
    {
        $sql = 'DELETE FROM the WHERE teaid = ?';

        self::$database->executeQuery($sql, [$postId]);
    }
}
/*
function getOnePost(int $postId): array
{
    // récupérer les données de l'article
    $sql = 'SELECT P.id AS postid, title, content, image, C.name AS category
            FROM post AS P
            INNER JOIN user AS U ON P.userId = U.id
            INNER JOIN category AS C ON P.categoryId = C.id
            WHERE P.id = ?';

    // Récupération des résultats
    return fetchOneRow($sql, [$postId]);
}


function insertPost(string $title, string $content, int $categoryId, string $image, int $userId): ?int
{
    $sql = 'INSERT INTO post
            (title, content, image, categoryId, userId, createdAt)
            VALUES (?, ?, ?, ?, ?, NOW())';

    return insertQuery($sql, [$title, $content, $image, $categoryId, $userId]);
}

*
 * Récupère 1 article
 */