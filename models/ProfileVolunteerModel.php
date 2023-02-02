<?php

class ProfileVolunteerModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getUserData($uid)
    {
        $query = "SELECT * FROM user WHERE $uid = U_ID";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getVolunteerData($uid)
    {
        $query = "SELECT * FROM volunteer WHERE $uid = U_ID";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    

}