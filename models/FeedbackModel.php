<?php

class FeedbackModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setFeedback($uid, $des, $pid)
    {
        $query = "INSERT INTO feedback (Description, U_ID, P_ID) VALUES (:description, :uid, :pid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':description', $des);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':pid', $pid);
        $statement->execute();
    }


}

?>