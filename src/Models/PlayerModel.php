<?php


namespace App\Models;

use App\Core\Model;

class PlayerModel extends Model
{

    function getAllPlayer()
    {
        $sql = 'SELECT *
            FROM player
            ORDER BY id_player';

        return self::$database->fetchAllRows($sql);
    }
}