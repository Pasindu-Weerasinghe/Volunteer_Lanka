<?php 
class ChatModel extends Model{
    function __construct()
    {
        parent::__construct();
    }
    function getUserDatatoChat($uid,$role){
        $query = "SELECT Name FROM " .$role. " WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return 'query failed';
        }
    }
    function searchUserInChat($outgoing_id,$searchTerm){
        $query = "SELECT * FROM organizer WHERE NOT U_ID = {$outgoing_id} AND (Name LIKE '%{$searchTerm}%')";
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




?>