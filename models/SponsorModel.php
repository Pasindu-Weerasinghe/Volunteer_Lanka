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

    public function updateProfilePic($uid, $profilepic)
    {
        $filename = basename($profilepic);
        $query = "UPDATE user SET Photo=:profilepic WHERE U_ID=:uid";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':profilepic', $filename);
        $statement->bindValue(':uid', $uid);
        $statement->execute();
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

    function getSponsorsOfProject($pid)
    {
        $query = "SELECT `sponsor`.`U_ID`, `sponsor`.`Name`, `user`.`Photo`, `sponsor_pr`.`Package`, `sponsor_pr`.`Amount`
                    FROM `sponsor_pr`
                    INNER JOIN `sponsor` ON `sponsor_pr`.`U_ID` = `sponsor`.`U_ID`
                    INNER JOIN `user` ON `sponsor`.`U_ID` = `user`.`U_ID`
                    WHERE `sponsor_pr`.`P_ID` = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPackages($uid)
    {
        $query = "SELECT COUNT(*) AS total, 
                    SUM(CASE WHEN Package = 'silver' THEN 1 ELSE 0 END) AS silver, 
                    SUM(CASE WHEN Package = 'gold' THEN 1 ELSE 0 END) AS gold, 
                    SUM(CASE WHEN Package = 'platinum' THEN 1 ELSE 0 END) AS platinum, 
                    SUM(CASE WHEN Package = 'other' THEN 1 ELSE 0 END) AS other 
                    FROM sponsor_pr WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getAdvertisements($uid)
    {
        $query = "SELECT advertisement.Description, ad_image.Image FROM advertisement 
                    INNER JOIN ad_image on advertisement.AD_ID = ad_image.AD_ID
                    WHERE advertisement.Sponsor= :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }



    public function getTotalAmount($uid)
    {
        $query = "SELECT Package, SUM(Amount) as totalAmount FROM sponsor_pr WHERE U_ID = :uid GROUP BY Package";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $package_amounts = array(
            'silver' => 0,
            'gold' => 0,
            'platinum' => 0,
            'other' => 0
        );

        foreach ($result as $row) {
            $package_amounts[strtolower($row['Package'])] = $row['totalAmount'];
        }

        return $package_amounts;
    }
}
