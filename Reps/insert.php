<?php
session_start();  
require_once '../config/config.php';
require_once '../libraries/Database.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $session = trim(filter_input(INPUT_POST,'session',FILTER_SANITIZE_STRING));
    $semester = trim(filter_input(INPUT_POST,'semester',FILTER_SANITIZE_STRING));
    $faculty = trim(filter_input(INPUT_POST,'faculty',FILTER_SANITIZE_STRING));
    $department = trim(filter_input(INPUT_POST,'department',FILTER_SANITIZE_STRING));
    $course = trim(filter_input(INPUT_POST,'course',FILTER_SANITIZE_STRING));
    $course_code = trim(filter_input(INPUT_POST,'course_code',FILTER_SANITIZE_STRING));
    $assigned_venue = trim(filter_input(INPUT_POST,'assigned_venue',FILTER_SANITIZE_STRING));
    $new_venue = trim(filter_input(INPUT_POST,'new_venue',FILTER_SANITIZE_STRING));
    $level = trim(filter_input(INPUT_POST,'level',FILTER_SANITIZE_STRING));
    $programme = trim(filter_input(INPUT_POST,'programme',FILTER_SANITIZE_STRING));
    $lec = trim(filter_input(INPUT_POST,'lec',FILTER_SANITIZE_STRING));
    $ldate = trim(filter_input(INPUT_POST,'ldate',FILTER_SANITIZE_STRING));
    $stime = trim(filter_input(INPUT_POST,'stime',FILTER_SANITIZE_STRING));
    $etime = trim(filter_input(INPUT_POST,'etime',FILTER_SANITIZE_STRING));
    $status = trim(filter_input(INPUT_POST,'status',FILTER_SANITIZE_STRING));

    $sql = 'INSERT INTO results(class_rep_id, session, semester, faculty, department, course_title, course_code, assigned_venue, new_venue, programme, level, lecturer, ldate, start_time, end_time, status) VALUES (:class_rep_id, :session, :semester, :faculty, :department, :course_title, :course_code, :assigned_venue, :new_venue, :programme, :level, :lecturer, :ldate, :start_time, :end_time, :status)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':class_rep_id', $_SESSION['user_id']);
    $stmt->bindParam(':session', $session);
    $stmt->bindParam(':semester', $semester);
    $stmt->bindParam(':faculty', $faculty);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':course_title', $course);
    $stmt->bindParam(':course_code', $course_code);
    $stmt->bindParam(':assigned_venue', $assigned_venue);
    $stmt->bindParam(':new_venue', $new_venue);
    $stmt->bindParam(':programme', $programme);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':lecturer', $lec);
    $stmt->bindParam(':ldate',  $ldate);
    $stmt->bindParam(':start_time', $stime);
    $stmt->bindParam(':end_time', $etime);
    $stmt->bindParam(':status', $status);

    $row = $stmt->execute();

    echo json_encode($row);

}

    
?>