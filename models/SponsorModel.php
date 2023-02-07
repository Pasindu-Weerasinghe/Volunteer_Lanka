<?php

class SponsorModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getSponsorName($uid)
    {
        $query = "SELECT Name FROM sponsor WHERE U_ID = $uid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch();
    }

}