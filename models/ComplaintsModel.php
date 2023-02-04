<?php
class ComplaintsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getComplaints()
    {
        $query = "SELECT C_ID,About,Complain,U_ID FROM complaints";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
