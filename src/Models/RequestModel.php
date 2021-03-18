<?php

namespace App\Models;

use App\Core\Model;

class RequestModel extends Model
{

    /**
     * Récupère toutes les requêtes
     */
    function getAllRequests(): array
    {
        $sql = 'SELECT * FROM request 
                JOIN subject 
                ON request.subject_id = subject.id_subject
               JOIN status 
               ON request.status_id = status.id_status
                ORDER BY request.createdAt DESC
                ';

        // Récupération des résultats
        return self::$database->fetchAllRows($sql);
    }

    /**
     * Récupère 1 article
     */
    function getOneRequest(int $postId): array
    {
        // récupérer les données de l'article
        $sql =

            'SELECT * FROM request 
JOIN subject 
ON request.subject_id = subject.id_subject
JOIN status 
ON request.status_id = status.id_status
WHERE id_request = ?';

        // Récupération des résultats
        return self::$database->fetchOneRow($sql, [$postId]);
    }

    /**
     * Insère une requête dans la base de données
     */
    function insertRequest(string $firstname, string $lastname, string $email, string $phone, string $content, int $subject_id): ?int
    {
        $sql = 'INSERT INTO request (createdAt, firstname, lastname, email, phone, content, subject_id) 
                        VALUES (NOW(), ?, ?, ?, ?, ?, ?)';

        return self::$database->insertQuery($sql, [$firstname, $lastname, $email, $phone, $content, $subject_id]);
    }

    /**
     * Met à jour une requête
     */
    function updateRequest(int $status_id, int $id_request)
    {
        $sql = 'UPDATE request
                SET status_id = ?
                WHERE id_request = ?';

        self::$database->executeQuery($sql, [$status_id, $id_request]);
    }

    /**
     * Supprime une requête
     */
    function deleteRequest(int $id_request)
    {
        $sql = 'DELETE FROM request WHERE id_request = ?';

        self::$database->executeQuery($sql, [$id_request]);
    }
}
