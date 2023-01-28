<?php

class SponsorModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function setSponsor($uid, $name, $address, $contact, $type)
    {
        $query = "INSERT INTO sponsor (U_ID, Name, Address, Contact, Type ) values ('$uid','$name','$address', '$contact', '$type')";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }

    
}
