<?php 
class SponsorModel extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function getSponsorbyAdId($adid){
        $query = "SELECT Name FROM sponsor WHERE U_ID=$adid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}


?>