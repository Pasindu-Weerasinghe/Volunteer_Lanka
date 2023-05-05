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

    function canceledProjectCount($uid) {
        $query = "SELECT COUNT(*) AS row_count
                    FROM `cancels`
                    WHERE MONTH(`Date`) = MONTH(NOW()) AND YEAR(`Date`) = YEAR(NOW()) AND `U_ID` = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        if ($statement->execute()) {
            return $statement->fetch(PDO::FETCH_ASSOC)['row_count'];
        } else {
            return false;
        }
    }

    function getCollaboratorsOfProject($pid) {
        $query = "SELECT `partners`.`U_ID`, `user`.`Name`, `user`.`Photo`
                    FROM `partners`
                    INNER JOIN `user` ON `partners`.`U_ID` = `user`.`U_ID`
                    WHERE `partners`.`P_ID` = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
