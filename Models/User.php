<?php

namespace Models;

/**
* Class User
*
*/
class User extends Model {

    /**
    * Table fields
    *
    * @var array
    * @var int
    * @var string
    * @var string
    * @var string
    * @var timestamp
    * @var timestamp 
    *
    */
    public static $table = "users";
    public $id;
    public $username;
    public $email;
    public $pin;
    public $lang;
    public $created_at;
    public $updated_at;

    public static function find ($email) {
        $result = \Database::query("SELECT * FROM " . User::$table . " WHERE email=?;", "s", [$email]);
        if ($result->num_rows == 0 ) {
            return NULL;
        }
        $row = $result->fetch_assoc();
        $user = new User();
        $user->id = $row['id'];
        $user->username = $row['username'];
        $user->email = $row['email'];
        $user->pin = $row['pin'];
        $user->lang = $row['lang'];
        $user->created_at = $row['created_at'];
        $user->updated_at = $row['updated_at'];
        return $user;
    }

    /**
     * @return mixed
     */
    public function getPin() {
        return $this->pin;
    }
}
