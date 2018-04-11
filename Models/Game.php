<?php

namespace Models;

/**
* Class Game
*
*/
class Game extends Model {

    /**
    * Table fields
    *
    * @var array
    * @var int
    * @var string
    * @var string
    * @var string
    * @var string
    * @var timestamp
    * @var timestamp 
    *
    */
    private static $table = "games";
    private $id;
    private $username;
    private $email;
    private $password;
    private $type;
    private $description;
    private $created_at;
    private $updated_at;

    public static function find ($email) {
        $result = \Database::query("SELECT * FROM " . User::$table . " WHERE email=?;", "s", $email);
        if ($result->num_rows == 0 ) {
            return NULL;
        }
        $row = $result->fetch_assoc();
        $game = new Game();
        $game->id = $row['id'];
        $game->username = $row['username'];
        $game->email = $row['email'];
        $game->password = $row['pin'];
        $game->type = $row['type'];
        $game->description = $row['description'];
        $game->created_at = $row['created_at'];
        $game->updated_at = $row['updated_at'];
        return $game;
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->password;
    }
}