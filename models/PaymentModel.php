<?php

class PaymentModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    // TODO: check whether this function is correct
    function setSubFee($amount, $uid)
    {
        $query = "INSERT INTO `sub_fee` (`Amount`, `U_ID`) VALUE (:amount, :uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':amount', $amount);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    function setExtraProjectFee($amount, $quantity, $uid)
    {
        $query = "INSERT INTO `project_fee` (Amount, Quantity, U_ID) VALUE (:amount, :quantity, :uid)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':amount', $amount);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }

    function getThisMonthSubFee($uid)
    {
        $query = "SELECT Amount FROM `sub_fee` 
                    WHERE U_ID = :uid AND MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())";

        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function setPaymentDetails($uid, $first_name, $last_name, $contact, $email, $address, $city)
    {
        $query = "SELECT * FROM `payment_details` WHERE U_ID = :uid LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $query = "UPDATE `payment_details` 
                        SET `First_name` = :first_name, `Last_name` = :last_name, `Contact` = :contact,
                            `Email` = :email, `Address` = :address, `City` = :city
                        WHERE `U_ID` = :uid";

        } else {
            $query = "INSERT INTO `payment_details` (`U_ID`, `First_name`, `Last_name`, `Contact`, `Email`, `Address`, `City`) 
                        VALUE (:uid, :first_name, :last_name, :contact, :email, :address, :city)";
        }

        $statement = $this->db->prepare($query);
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);
        $statement->bindParam(':contact', $contact);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':city', $city);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();


    }

    function getPaymentDetails($uid)
    {
        $query = "SELECT * FROM `payment_details` WHERE U_ID = :uid LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getExtraProjectCount($uid)
    {
        $query = "SELECT Quantity FROM `project_fee` WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}