<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/events.php';
  
// instantiate database and event object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$Event = new Event($db);
  
// read events will be here
// query events
$stmt = $Event->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $events_arr=array();
    $events_arr["records"]=array();
  
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $event_item=array(
            "EventNumber"=> $EventNumber,
            "GameNumber" => $GameNumber,
            "Type" => $Type,
            "Date" => $Date,
            "Time" => $Time,
            "Location" => $Location,
            "Opponent" => $Opponent,
            "Score" => $Score,
            "Outcome" => $Outcome
        );
        array_push($events_arr["records"], $event_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($events_arr);
}
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No events found.")
    );
}