<?php

class OrganizerModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setOrganizer($uid, $name, $no_of_members, $branch, $address, $contact)
    {
        $query = "INSERT INTO organizer (U_ID, `Name`, No_of_members, Branch, Address, Contact) 
                    VALUES (:uid, :name, :no_of_members, :branch, :address, :contact)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':no_of_members', $no_of_members);
        $statement->bindParam(':branch', $branch);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':contact', $contact);
        return $statement->execute();
    }

    function getOrganizerDatafromuser($uid){
        $query = "SELECT * FROM user WHERE U_ID = $uid";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getOrganizerData()
    {
        $query = "SELECT * FROM organizer";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function searchOrganizers($key)
    {
        $query = "SELECT * FROM organizer WHERE Name LIKE :key";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':key', "%$key%");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function searchOrganizersWithPhoto($key)
    {
        if ($key === '') {
            $query = "SELECT `user`.U_ID, `user`.Photo, organizer.Name
                      FROM `user`
                      INNER JOIN `organizer`
                      ON `user`.U_ID = `organizer`.U_ID";
            $statement = $this->db->prepare($query);
        } else {
            $query = "SELECT `user`.U_ID, `user`.Photo, organizer.Name
                      FROM `user`
                      INNER JOIN `organizer`
                      ON `user`.U_ID = `organizer`.U_ID
                      WHERE organizer.Name LIKE :key";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':key', "%$key%");
        }

        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

//
//        if ($statement->execute()) {
//            return $statement->fetch(PDO::FETCH_ASSOC);
//        } else {
//            return null;
//        }
//    }

    function getProjectCreateCount($uid) {
        $query = "SELECT COUNT(*) AS row_count
                    FROM `project`
                    WHERE MONTH(`Create_date`) = MONTH(NOW()) AND YEAR(`Create_date`) = YEAR(NOW()) AND `U_ID` = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_ASSOC)['row_count'];
        } else {
            return null;
        }
    }

    function canceledProjectCount($uid) {
        $query = "SELECT COUNT(*) AS row_count
                    FROM `cancels`
                    WHERE MONTH(`Date`) = MONTH(NOW()) AND YEAR(`Date`) = YEAR(NOW()) AND `U_ID` = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_ASSOC)['row_count'];
        } else {
            return null;
        }
    }

    function postponedProjectCount($uid) {
        $query = "SELECT COUNT(*) AS row_count
                    FROM `postpones`
                    WHERE MONTH(`Date`) = MONTH(NOW()) AND YEAR(`Date`) = YEAR(NOW()) AND `U_ID` = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_ASSOC)['row_count'];
        } else {
            return null;
        }
    }

    function getCollaboratorsOfProject($pid, $status = null) {
        $query = "SELECT `partners`.`U_ID`, `organizer`.`Name`, `user`.`Photo`, `partners`.`Status`
                    FROM `partners`
                    INNER JOIN `user` ON `partners`.`U_ID` = `user`.`U_ID`
                    INNER JOIN `organizer` ON `partners`.`U_ID` = `organizer`.`U_ID`
                    WHERE `partners`.`P_ID` = :pid";

        if($status !== null) {
            $query .= " AND `partners`.`Status` = :status";
        }

        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        if($status !== null) {
            $statement->bindParam(':status', $status);
        }
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

  function getOrganizerByID($uid)
    {
        $query = "SELECT organizer.U_ID, organizer.Name, organizer.No_of_members, organizer.Branch, organizer.Address,
                    organizer.Contact, user.Email, user.Photo
                    FROM organizer
                    INNER JOIN user ON organizer.U_ID = user.U_ID
                    WHERE organizer.U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getOrganizers($key)
    {
        $query = "SELECT U_ID FROM organizer WHERE Name LIKE :key";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':key', "%$key%", PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
