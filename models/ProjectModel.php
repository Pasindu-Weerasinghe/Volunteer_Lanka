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
                    VALUES ('$pname', '$date', '$time', '$venue', '$description', '$no_of_volunteers', $sponsorship, $collab, 'active', $uid)";

        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            return $this->db->lastInsertId();
        } else {
            return null;
        }
    }


    function getProjects($uid)
    {
        $query = "SELECT * FROM project WHERE U_ID = '$uid'";
        $statement = $this->db->prepare($query);

        if ($statement->execute()) {
            // if query successful
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
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
        $query  =  "INSERT INTO form_for_volunteers (P_ID, Email, Contact, Meal_pref, Prior_participation) VALUES ('$pid', '$email', '$contact', '$meal_pref', '$prior_part')";
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
    function getSpProjects($pid)
    {
        $query = "SELECT  Name, Date FROM project WHERE Sponsor = 1 AND P_ID=$pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function getSponsored()
    {
        $query = "SELECT P_ID,U_ID FROM sponsor_pr";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function getSponsor()
    {
        $query = "SELECT P_ID,U_ID FROM sponsor_notice";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function removeProject($pid)
    {
        $query = "DELETE FROM sponsor_notice WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function getProjectImage($pid)
    {
        $query = "SELECT Image FROM pr_image WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPrice($pid)
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

    function getUpcomingProjects($date_now) //All upcoming projects
    {
        $query = "SELECT P_ID, Name, Date FROM project WHERE Status!='completed' AND `Date` > '$date_now'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getJoinedProjects($uid) //Projects that the volunteer has joined
    {
        $query = "SELECT P_ID FROM joins WHERE U_ID = $uid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getMyUpcomingProjects($uid) //Details of the joined and upcoming projects by the volunteer
    {
        $query = "SELECT * FROM joins INNER JOIN project ON joins.P_ID = project.P_ID WHERE joins.U_ID = $uid AND project.Status='active'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getMyCompletedProjects($uid) //Details of the completed projects by the volunteer
    {
        $query = "SELECT * FROM joins INNER JOIN project ON joins.P_ID = project.P_ID WHERE joins.U_ID = $uid AND project.Status='completed'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSuggestedProjects($interest)
    {
        $query = "SELECT * FROM project WHERE Status = 'active' AND Area LIKE '%$interest%'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function joinProject($uid, $pid, $contact, $meal, $prior)
    {
        $query  =  "INSERT INTO  joins (U_ID, P_ID, Contact, Meal, Prior_part) VALUES ('$uid', '$pid', '$contact', '$meal', '$prior')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function isJoined($pid, $uid)
    {
        $query = "SELECT * FROM joins WHERE P_ID = $pid AND U_ID = $uid LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $isJoined = $statement->fetch(PDO::FETCH_ASSOC);
        if ($isJoined != null) {
            return 1;
        } else {
            return 0;
        }
    }

    function leaveProject($pid, $uid)
    {
        $query = "DELETE FROM joins WHERE P_ID = $pid AND U_ID = $uid";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function getJoinedCount($pid)
    {
        $query = "SELECT COUNT(U_ID) AS Count FROM joins WHERE P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->execute();
        return $statement->fetch();
    }

    function getProject($pid)
    {

        $query = "SELECT * FROM project WHERE P_ID =$pid";
        $statement = $this->db->prepare($query);

        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return 'query failed';
        }
    }
    function getAmounts($pid, $uid)
    {
        $query = "SELECT Amount FROM sponsor_notice WHERE P_ID = $pid AND U_ID = $uid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getOrganizer($uid)
    {
        $query = "SELECT Name FROM organizer WHERE U_ID =$uid";
        $statement = $this->db->prepare($query);

        if ($statement->execute()) {
            // if query successful
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            // if query failed
            return 'query failed';
        }
    }




    function setProjectImage($pid, $image)
    {
        $query  =  "INSERT INTO  pr_image (P_ID, Image) VALUES ('$pid', '$image')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function getLastId()
    {
        $query = "SELECT P_ID FROM project ORDER BY P_ID DESC LIMIT 1";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            $pid = $statement->fetch(PDO::FETCH_ASSOC);
            return $pid['P_ID'];
        } else {
            return 0;
        }
    }

    function getProjectsByName($key)    //search projetcs function
    {
        $query = "SELECT * FROM project WHERE Name LIKE '%$key%' AND Status = 'active'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProjectsByArea($key)    //search projetcs function
    {
        $query = "SELECT * FROM project WHERE Area LIKE '%$key%' AND Status = 'active'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProjectsByDate($key)    //search projetcs function
    {
        $query = "SELECT * FROM project WHERE Date LIKE '%$key%' AND Status = 'active'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProjectsByLocation($key)    //search projetcs function
    {
        $query = "SELECT * FROM project WHERE Venue LIKE '%$key%' AND Status = 'active'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProjectsByOrganizer($key)    //search projetcs function
    {
        $query = "SELECT * FROM project INNER JOIN organizer ON project.U_ID = organizer.U_ID WHERE organizer.Name LIKE '%$key%' AND Status = 'active'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
