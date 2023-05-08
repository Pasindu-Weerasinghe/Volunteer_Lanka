<?php

class SponsorNoticeModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getSponsorNotices()
    {
        $query = "SELECT sponsor_notice.*, project.Name, project.Date FROM sponsor_notice 
                INNER JOIN project ON project.P_ID = sponsor_notice.P_ID
                WHERE project.Status = 'active'";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSponsoredProjects($uid, $status = null) {
        $query = "SELECT sponsor_pr.*, project.Name, project.Date From sponsor_pr 
                    INNER JOIN project ON project.P_ID = sponsor_pr.P_ID 
                    WHERE sponsor_pr.U_ID = :uid";
        if($status == 'active') {
            $query .= " AND project.Status = 'active'";
        }
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSPAmount($pid)
    {
        $query = "SELECT Amount FROM sponsor_notice WHERE P_ID = :pid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':pid', $pid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function saveSponsorPackage($uid, $pid, $amount, $package)
    {
        $query = "INSERT INTO sponsor_pr (U_ID, P_ID, Amount, Package) VALUES (:uid, :pid, :amount, :package)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':uid', $uid, PDO::PARAM_INT);
        $statement->bindValue(':pid', $pid, PDO::PARAM_INT);
        $statement->bindValue(':amount', $amount, PDO::PARAM_STR);
        $statement->bindValue(':package', $package, PDO::PARAM_STR);
        return $statement->execute();
    }
    public function getSponsorPackage($uid, $pid)
    {
        $query = "SELECT * FROM sponsor_pr WHERE U_ID = $uid AND P_ID = $pid";
        $result = $this->db->query($query);

        if ($result->rowCount() > 0) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}
