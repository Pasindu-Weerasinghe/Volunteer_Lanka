<?php

class FeedbackModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setFeedback($des, $rating, $uid, $pid)
    {
        $query = "INSERT INTO feedback (Description, Rating, U_ID, P_ID) VALUES (:des, :rating, :uid, :pid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':des', $des);
        $statement->bindParam(':rating', $rating);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':pid', $pid);
        $statement->execute();
    }

    function getFeedbacks($pid)
    {
        $query = "SELECT * FROM feedback WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>