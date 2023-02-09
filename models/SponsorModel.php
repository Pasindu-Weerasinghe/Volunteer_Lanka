<?php 
class SponsorModel extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function getSponsorbyId($id){
        $query = "SELECT Name FROM sponsor WHERE U_ID=$id";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}


?>