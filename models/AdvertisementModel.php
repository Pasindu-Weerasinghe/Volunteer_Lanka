<?php
class AdverisementModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getAdvertisementRequests()
    {
        $sql = "SELECT AD_ID,Sponsor FROM advertisement";
        $result = mysqli_query($conn, $sql);
        $ads = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
