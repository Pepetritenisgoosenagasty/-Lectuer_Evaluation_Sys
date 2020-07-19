<?php
require_once __DIR__. './core/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $first_name = trim(filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING));
   $last_name = trim(filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING));
   $index = trim(filter_input(INPUT_POST,'index', FILTER_SANITIZE_STRING));
   $email = trim(filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING));
   $phoneNo = trim(filter_input(INPUT_POST,'phoneNo', FILTER_SANITIZE_STRING));
   $gender = trim(filter_input(INPUT_POST,'gender', FILTER_SANITIZE_STRING));
   $faculty = trim(filter_input(INPUT_POST,'faculty', FILTER_SANITIZE_STRING));
   $department = trim(filter_input(INPUT_POST,'department', FILTER_SANITIZE_STRING));
   $course = trim(filter_input(INPUT_POST,'course', FILTER_SANITIZE_STRING));
   $session = trim(filter_input(INPUT_POST,'session', FILTER_SANITIZE_STRING));
   $level = trim(filter_input(INPUT_POST,'level', FILTER_SANITIZE_STRING));
   $password = trim(filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING));
   

   $sql = 'INSERT INTO class_reps(firstname, lastname, indexNo, email, phoneno, gender, faculty, department, course, session, level, password) VALUES(:first_name, :last_name, :index, :email, :phoneNo, :gender, :faculty, :department, :course, :session, :level, :password)';
   $pass_hash =  password_hash($password, PASSWORD_DEFAULT);

   $stmt = $db->prepare($sql);
   $stmt->bindParam(':first_name', $first_name);
   $stmt->bindParam(':last_name', $last_name);
   $stmt->bindParam(':index', $index);
   $stmt->bindParam(':email', $email);
   $stmt->bindParam(':phoneNo', $phoneNo);
   $stmt->bindParam(':gender', $gender);
   $stmt->bindParam(':faculty', $faculty);
   $stmt->bindParam(':department', $department);
   $stmt->bindParam(':course', $course);
   $stmt->bindParam(':session', $session);
   $stmt->bindParam(':level', $level);
   $stmt->bindParam(':password', $pass_hash);

   $row  = $stmt->execute();

   echo json_encode($row);

}

