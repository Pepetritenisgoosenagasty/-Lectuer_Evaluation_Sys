<?php
require_once __DIR__. './core/init.php';

if (isset($_POST['course_id'])) {

    $sql = 'SELECT * FROM courses WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['course_id']);
    $stmt->execute();
    $row = $stmt->fetch(); 

    echo json_encode($row);
}

if (isset($_POST['venue_id'])) {
    $sql = 'SELECT * FROM venues WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['venue_id']);
    $stmt->execute();
    $row = $stmt->fetch(); 

    echo json_encode($row);
}

if (isset($_POST['reps_id'])) {
    $sql = 'SELECT * FROM class_reps WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['reps_id']);
    $stmt->execute();
    $row = $stmt->fetch(); 

    echo json_encode($row);
}

if (isset($_POST['lec_id'])) {
    $sql = 'SELECT * FROM lectuerers WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['lec_id']);
    $stmt->execute();
    $row = $stmt->fetch(); 

    echo json_encode($row);
}