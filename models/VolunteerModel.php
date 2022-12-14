<?php

class VolunteerModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getVolunteerById($uid)
    {
        $query = "SELECT * FROM volunteer WHERE U_ID = '$uid' LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
