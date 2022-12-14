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
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
