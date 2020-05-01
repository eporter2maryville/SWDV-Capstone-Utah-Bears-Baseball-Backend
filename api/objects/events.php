<?php
class Event{
  
    // database connection and table name
    private $conn;
    private $table_name = "events";
    
    // object properties
    public $EventNumber;
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
 // read events
function read(){
  
    // select all query
    $query = "SELECT a.EventNumber
                    , a.GameNumber
                    , a.Type
                    , a.Date
                    , a.Time
                    , a.Location
                    , a.Opponent
                    , a.Score
                    , a.Outcome
            FROM " . $this->table_name . " AS a
            ORDER BY
                a.Date ASC";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}

// create event
function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                Type=:Type
                , Date=:Date
                , Time=:Time
                , Location=:Location
                , Opponent=:Opponent

                ";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->Type=htmlspecialchars(strip_tags($this->Type));
    $this->Date=htmlspecialchars(strip_tags($this->Date));
    $this->Time=htmlspecialchars(strip_tags($this->Time));
    $this->Location=htmlspecialchars(strip_tags($this->Location));
    $this->Opponent=htmlspecialchars(strip_tags($this->Opponent)); 
  
    // bind values
    $stmt->bindParam(":Type", $this->Type);
    $stmt->bindParam(":Date", $this->Date);
    $stmt->bindParam(":Time", $this->Time);
    $stmt->bindParam(":Location", $this->Location);
    $stmt->bindParam(":Opponent", $this->Opponent);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}

// update the event
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                Type=:Type
                , Date=:Date
                , Time=:Time
                , Location=:Location
                , Opponent=:Opponent
                , Score=:Score
                , Outcome=:Outcome

            WHERE
                EventNumber=:EventNumber
                ";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->EventNumber=htmlspecialchars(strip_tags($this->EventNumber));
    $this->Type=htmlspecialchars(strip_tags($this->Type));
    $this->Date=htmlspecialchars(strip_tags($this->Date));
    $this->Time=htmlspecialchars(strip_tags($this->Time));
    $this->Location=htmlspecialchars(strip_tags($this->Location));
    $this->Opponent=htmlspecialchars(strip_tags($this->Opponent));
    $this->Score=htmlspecialchars(strip_tags($this->Score));
    $this->Outcome=htmlspecialchars(strip_tags($this->Outcome));
     
    // bind new values
    $stmt->bindParam(":EventNumber", $this->EventNumber);
    $stmt->bindParam(":Type", $this->Type);
    $stmt->bindParam(":Date", $this->Date);
    $stmt->bindParam(":Time", $this->Time);
    $stmt->bindParam(":Location", $this->Location);
    $stmt->bindParam(":Opponent", $this->Opponent);
    $stmt->bindParam(':Score', $this->Score);
    $stmt->bindParam(':Outcome', $this->Outcome);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

// delete the product
function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE EventNumber = ?";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->EventNumber=htmlspecialchars(strip_tags($this->EventNumber));
  
    // bind EventNumber of record to delete
    $stmt->bindParam(1, $this->EventNumber);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

// used when filling up the update product form
function readOne(){
  
    // query to read single record
    $query = "SELECT a.EventNumber
                    , a.GameNumber
                    , a.Type
                    , a.Date
                    , a.Time
                    , a.Location
                    , a.Opponent
                    , a.Score
                    , a.Outcome
            FROM " . $this->table_name . " AS a
            WHERE
                a.EventNumber = ?
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
  
    // bind EventNumber of product to be updated
    $stmt->bindParam(1, $this->EventNumber);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->Type = $row['Type'];
    $this->Date = $row['Date'];
    $this->Time = $row['Time'];
    $this->Location = $row['Location'];
    $this->Opponent = $row['Opponent'];
    $this->Score = $row['Outcome'];
}

}
?>