<?php

class ProjectModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setProject($pname, $date, $time, $venue, $description, $no_of_volunteers, $area, $sponsorship, $collab, $uid)
    {
        $query = "INSERT INTO project (Name, Date, Time, Venue, Description, No_of_volunteers, Area, Sponsor, Collab, Status, U_ID) 
                    VALUES (:pname, :date, :time, :venue, :description, :no_of_volunteers, :area, :sponsorship, :collab, 'active', :uid)";

        $statement = $this->db->prepare($query);
        $statement->bindParam(':pname', $pname);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':time', $time);
        $statement->bindParam(':venue', $venue);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':no_of_volunteers', $no_of_volunteers);
        $statement->bindParam(':area', $area);
        $statement->bindParam(':sponsorship', $sponsorship);
        $statement->bindParam(':collab', $collab);
        $statement->bindParam(':uid', $uid);
        if ($statement->execute()) {
            return $this->db->lastInsertId();
        } else {
            return null;
        }
    }

    function setProjectCompleteEvent($pid, $date, $type = 'create') {
        if($type == 'create') {
            $query = "CREATE EVENT IF NOT EXISTS `complete_pr_$pid` 
                        ON SCHEDULE AT :date + INTERVAL 2 DAY
                        DO
                            UPDATE `project` SET Status = 'completed' WHERE P_ID = :pid";
        } else if($type == 'update') {
            $query = "ALTER EVENT IF NOT EXISTS `complete_pr_$pid` 
                        ON SCHEDULE AT :date + INTERVAL 2 DAY
                        DO
                            UPDATE `project` SET Status = 'completed' WHERE P_ID = :pid";
        }
        $statement = $this->db->prepare($query);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':pid', $pid);
        return $statement->execute();
    }

    function dropProjectCompleteEvent($pid) {
        $query = "DROP EVENT IF EXISTS `complete_pr_$pid`";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    function setCollaborateProject($pid)
    {
        $query = "INSERT INTO `collaborate_project` (P_ID) VALUES (:pid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        return $statement->execute();

    }

    function setCollaborator($pid, $uid)
    {
        $query = "INSERT INTO `partners` (P_ID, U_ID, Status) VALUES (:pid, :uid, 'pending')";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    function updateCollaborator($pid, $uid, $status)
    {
        $query = "UPDATE `partners` SET Status = :status WHERE P_ID = :pid AND U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':status', $status);
        return $statement->execute();
    }

    function deleteCollaborator($pid, $uid)
    {
        $query = "DELETE FROM `partners` WHERE P_ID = :pid AND U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    function setSponsorNotice($pid, $uid, $amount)
    {
        $query = "INSERT INTO `sponsor_notice` (P_ID, U_ID, Amount) VALUES (:pid, :uid, :amount)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':amount', $amount);
        return $statement->execute();
    }

    function setSNPackage($pid, $package, $amount)
    {
        $query = "INSERT INTO `sn_packages` (P_ID, `Package`, `Range`) VALUES (:pid, :package, :amount)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':package', $package);
        $statement->bindParam(':amount', $amount);
        return $statement->execute();
    }

    function getUpcomingProjects($uid, $limit = null)
    {
        $query = "SELECT * FROM (
                            SELECT * FROM `project` WHERE U_ID = :uid AND Status = 'active'
                            UNION
                            SELECT `project`.* FROM `project`
                            INNER JOIN `partners` ON `project`.`P_ID` = `partners`.`P_ID`
                            WHERE `partners`.`U_ID` = :uid AND `partners`.`Status` = 'accepted' AND `project`.`Status` = 'active'
                    ) AS results
                    ORDER BY results.Date ASC";

        if ($limit != null) {
            $query .= " LIMIT :limit";
        }

        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        if ($limit != null) {
            $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
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
        $query = "INSERT INTO form_for_volunteers (P_ID, Email, Contact, Meal_pref, Prior_participation) 
                    VALUES (:pid, :email, :contact, :meal_pref, :prior_part)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':contact', $contact);
        $statement->bindParam(':meal_pref', $meal_pref);
        $statement->bindParam(':prior_part', $prior_part);
        return $statement->execute();
    }

    function getVolunteerForm($pid)
    {
        $query = "SELECT Email, Contact, Meal_pref, Prior_participation FROM form_for_volunteers WHERE P_ID = :pid";
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

    function getProjectImage($pid)
    {
        $query = "SELECT Image FROM pr_image WHERE P_ID = $pid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUpcomingProjectsVolunteer($date_now) //All upcoming projects
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
        $query = "SELECT * FROM joins INNER JOIN project ON joins.P_ID = project.P_ID WHERE joins.U_ID = $uid AND project.Status='completed' OR project.Status = 'blogged'";
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

    function getProjectsOrganizer($uid)
    {
        $query = "SELECT * FROM project WHERE U_ID = $uid and Status = 'blogged'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function setProjectImage($pid, $image)
    {
        $query = "INSERT INTO  pr_image (P_ID, Image) VALUES (:pid, :image)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':image', $image);
        return $statement->execute();
    }

    function updateProject($pid, $pname, $venue, $volunteers, $description)
    {
        $query = "UPDATE `project` SET Name = :pname, Venue = :venue, No_of_volunteers = :volunteers, Description = :description WHERE P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':pname', $pname);
        $statement->bindParam(':venue', $venue);
        $statement->bindParam(':volunteers', $volunteers);
        $statement->bindParam(':description', $description);
        return $statement->execute();
    }

    function cancelProject($pid, $uid, $cancel_reason)
    {
        $this->db->beginTransaction();
        try {
            $query = "UPDATE project SET Status = 'cancelled' WHERE P_ID = :pid";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':pid', $pid);
            $statement->execute();

            $query = "INSERT INTO `cancels` (P_ID, U_ID, Date, Reason) VALUES (:pid, :uid, CURRENT_DATE, :cancel_reason)";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':pid', $pid);
            $statement->bindParam(':uid', $uid);
            $statement->bindParam(':cancel_reason', $cancel_reason);
            $statement->execute();

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    function postponeProject($pid, $uid, $postpone_reason, $postpone_date, $postpone_time)
    {
        $this->db->beginTransaction();
        try {
            $query = "UPDATE project SET Date = :postpone_date, Time = :postpone_time WHERE P_ID = :pid";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':pid', $pid);
            $statement->bindParam(':postpone_date', $postpone_date);
            $statement->bindParam(':postpone_time', $postpone_time);
            $statement->execute();

            $query = "INSERT INTO `postpones` (P_ID, U_ID, Date, Reason) 
                      VALUES (:pid, :uid, CURRENT_DATE, :postpone_reason)";
            $statement = $this->db->prepare($query);
            $statement->bindParam(':pid', $pid);
            $statement->bindParam(':uid', $uid);
            $statement->bindParam(':postpone_reason', $postpone_reason);
            $statement->execute();

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
  
    function getAllProjectfeeDetails(){
        $query="SELECT * FROM (SELECT sub_fee.PAY_ID, sub_fee.Date, sub_fee.Amount, organizer.U_ID, organizer.Name,
        'Monthly Subscription' AS PaymentType FROM sub_fee 
        INNER JOIN organizer ON sub_fee.U_ID = organizer.U_ID 
        UNION 
        SELECT project_fee.PAY_ID, project_fee.Date, project_fee.Amount, organizer.U_ID, organizer.Name,
        'Extra Project' AS PaymentType FROM project_fee 
        INNER JOIN organizer ON project_fee.U_ID = organizer.U_ID) 
        AS results ORDER BY results.Date ASC";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // if query faileds
            return 'query failed';
        }
    }
    function searchPayement($searchTerm){
        $query="SELECT * FROM (SELECT sub_fee.PAY_ID, sub_fee.Date, sub_fee.Amount, organizer.U_ID, organizer.Name,
        'Monthly Subscription' AS PaymentType FROM sub_fee 
        INNER JOIN organizer ON sub_fee.U_ID = organizer.U_ID 
        UNION 
        SELECT project_fee.PAY_ID, project_fee.Date, project_fee.Amount, organizer.U_ID, organizer.Name,
        'Extra Project' AS PaymentType FROM project_fee 
        INNER JOIN organizer ON project_fee.U_ID = organizer.U_ID )
        AS results 
        WHERE results.Name LIKE '%{$searchTerm}%' OR results.Date LIKE '{$searchTerm}%' OR results.PaymentType LIKE '{$searchTerm}%'
        ORDER BY results.Date ASC";
        $statement = $this->db->prepare($query);
        if ($statement->execute()) {
            // if query successful
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // if query faileds
            return 'query failed';
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
