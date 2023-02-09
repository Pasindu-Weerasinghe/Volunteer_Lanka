<?php

class OrganizerModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setOrganizer($uid, $name, $no_of_members, $branch, $address, $contact)
    {
        $query = "INSERT INTO organizer (U_ID, Name, No_of_members, Branch, Address, Contact) VALUES ('$uid', '$name', '$no_of_members', '$branch', '$address', '$contact')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }


    function getOrganizerData()
    {
        $query = "SELECT * FROM organizer";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function searchOrganizers($key)
    {
        $query = "SELECT * FROM organizer WHERE Name LIKE '%$key%'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getOrganizerByID($uid) {
        $query = "SELECT * FROM organizer WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }
}
