<?php

class BlogModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function setPost($pid, $description) {
        $sql = "INSERT INTO `post` (`Description`) VALUES (:description)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            ':pid' => $pid,
            ':description' => $description
        ));
    }
}