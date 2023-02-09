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
        $query = "SELECT Image FROM ad_image WHERE AD_ID = $adid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function setAd($description,$uid)
    {
        $query = "INSERT INTO advertisement (Description,Status,Sponsor) VALUES ('$description','pending','$uid')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function setAdImage($adid,$image)
    {
        $query = "INSERT into ad_image (AD_ID, Image) VALUES ('$adid[0]','$image')";
        $statement = $this->db->prepare($query);
        if($statement->execute()){
            //header('Location: ' . BASE_URL . "Sponsor/index");
            echo "<script>alert('Successfully upload the advertisement');location.href='http://localhost/Volunteer_Lanka/sponsor/publish_advertisement';</script>";

        }
        

    }

    function getAdId($uid, $description)
    {
        $query = "SELECT AD_ID FROM advertisement WHERE Sponsor = '$uid' && Description = '$description'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch();
    }

}