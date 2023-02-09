<?php

class SponsorModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function setSponsor($uid, $name, $address, $contact, $type)
    {
        $query = "INSERT INTO sponsor (U_ID, Name, Address, Contact, Type ) values ('$uid','$name','$address', '$contact', '$type')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function getUserData($uid)
    {
        $query = "SELECT * FROM user WHERE $uid = U_ID";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getSponsorData($uid)
    {
        $query = "SELECT * FROM sponsor WHERE $uid = U_ID";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getSponsorName($uid)
    {
        $query = "SELECT Name FROM sponsor WHERE U_ID = $uid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch();
    }
}
