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
}