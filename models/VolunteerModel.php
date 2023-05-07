<?php

class VolunteerModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getVolunteerById($uid)
    {
        $query = "SELECT * FROM volunteer WHERE U_ID = :uid LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function setVolunteer($uid, $name, $address, $contact)
    {
        $query = "INSERT INTO volunteer (U_ID, Name, Address, Contact) VALUES (:uid, :name, :address, :contact)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':contact', $contact);
        return $statement->execute();
    }

    function setInterest($uid, $area)
    {
        $query = "INSERT INTO vol_interest (U_ID, Interest) values (:uid, :area)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':area', $area);
        return $statement->execute();
    }

    function setOrganization($uid, $organise)
    {
        $query = "INSERT INTO vol_organization (U_ID, Organization) values (:uid, :organise)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':organise', $organise);
        return $statement->execute();
    }

    function getUserData($uid)
    {
        $query = "SELECT * FROM user WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getVolunteerData($uid)
    {
        $query = "SELECT * FROM volunteer WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getVolunteerSearch()
    {
        $query = "SELECT * FROM volunteer";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getJoinedVolunteersOfProject($pid) {
        $query = "SELECT volunteer.U_ID, volunteer.Name, volunteer.Contact, user.Email, user.Photo, joins.Meal, joins.Prior_part
                    FROM joins 
                    INNER JOIN volunteer ON joins.U_ID = volunteer.U_ID
                    INNER JOIN user ON joins.U_ID = user.U_ID
                    WHERE joins.P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    
}
