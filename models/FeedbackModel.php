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

    function isFeedbackGiven($pid, $uid)
    {
        $query = "SELECT * FROM feedback WHERE P_ID = $pid AND U_ID = $uid LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $isGiven = $statement->fetch(PDO::FETCH_ASSOC);
        if ($isGiven != null) {
            return 1;
        } else {
            return 0;
        }
    }


}

?>