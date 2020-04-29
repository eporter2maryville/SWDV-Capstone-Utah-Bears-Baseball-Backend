<?php
class Event{
  
    // database connection and table name
    private $conn;
    private $table_name = "events";
    
    // object properties
    public $EventNumber;
    public $AnnouncementNumber;
    public $Email;
    public $SessionID;
    public $GameNumber;
    public $Type;
    public $Date;
    public $Time;
    public $Location;
    public $Opponent;
    public $Score;
    public $Outcome;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
 // read products
function read(){
  
    // select all query
    $query = "SELECT a.EventNumber, a.AnnouncementNumber, a.Email, a.SessionID
                    , a.GameNumber, a.Type, a.Date, a.Time, a.Location
                    , a.Opponent, a.Score, a.Outcome
            FROM " . $this->table_name . " AS a
            ORDER BY
                a.Date ASC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}   
}
?>