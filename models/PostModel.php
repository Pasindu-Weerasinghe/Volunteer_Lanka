<?php

class PostModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getPostImages($pid)
    {
        $query = "SELECT Image FROM post_image WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPostDescription($pid)
    {
        $query = "SELECT Description FROM post WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>