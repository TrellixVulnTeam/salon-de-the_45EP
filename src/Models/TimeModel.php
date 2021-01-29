<?php


namespace App\Models;

use App\Core\Model;

class TimeModel extends Model
{

    function getAllNewsCategories()
    {
        $sql = 'SELECT *
            FROM category
            ORDER BY name';

        return self::$database->fetchAllRows($sql);
    }

    function insertTime(int $min_time, int $max_time): ?int
    {
        $sql = 'INSERT INTO duration
            (min_time, max_time)
            VALUES (?, ?)';

        return self::$database->insertQuery($sql, [$min_time, $max_time]);
    }

    function lastTimeId()
    {
        $sql = 'SELECT MAX(id_time)
        FROM  duration';

        return self::$database->fetchOneRow($sql);
    }
}
