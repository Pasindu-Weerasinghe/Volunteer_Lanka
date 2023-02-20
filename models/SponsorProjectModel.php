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

}