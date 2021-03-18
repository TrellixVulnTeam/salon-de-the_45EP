<?php

namespace App\Models;

use App\Core\Model;

class StatusModel extends Model
{

    function getAllStatus(): array
    {
        $sql = 'SELECT id_status, status_label
        FROM status';

        // Récupération des résultats
        return self::$database->fetchAllRows($sql);
    }

}