<?php

class UserModel extends Model
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
            return 'query failed';
        }
    }

    function checkEmailExist($email)
    {
        $query = "SELECT Email FROM user WHERE Email='$email' LIMIT 1";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            if ($statement->rowCount()) {
                // if email exists
                return true;
            } else {
                // if email does not exist
                return false;
            }
        } else {
            // if query failed
            return 'query failed';
        }
    }
}
