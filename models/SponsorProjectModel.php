<?php

class SponsorProjectModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

   

    function getSPAmount($pid)
    {
        $query = "SELECT Amount FROM sponsor_notice WHERE P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function saveSponsorPackage($uid, $pid, $amount, $package)
    {
        $query = "INSERT INTO sponsor_pr (U_ID, P_ID, Amount, Package) VALUES (:uid, :pid, :amount, :package)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':uid', $uid, PDO::PARAM_INT);
        $statement->bindValue(':pid', $pid, PDO::PARAM_INT);
        $statement->bindValue(':amount', $amount, PDO::PARAM_STR);
        $statement->bindValue(':package', $package, PDO::PARAM_STR);
        return $statement->execute();
    }

}