<?php


namespace App\Models;

use App\Core\Model;

class CategoryNews extends Model
{

    function getAllNewsCategories()
    {
        $sql = 'SELECT *
            FROM category
            ORDER BY name';

        return self::$database->fetchAllRows($sql);
    }
}
