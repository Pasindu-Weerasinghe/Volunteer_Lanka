<?php

class UserModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setUser($email, $hash_psw, $role)
    {
        $query = "INSERT INTO user (Email, Password, Role, Status, Restricted) VALUES ('$email', '$hash_psw', '$role', 'active', '0')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function getUserData($email)
    {
        $query = "SELECT * FROM user WHERE Email='$email' LIMIT 1";
        $statement = $this->db->prepare($query);

        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return 'query failed';
        }
    }

    function getUserId($email)
    {
        $query = "SELECT U_ID FROM user WHERE Email = '$email' LIMIT 1";
        $statement = $this->db->prepare($query);

        if ($statement->execute()) {
            // if query successful
            $uid = $statement->fetch(PDO::FETCH_ASSOC);
            return $uid['U_ID'];
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

    function changePassword($email, $password) {
        $query = "UPDATE user SET Password = '$password' WHERE Email = '$email'";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }
}
