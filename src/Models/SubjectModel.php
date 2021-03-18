<?php

namespace App\Models;

use App\Core\Model;

class SubjectModel extends Model
{

    function getAllSubjects(): array
    {
        $sql = 'SELECT id_subject, subject_label
        FROM subject';

        // Récupération des résultats
        return self::$database->fetchAllRows($sql);
    }

}
