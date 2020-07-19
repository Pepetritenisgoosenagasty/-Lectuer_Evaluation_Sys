<?php
require_once __DIR__. './core/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_title = trim(filter_input(INPUT_POST, "course_title", FILTER_SANITIZE_STRING));
    $course_code = trim(filter_input(INPUT_POST, "course_code", FILTER_SANITIZE_STRING));
    $faculty = trim(filter_input(INPUT_POST, "faculty", FILTER_SANITIZE_STRING));
    $department = trim(filter_input(INPUT_POST, "department", FILTER_SANITIZE_STRING));
    $session = trim(filter_input(INPUT_POST, "session", FILTER_SANITIZE_STRING));
    $level = trim(filter_input(INPUT_POST, "level", FILTER_SANITIZE_STRING));
    $lecturer = trim(filter_input(INPUT_POST, "lecturer", FILTER_SANITIZE_STRING));
    $venue = trim(filter_input(INPUT_POST, "venue", FILTER_SANITIZE_STRING));
    $unit = trim(filter_input(INPUT_POST, "unit", FILTER_SANITIZE_STRING));

    $stmt = $db->prepare("INSERT INTO courses(course_title, course_code, faculty, department, session, level, lecturer, venue, unit) VALUES(:course_title, :course_code, :faculty, :department, :session, :level, :lecturer, :venue, :unit)");
    $stmt->bindParam(':course_title', $course_title);
    $stmt->bindParam(':course_code', $course_code);
    $stmt->bindParam(':faculty', $faculty);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':session', $session);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':lecturer', $lecturer);
    $stmt->bindParam(':venue', $venue);
    $stmt->bindParam(':unit', $unit);
    $form = $stmt->execute();
}

echo json_encode($form);



