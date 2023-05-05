<?php

class BlogModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function setBlog($pid, $uids, $description) {
        $this->db->beginTransaction();
        try {
            $query = "UPDATE project SET Description = :description WHERE P_ID = :pid";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':pid', $pid);
            $statement->bindParam(':description', $description);
            $statement->execute();




            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    function getBLogOfOrganizer($uid) {
        $query = "SELECT P_ID, Title, Description, Date, Time FROM project WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}