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

}