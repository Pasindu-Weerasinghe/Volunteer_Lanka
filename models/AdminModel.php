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

    function setAdReason($adid, $reason) {
        $query = "UPDATE advertisement SET Reason = :reason WHERE AD_ID = :adid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':reason', $reason);
        $statement->bindParam(':adid', $adid);
        return $statement->execute();
    }
    function setComplainResponse($cid,$response) {
        $query = "UPDATE complaints SET Response = :response WHERE C_ID = :cid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':response', $response);
        $statement->bindParam(':cid', $cid);
        return $statement->execute();
    }  
    function deleteUser($uid){
        $query = "UPDATE user SET Status = 'delete' WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    } 
    function restrictUser($uid){
        $query = "UPDATE user SET Status = 'restrict' WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }
    function activeUser($uid){
        $query = "UPDATE user SET Status = 'active' WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }
    function getUserData($uid){
        $query="SELECT admin.U_ID,admin.Name, user.Role, user.Status FROM admin INNER JOIN user 
        ON admin.U_ID=user.U_ID WHERE admin.U_ID= :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);  
        
    }
}