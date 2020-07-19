<?php
require_once __DIR__. './core/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim(filter_input(INPUT_POST,'title', FILTER_SANITIZE_STRING));
   $first_name = trim(filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_STRING));
   $last_name = trim(filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING));
   $email = trim(filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING));
   $phoneNo = trim(filter_input(INPUT_POST,'phoneno', FILTER_SANITIZE_STRING));
   $gender = trim(filter_input(INPUT_POST,'gender', FILTER_SANITIZE_STRING));
   $status = trim(filter_input(INPUT_POST,'status', FILTER_SANITIZE_STRING));
   $department = trim(filter_input(INPUT_POST,'department', FILTER_SANITIZE_STRING));
   

   $sql = 'INSERT INTO lectuerers(title, firstname, lastname, email, phone_no, gender, status, department) VALUES(:title,:first_name, :last_name, :email, :phoneNo, :gender, :status, :department)';


   $stmt = $db->prepare($sql);
   $stmt->bindParam(':title', $title);
   $stmt->bindParam(':first_name', $first_name);
   $stmt->bindParam(':last_name', $last_name);
   $stmt->bindParam(':email', $email);
   $stmt->bindParam(':phoneNo', $phoneNo);
   $stmt->bindParam(':gender', $gender);
   $stmt->bindParam(':status', $status);
   $stmt->bindParam(':department', $department);

   $row  = $stmt->execute();

   echo json_encode($row);

}

