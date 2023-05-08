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
    function getUserRolebyId($uid){
        $query = "SELECT role FROM user WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return 'query failed';
        }
    }
    //chat
    
    
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
        $query = "UPDATE user SET `Password` = '$password' WHERE Email = '$email'";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function setComplain($about, $description, $uid)
    {
        $query = "INSERT INTO complaints (About, Complain, U_ID) VALUES ('$about', '$description', '$uid')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function getCurrentPsw($uid)
    {
        $query = "SELECT Password FROM user WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    function changeUserPsw($uid,$password)
    {
        $query = "UPDATE user SET Password = '$password' WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }
    function getAllUserDetails($uid){
        $query = "SELECT organizer.U_ID,organizer.Name, user.Role, user.Status FROM organizer INNER JOIN user 
        ON organizer.U_ID=user.U_ID WHERE NOT user.U_ID = {$uid} 
        UNION 
        SELECT sponsor.U_ID,sponsor.Name, user.Role, user.Status FROM sponsor INNER JOIN user 
        ON sponsor.U_ID=user.U_ID WHERE NOT user.U_ID = {$uid} 
        UNION 
        SELECT volunteer.U_ID,volunteer.Name, user.Role, user.Status FROM volunteer INNER JOIN user 
        ON volunteer.U_ID=user.U_ID WHERE NOT user.U_ID = {$uid} 
        UNION 
        SELECT admin.U_ID,admin.Name, user.Role, user.Status FROM admin INNER JOIN user 
        ON admin.U_ID=user.U_ID WHERE NOT user.U_ID = {$uid};";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // if query faileds
            return 'query failed';
        }
    }
    function searchUser($uid,$searchTerm){
        $query = "SELECT organizer.U_ID,organizer.Name, user.Role, user.Status FROM organizer INNER JOIN user 
        ON organizer.U_ID=user.U_ID WHERE NOT user.U_ID = {$uid} AND 
        ((Name LIKE '%{$searchTerm}%') OR (Role LIKE '{$searchTerm}%') OR (Status Like '{$searchTerm}%'))
        UNION 
        SELECT sponsor.U_ID,sponsor.Name, user.Role, user.Status FROM sponsor INNER JOIN user 
        ON sponsor.U_ID=user.U_ID WHERE NOT user.U_ID = {$uid} AND 
        ((Name LIKE '%{$searchTerm}%') OR (Role LIKE '{$searchTerm}%') OR (Status Like '{$searchTerm}%'))
        UNION 
        SELECT volunteer.U_ID,volunteer.Name, user.Role, user.Status FROM volunteer INNER JOIN user 
        ON volunteer.U_ID=user.U_ID WHERE NOT user.U_ID = {$uid} AND 
        ((Name LIKE '%{$searchTerm}%') OR (Role LIKE '{$searchTerm}%') OR (Status Like '{$searchTerm}%'))
        UNION 
        SELECT admin.U_ID,admin.Name, user.Role, user.Status FROM admin INNER JOIN user 
        ON admin.U_ID=user.U_ID WHERE NOT user.U_ID = {$uid} AND 
        ((Name LIKE '%{$searchTerm}%') OR (Role LIKE '{$searchTerm}%') OR (Status Like '{$searchTerm}%'))";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // if query faileds
            return 'query failed';
        }

    }
}
