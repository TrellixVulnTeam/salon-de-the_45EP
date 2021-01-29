<?php


namespace App\Models;

use App\Core\Model;

class PlayerMaxModel extends Model
{

    function getAllPlayerMaxModel()
    {
        $sql = 'SELECT *
            FROM playerMax
            ORDER BY id_player_max';

        return self::$database->fetchAllRows($sql);
    }
}
