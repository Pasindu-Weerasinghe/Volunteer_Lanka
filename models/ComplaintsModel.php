<?php
class ComplaintsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getComplaints()
    {
        $query = "SELECT * FROM complaints";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function getComplaintDetails(){
        $query = "SELECT complaints.C_ID, complaints.About, complaints.U_ID, complaints.Complain, user.Role FROM complaints INNER JOIN user on complaints.U_ID = user.U_ID;";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function getUserDatatoComplain($uid,$role){
        $query = "SELECT Name FROM " .$role. " WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            return 'query failed';
        }
    }
    function getComplaint($cid){
        $query = "SELECT * FROM complaints WHERE C_ID = $cid";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            return 'query failed';
        }
    }
    function getUserRolebyId($uid){
        $query = "SELECT Role FROM user WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return 'query failed';
        }
    }
    
}
