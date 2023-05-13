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

    function setAd($description,$pid, $uid)
    {
        $query = "INSERT INTO advertisement (Description,P_ID, Status,Sponsor) VALUES (:description, :pid, 'pending',:uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':pid', $pid);
        return $statement->execute();
    }

    //! ********************************This function is wrong
    function setAdImage($adid,$image)
    {
        $query = "INSERT into ad_image (AD_ID, Image) VALUES (:adid,:image)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':adid', $adid[0]);
        $statement->bindParam(':image', $image);
        return $statement->execute();
    }

    function getAdId($uid, $description)
    {
        $query = "SELECT AD_ID FROM advertisement WHERE Sponsor = :uid && Description = :description";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':description', $description);
        $statement->execute();
        return $statement->fetch();
    }

    function getAdSponsor($pid, $uid) {
        $query = "SELECT * FROM advertisement WHERE Sponsor = :uid AND P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':pid', $pid);
        $statement->execute();
        return $statement->fetch();
    }

}