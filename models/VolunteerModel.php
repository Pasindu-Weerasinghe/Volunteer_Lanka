<?php

class VolunteerModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getVolunteerById($uid)
    {
        $query = "SELECT * FROM volunteer WHERE U_ID = '$uid' LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function setVolunteer($uid, $name, $address, $contact)
    {
        $query = "INSERT INTO volunteer (U_ID, Name, Address, Contact) VALUES ('$uid', '$name', '$address', '$contact')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function setInterest($uid, $area)
    {
        $query = "INSERT INTO vol_interest (U_ID, Interest) values ('$uid', '$area')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function setOrganization($uid, $organise)
    {
        $query = "INSERT INTO vol_organization (U_ID, Organization) values ('$uid', '$organise')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }
}
