<?php


namespace App\Models;

use App\Core\Model;

class DifficultyModel extends Model
{

    function getAllDifficulty()
    {
        $sql = 'SELECT *
            FROM difficulty
            ORDER BY id_difficulty';

        return self::$database->fetchAllRows($sql);
    }
}
