<?php 
class AdminModel extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function setAdmin($uid,$name){
        $query = "INSERT INTO admin (U_ID, Name) VALUES (:uid, :name)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':name', $name);
        return $statement->execute();
    }
}