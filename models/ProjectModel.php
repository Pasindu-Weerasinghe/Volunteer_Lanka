<?php

class ProjectModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setProject($pname,  $date, $time, $venue, $description, $no_of_volunteers, $sponsorship, $collab, $uid)
    {
        $query  =  "INSERT INTO project (Name, Date, Time, Venue, Description, No_of_volunteers, Sponsor, Collab, Status, U_ID) 
                    VALUES (:pname, :date, :time, :venue, :description, :no_of_volunteers, :sponsorship, :collab, 'active', :uid)";

        $statement = $this->db->prepare($query);
        $statement->bindParam(':pname', $pname);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':time', $time);
        $statement->bindParam(':venue', $venue);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':no_of_volunteers', $no_of_volunteers);
        $statement->bindParam(':sponsorship', $sponsorship);
        $statement->bindParam(':collab', $collab);
        $statement->bindParam(':uid', $uid);
        if($statement->execute()) {
            return $this->db->lastInsertId();
        } else {
            return null;
        }
    }

    function setCollaborateProject($pid) {
        $query = "INSERT INTO `collaborate_project` (P_ID) VALUES (:pid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        return $statement->execute();

    }

    function setCollaborator($pid, $uid) {
        $query = "INSERT INTO `partners` (P_ID, U_ID, Status) VALUES (:pid, :uid, 'active')";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();

    }

    function setSponsorNotice($amount, $package, $price, $qty, $pid, $uid){
        // TODO: check this again!
        $query = "INSERT INTO `sponsor_notice` (Amount, Package, Price, Quantity, P_ID, U_ID) 
                  VALUES (:amount, :package, :price, :qty, :pid, :uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':amount', $amount);
        $statement->bindParam(':package', $package);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':qty', $qty);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    function getUpcomingProjects($uid)
    {
        $query = "SELECT `project`.*
                  FROM `project`
                  INNER JOIN `partners` ON `project`.P_ID = `partners`.U_ID
                  WHERE (`project`.U_ID = :uid OR `partners`.U_ID = :uid) AND `project`.Status = 'active'";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return 'query failed';
        }
    }

    function getCompletedProjects($uid)
    {
        $query = "SELECT * FROM project WHERE U_ID = :uid AND Status = 'completed'";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return 'query failed';
        }
    }

    function setVolunteerForm($pid, $email, $contact, $meal_pref, $prior_part)
    {
        $query  =  "INSERT INTO form_for_volunteers (P_ID, Email, Contact, Meal_pref, Prior_participation) 
                    VALUES (:pid, :email, :contact, :meal_pref, :prior_part)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':contact', $contact);
        $statement->bindParam(':meal_pref', $meal_pref);
        $statement->bindParam(':prior_part', $prior_part);
        return $statement->execute();
    }


    function getSponsorProjects()
    {
        $query = "SELECT P_ID, Name, Date FROM project WHERE Sponsor = 1";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getAmount($pid)
    {
        $query = "SELECT Amount FROM sponsor_notice WHERE P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return null;
        }
    }

    function getSPAmount($pid)
    {
        $query = "SELECT Amount FROM sponsor_pr WHERE P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return null;
        }
    }

    function cardsVolunteer()
    {
        $query = "SELECT P_ID, Name, Date FROM project WHERE Status='active'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProjectImage($pid)
    {
        $query = "SELECT Image FROM pr_image WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProject($pid)
    {
        $query = "SELECT * FROM project WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return null;
        }
    }

    function setProjectImage($pid, $image)
    {
        $query  =  "INSERT INTO  pr_image (P_ID, Image) VALUES (:pid, :image)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':image', $image);
        return $statement->execute();
    }
}
