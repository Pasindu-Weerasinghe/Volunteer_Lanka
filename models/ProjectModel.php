<?php

class ProjectModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setProject($uid, $name, $no_of_members, $branch, $address, $contact)
    {
        $query = "INSERT INTO organizer (U_ID, Name, No_of_members, Branch, Address, Contact) VALUES ('$uid', '$name', '$no_of_members', '$branch', '$address', '$contact')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }
    
    function getProjects($uid, $name, $no_of_members, $branch, $address, $contact)
    {
        $query = "INSERT INTO organizer (U_ID, Name, No_of_members, Branch, Address, Contact) VALUES ('$uid', '$name', '$no_of_members', '$branch', '$address', '$contact')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }
}
