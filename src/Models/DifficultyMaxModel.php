<?php


namespace App\Models;

use App\Core\Model;

class DifficultyMaxModel extends Model
{

    function getAllMaxDifficulty()
    {
        $sql = 'SELECT *
            FROM difficultyMax
            ORDER BY id_difficulty_max';

        return self::$database->fetchAllRows($sql);
    }
}
