<?php

class BlogModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function setPost($pid, $description)
    {
        $query = "INSERT INTO `post` (`P_ID` ,`Description`) VALUES (:pid ,:description)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':pid' => $pid,
            ':description' => $description
        ]);
    }

    function setPostImage($pid, $image)
    {
        $query = "INSERT INTO `post_image` (`P_ID` ,`Image`) VALUES (:pid ,:image)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':pid' => $pid,
            ':image' => $image
        ]);
    }

    function setPostToBlog($uid, $pid) {
        $query = "INSERT INTO `blog_post` (`U_ID`, `P_ID`) VALUES (:uid, :pid)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':uid' => $uid,
            ':pid' => $pid
        ]);
    }
}