<?php

class NotificationModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function setNotification($uid, $message, $type = 'normal', $event_id = null): bool
    {
        $query = "INSERT INTO `notification` (U_ID, Message, Type, Event_ID) VALUES (:uid, :message, :type, :event_id)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':message', $message);
        $statement->bindParam(':type', $type);
        $statement->bindParam(':event_id', $event_id);
        return $statement->execute();
    }

    function getNotifications($uid)
    {
        $query = "SELECT * FROM `notification` WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        } else {
            return false;
        }
    }

    function deleteNotification($nid): bool
    {
        $query = "DELETE FROM `notification` WHERE Notify_ID = :nid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':nid', $nid);
        return $statement->execute();
    }

    function deleteAllNotifications($uid): bool
    {
        $query = "DELETE FROM `notification` WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        return $statement->execute();
    }
}