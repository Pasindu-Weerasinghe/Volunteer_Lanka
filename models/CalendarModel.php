class CalendarModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getEvents($uid, $date)
    {
        $query = "SELECT * FROM project INNER JOIN joins WHERE project.P_ID = joins.P_ID AND joins.U_ID = $uid";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':uid', $uid);
        $statement->execute();
        return $statement->fetch();
    }
}