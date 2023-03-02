<?php

class AdModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getAds()
    {
        $query = "SELECT * FROM advertisement";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAdImage($adid)
    {
        $query = "SELECT Image FROM ad_image WHERE AD_ID = :adid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':adid', $adid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function setAd($description,$uid)
    {
        $query = "INSERT INTO advertisement (Description,Status,Sponsor) VALUES (:description,'pending',:uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    //! ********************************This function is wrong
    function setAdImage($adid,$image)
    {
        $query = "INSERT into ad_image (AD_ID, Image) VALUES (:adid,:image)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':adid', $adid[0]);
        $statement->bindParam(':image', $image);
        if($statement->execute()){
            //header('Location: ' . BASE_URL . "Sponsor/index");
            echo "<script>alert('Successfully upload the advertisement');location.href='http://localhost/Volunteer_Lanka/sponsor/publish_advertisement';</script>";

        }
    }

    function getAdId($uid, $description)
    {
        $query = "SELECT AD_ID FROM advertisement WHERE Sponsor = :uid && Description :description";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':description', $description);
        $statement->execute();
        return $statement->fetch();
    }

}