<?php

class SponsorModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getSponsorbyId($id)
    {
        $query = "SELECT Name FROM sponsor WHERE U_ID=:id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function setSponsor($uid, $name, $address, $contact, $type)
    {
        $query = "INSERT INTO sponsor (U_ID, `Name`, Address, Contact, `Type` ) VALUES (:uid, :name, :address, :contact, :type)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':contact', $contact);
        $statement->bindParam(':type', $type);
        return $statement->execute();
    }
    // function updateProfilePic($uid, $filename)
    // {
    //     $query = "UPDATE user SET Photo  = :filename WHERE U_ID = :uid";
    //     $statement = $this->db->prepare($query);
    //     $statement->bindParam(':filename', $filename);
    //     $statement->bindParam(':uid', $uid);
    //     $statement->execute();
    // }

    public function updateProfilePic($uid, $profilepic)
{
    $filename = basename($profilepic);

     $sql = "UPDATE user SET Photo=:profilepic WHERE U_ID=:uid";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':profilepic', $filename);
    $stmt->bindValue(':uid', $uid);
    $stmt->execute();
}



    function getUserData($uid)
    {
        $query = "SELECT * FROM user WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getSponsorData($uid)
    {
        $query = "SELECT * FROM sponsor WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getSponsorName($uid)
    {
        $query = "SELECT Name FROM sponsor WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch();
    }
}
