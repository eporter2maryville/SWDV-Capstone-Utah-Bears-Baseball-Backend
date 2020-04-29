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
    $query = "SELECT e.EventNumber, e.AnnouncementNumber, e.Email, e.SessionID
                    , e.GameNumber, e.Type, e.Date, a.Time, e.Location
                    , e.Opponent, e.Score, e.Outcome
            FROM " . $this->table_name . " AS e
            ORDER BY
                e.Date ASC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}   
}
?>