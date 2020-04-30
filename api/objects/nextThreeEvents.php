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
    $query = "SELECT *
            FROM " . $this->table_name . " WHERE Date >= current_timestamp
            ORDER BY
                Date ASC LIMIT 3";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}   
}
?>