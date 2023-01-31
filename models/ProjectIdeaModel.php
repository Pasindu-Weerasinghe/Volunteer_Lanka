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

    function getPI_Image($pi_id) {
        $query = "SELECT * FROM idea_image WHERE PI_ID = '$pi_id'";
        $statement = $this->db->prepare($query);
        if($statement->execute()){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function getProjectIdea($uid)
    {
        $query = "SELECT * FROM pr_ideas WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function setProjectIdea($description, $location, $uid)
    {
        $query = "INSERT INTO pr_ideas (Description, Location, U_ID) VALUES ('$description', '$location', '$uid')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function setPiImage($piid, $fileName)
    {
        $query = "INSERT into idea_image (PI_ID, Image) VALUES ('$piid[0]','$fileName')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function getPiId($uid, $location)
    {
        $query = "SELECT PI_ID FROM pr_ideas WHERE U_ID = '$uid' && Location = '$location'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch();
    }
}
