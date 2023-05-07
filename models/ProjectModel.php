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
        // TODO: check this again!
        $query = "INSERT INTO `sponsor_notice` (P_ID, U_ID, Amount) VALUES (:pid, :uid, :amount)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':amount', $amount);
        return $statement->execute();
    }

    function setSNPackage($pid, $package, $amount)
    {
        $query = "INSERT INTO `sn_package` (P_ID, Package, Range) VALUES (:pid, :package, :amount)";
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
        $query = "SELECT Image FROM pr_image WHERE P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
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
}
