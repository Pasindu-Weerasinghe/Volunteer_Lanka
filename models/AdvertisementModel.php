<?php
class AdvertisementModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getAdvertisementRequests()
    {
        $query = "SELECT advertisement.AD_ID,advertisement.Status,advertisement.Reason,advertisement.Sponsor,ad_image.Image FROM advertisement INNER JOIN ad_image ON advertisement.AD_ID=ad_image.AD_ID";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function getAdImage($adid){
        $query = "SELECT `Image` FROM ad_image WHERE AD_ID = :adid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':adid', $adid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    function getAdvertisementRequest($adid){
        $query = "SELECT AD_ID,Description,Sponsor FROM advertisement WHERE AD_ID=:adid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':adid', $adid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    function accept_ad_req($adid){
        $query = "UPDATE advertisement SET Status='Accepted' WHERE AD_ID='$adid'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement;
    }
    
}
