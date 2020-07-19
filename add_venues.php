<?php
require_once __DIR__. './core/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $venue_name = trim(filter_input(INPUT_POST, 'venue_name', FILTER_SANITIZE_STRING));
    $venue_code = trim(filter_input(INPUT_POST, 'venue_code', FILTER_SANITIZE_STRING));
    $venue_location = trim(filter_input(INPUT_POST, 'venue_location', FILTER_SANITIZE_STRING));

    $sql = 'INSERT INTO venues(name, code, location) VALUES(:name, :code, :location)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name',$venue_name);
    $stmt->bindParam(':code',$venue_code);
    $stmt->bindParam(':location',$venue_location);

    $row = $stmt->execute();
   echo  json_encode($row); 
}