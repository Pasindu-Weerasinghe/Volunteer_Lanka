<?php

class LoginModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getUserData($uname)
    {
        $query = "SELECT * FROM user WHERE Email='$uname' LIMIT 1";
        $statement = $this->db->prepare($query);

        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return null;
        }
    }
}
