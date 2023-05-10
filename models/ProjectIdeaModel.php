<?php 

class ProjectIdeaModel extends Model {
    
    function __construct() {
        parent::__construct();
    }

    function getProjectIdeas() {
        $query = "SELECT * FROM pr_ideas";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPI_Images($pi_id) {
        $query = "SELECT * FROM idea_image WHERE PI_ID = :pi_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pi_id', $pi_id);
        if($statement->execute()){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function getPrIdeaByID($pi_id) {
        $query = "SELECT * FROM pr_ideas WHERE PI_ID = :pi_id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pi_id', $pi_id);
        if($statement->execute()){
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
    }

    function getProjectIdea($uid)
    {
        $query = "SELECT * FROM pr_ideas WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getRepliedIdeas($uid)
    {
        $query = "SELECT * FROM pr_ideas WHERE PI_ID IN (SELECT PI_ID FROM pi_reply WHERE U_ID = :uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getReply($pi_id, $uid) {
        $query = "SELECT Reply FROM pi_reply WHERE PI_ID = :pi_id AND U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pi_id', $pi_id);
        $statement->bindParam(':uid', $uid);
        if($statement->execute()){
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    function setProjectIdea($description, $location, $uid)
    {
        $query = "INSERT INTO pr_ideas (Description, Location, U_ID) VALUES (:description, :location, :uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':location', $location);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    function replyToPrIdea($piid, $uid, $reply) {
        $query = "INSERT INTO pi_reply (PI_ID, U_ID, Reply) VALUES (:piid, :uid, :reply)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':piid', $piid);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':reply', $reply);
        return $statement->execute();
    }

    function setPiImage($piid, $image)
    {
        $query = "INSERT into idea_image (PI_ID, Image) VALUES (:piid, :image)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':piid', $piid[0]);
        $statement->bindParam(':image', $image);
        if($statement->execute()){
            header('Location: ' . BASE_URL . "volunteer/New_ideas");
        }
    }

    function deleteProjectIdea($piid)
    {
        $query = "DELETE FROM pr_ideas WHERE PI_ID = :piid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':piid', $piid);
        return $statement->execute();
    }

    function getPiId($uid, $location)
    {
        $query = "SELECT PI_ID FROM pr_ideas WHERE U_ID = :uid && Location = :location";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch();
    }
}
