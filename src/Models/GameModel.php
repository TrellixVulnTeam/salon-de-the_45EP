<?php



namespace App\Models;

use App\Core\Model;

class GameModel extends Model
{

    function getAllGames(): array
    {
        $sql = 'SELECT *
FROM game

ORDER BY name
';

        return self::$database->fetchAllRows($sql);
    }

    function insertGame(string $title, string $extension, int $player, int $max_player, string $time, string $max_time, int $difficulty, int $max_difficulty, int $age): ?int
    {
        $sql = 'INSERT INTO game
            (name, extension , player, maximumPlayer, duration, maximumDuration , difficulty, maximumDifficulty, age)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

        return self::$database->insertQuery($sql, [$title, $extension, $player, $max_player, $time, $max_time,  $difficulty, $max_difficulty, $age]);
    }

    function deleteGame(int $postId)
    {
        $sql = 'DELETE FROM game WHERE id = ?';

        self::$database->executeQuery($sql, [$postId]);
    }
}
