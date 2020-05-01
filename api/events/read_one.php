<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/events.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare event object
$event = new Event($db);
  
// set EventNumber property of record to read
$event->EventNumber = isset($_GET['EventNumber']) ? $_GET['EventNumber'] : die();
  
// read the details of event to be edited
$event->readOne();
  
if($event->name!=null){
    // create array
    $event_arr = array(
        "EventNumber" =>  $event->EventNumber,
        "GameNumber" => $GameNumber,
        "Type" => $Type,
        "Date" => $Date,
        "Time" => $Time,
        "Location" => $Location,
        "Opponent" => $Opponent,
        "Score" => $Score,
        "Outcome" => $Outcome
  
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($event_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user event does not exist
    echo json_encode(array("message" => "Event does not exist."));
}
?>