<?php

    class CalendarModel extends Model
    {
        function __construct()
        {
            parent::__construct();
        }

        function getEventsVolunteer($uid, $date)
        {
            $query = "SELECT * FROM project INNER JOIN joins ON project.P_ID = joins.P_ID AND joins.U_ID = :uid AND project.Date = :date";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':uid', $uid);
            $statement->bindParam(':date', $date);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function getAllEventsVolunteer($uid, $date)
        {
            $query = "SELECT Date FROM project INNER JOIN joins ON project.P_ID = joins.P_ID AND joins.U_ID = :uid AND project.Date LIKE '$date%' ";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':uid', $uid);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function getEventsOrganizer($uid, $date)
        {
            $query = "SELECT * FROM project WHERE U_ID = :uid AND Date = :date";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':uid', $uid);
            $statement->bindParam(':date', $date);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function getAllEventsOrganizer($uid, $date)
        {
            $query = "SELECT Date FROM project WHERE U_ID = :uid AND Date LIKE '$date%' ";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':uid', $uid);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function getEventsSponsor($uid, $date)
        {
            $query = "SELECT * FROM project INNER JOIN sponsor_pr ON project.P_ID = sponsor_pr.P_ID AND sponsor_pr.U_ID = :uid AND project.Date = :date";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':uid', $uid);
            $statement->bindParam(':date', $date);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function getAllEventsSponsor($uid, $date)
        {
            $query = "SELECT Date FROM project INNER JOIN sponsor_pr ON project.P_ID = sponsor_pr.P_ID AND sponsor_pr.U_ID = :uid AND project.Date LIKE '$date%' ";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':uid', $uid);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>