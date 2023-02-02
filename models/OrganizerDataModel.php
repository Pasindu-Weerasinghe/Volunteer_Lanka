<?php

class OrganizerDataModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getOrganizerData()
    {
        $query = "SELECT * FROM organizer";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}