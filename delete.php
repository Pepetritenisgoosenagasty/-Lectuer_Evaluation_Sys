<?php
require_once __DIR__. './core/init.php';
if ($_POST['courseId'] != '') {

    $sql = 'DELETE FROM courses WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['courseId']);
    $row = $stmt->execute();

    echo json_encode($row);
}

if ($_POST['venueId'] != '') {

    $sql = 'DELETE FROM venues WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['venueId']);
    $row = $stmt->execute();

    echo json_encode($row);
}

if ($_POST['repsId'] != '') {

    $sql = 'DELETE FROM class_reps WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['repsId']);
    $row = $stmt->execute();

    echo json_encode($row);
}

if ($_POST['lecId'] != '') {

    $sql = 'DELETE FROM lectuerers WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['lecId']);
    $row = $stmt->execute();

    echo json_encode($row);
}