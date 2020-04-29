<?php
class Announcement{
  
    // database connection and table name
    private $conn;
    private $table_name = "announcements";
    
    // object properties
    public $AnnouncementNumber;
    public $Email;
    public $SessionID;
    public $EventNumber;
    public $Date;
    public $Body;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
 // read products
function read(){
  
    // select all query
    $query = "SELECT a.AnnouncementNumber, a.Email, a.SessionID, a.EventNumber, a.Date, a.Body
            FROM " . $this->table_name . " AS a
            ORDER BY
                p.Date ASC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}   
}
?>