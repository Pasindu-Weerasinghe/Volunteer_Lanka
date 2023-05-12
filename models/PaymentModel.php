<?php

class PaymentModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    // TODO: check whether this function is correct
    function setSubFee($amount, $uid) {
        $query = "INSERT INTO `sub_fee` (`Amount`, `U_ID`) VALUE (:amount, :uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':amount', $amount);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    function setExtraProjectFee($amount, $quantity, $uid) {
        $query = "INSERT INTO `project_fee` (Amount, Quantity, U_ID) VALUE (:amount, :quantity, :uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':amount', $amount);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    function getThisMonthSubFee($uid) {
        $query = "SELECT Amount FROM `sub_fee` 
                    WHERE U_ID = :uid AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())";

        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getExtraProjectCount($uid) {
        $query = "SELECT Quantity FROM `project_fee` WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}