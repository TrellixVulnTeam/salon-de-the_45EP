<?php


namespace App\Models;

use App\Core\Model;

class ExtensionModel extends Model
{

    function getAllNewsCategories()
    {
        $sql = 'SELECT *
            FROM category
            ORDER BY name';

        return self::$database->fetchAllRows($sql);
    }

    function insertExtension(string $title, int $extensionId , int $playerId, int $max_playerId, int $timeId, int $difficultyId, int $max_difficultyId, int $age): ?int
    {
        $sql = 'INSERT INTO extension
            (name, extensionId , playerId, max_playerId, timeId, difficultyId, max_difficultyId, age)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

        return self::$database->insertQuery($sql, [$title, $extensionId , $playerId, $max_playerId, $timeId, $difficultyId, $max_difficultyId, $age]);
    }
}