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

    function getNotificationCount($uid)
    {
        $query = "SELECT COUNT(Notify_ID) AS `count` FROM `notification` WHERE U_ID = :uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC)['count'];
    }

    function getNotifications($uid)
    {
        $query = "SELECT * FROM `notification` WHERE U_ID = :uid ORDER BY Notify_ID DESC";
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

    function setUpcomingProjectReminder($uid, $message, $pid, $date): bool
    {
        $query = "CREATE EVENT IF NOT EXISTS `upcoming_project_reminder_$uid$pid`
                    ON SCHEDULE AT DATE_SUB(:date, INTERVAL 1 DAY)
                    DO
                        INSERT INTO `notification` (U_ID, Message, Type, Event_ID)
                        VALUES (:uid, :message, 'upcoming_pr', :pid)";

        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->bindParam(':pid', $pid);
        $statement->bindParam(':message', $message);
        $statement->bindParam(':date', $date);
        return $statement->execute();
    }

    function updateUpcomingProjectReminder($uid, $pid, $date): bool
    {
        $query = "ALTER EVENT `upcoming_project_reminder_$uid$pid` ON SCHEDULE AT DATE_SUB(:date, INTERVAL 1 DAY)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':date', $date);
        return $statement->execute();
    }

    function dropUpcomingProjectReminder($uid, $pid): bool
    {
        $query = "DROP EVENT IF EXISTS `upcoming_project_reminder_$uid$pid`";
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }
}