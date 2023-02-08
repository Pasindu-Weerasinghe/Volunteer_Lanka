<?php

class ProjectModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setProject($pname,  $date, $time, $venue, $description, $no_of_volunteers, $sponsorship, $uid)
    {
        $query  =  "INSERT INTO 
                    project (Name, Date, Time, Venue, Description, No_of_volunteers, Sponsor, Status, U_ID) 
                    VALUES ('$pname', '$date', '$time', '$venue', '$description', '$no_of_volunteers', '$sponsorship', 'active', '$uid')";

        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    
    function getProjects($uid)
    {
        $query = "SELECT * FROM project WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);
        
        if($statement->execute()){
            // if query successful
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } 

        else{
            // if query failed
            return 'query failed';
        }
    }

    function getProjectId($pname, $uid)
    {
        $query  =  "SELECT P_ID FROM project WHERE Name = '$pname' AND U_ID = '$uid'";

        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query is successful
            $pid = $statement->fetch(PDO::FETCH_ASSOC);
            return $pid['P_ID'];
        } else {
            // if query failed
            return 'query failed';
        }
    }

    function setVolunteerForm($pid, $email, $contact, $meal_pref, $prior_part)
    {
        $query  =  "INSERT INTO 
                    form_for_volunteers (P_ID, Email, Contact, Meal_pref, Prior_participation) 
                    VALUES ('$pid', '$email', '$contact', '$meal_pref', '$prior_part')";

        $statement = $this->db->prepare($query);
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
        $query = "SELECT Amount FROM sponsor_notice WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getSPAmount($pid)
    {
        $query = "SELECT Amount FROM sponsor_pr WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
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
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}
