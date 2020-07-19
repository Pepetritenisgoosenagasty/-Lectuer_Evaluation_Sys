<?php
require_once __DIR__. './core/init.php';
if ($_POST['course_id'] != '') {

    $sql = 'UPDATE courses SET course_title = :course_title, course_code = :course_code, faculty = :faculty, department = :department, session = :session, level = :level, lecturer = :lecturer, venue = :venue, unit = :unit WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['course_id']);
    $stmt->bindParam(':course_title', $_POST['course_title']);
    $stmt->bindParam(':course_code', $_POST['course_code']);
    $stmt->bindParam(':faculty', $_POST['faculty']);
    $stmt->bindParam(':department', $_POST['department']);
    $stmt->bindParam(':session', $_POST['session']);
    $stmt->bindParam(':level', $_POST['level']);
    $stmt->bindParam(':lecturer', $_POST['lecturer']);
    $stmt->bindParam(':venue', $_POST['venue']);
    $stmt->bindParam(':unit', $_POST['unit']);
    

   $row = $stmt->execute();
    
    echo json_encode($row);
}

if ($_POST['venue_id'] != '') {

    $sql = 'UPDATE venues SET name = :venue_name, code = :venue_code, location = :venue_location WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['venue_id']);
    $stmt->bindParam(':venue_name', $_POST['venue_name']);
    $stmt->bindParam(':venue_code', $_POST['venue_code']);
    $stmt->bindParam(':venue_location', $_POST['venue_location']);

   $row = $stmt->execute();
    
    echo json_encode($row);
}

if ($_POST['reps_id'] != '') {

    $sql = 'UPDATE class_reps SET firstname = :first_name, lastname = :last_name, indexNo = :index, email = :email, phoneno = :phoneno, course = :course, department = :department, level = :level, session = :session WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['reps_id']);
    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':index', $_POST['index']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':phoneno', $_POST['phoneno']);
    $stmt->bindParam(':course', $_POST['course']);
    $stmt->bindParam(':department', $_POST['department']);
    $stmt->bindParam(':level', $_POST['level']);
    $stmt->bindParam(':session', $_POST['session']);


   $row = $stmt->execute();
    
    echo json_encode($row);
}

if ($_POST['lec_id'] != '') {

    $sql = 'UPDATE lectuerers SET title = :title, firstname = :first_name, lastname = :last_name, email = :email, phone_no = :phoneno, status = :status, department = :department, gender = :gender WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_POST['lec_id']);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':first_name', $_POST['first_name']);
    $stmt->bindParam(':last_name', $_POST['last_name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':phoneno', $_POST['phoneno']);
    $stmt->bindParam(':gender', $_POST['gender']);
    $stmt->bindParam(':status', $_POST['status']);
    $stmt->bindParam(':department', $_POST['department']);
   


   $row = $stmt->execute();
    
    echo json_encode($row);
}

if ($_POST['pro_id'] != '') {
    
    if ($_POST['password'] == '') {
            $sql = 'UPDATE users SET firstname = :first_name, lastname = :last_name, email = :email, phoneno = :phoneno, gender = :gender WHERE id = :id';
            
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $_POST['pro_id']);
            $stmt->bindParam(':first_name', $_POST['firstname']);
            $stmt->bindParam(':last_name', $_POST['lastname']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':phoneno', $_POST['phoneno']);
            $stmt->bindParam(':gender', $_POST['gender']);

           $row = $stmt->execute();
       }   else {
         $sql = 'UPDATE users SET firstname = :first_name, lastname = :last_name, email = :email, phoneno = :phoneno, gender = :gender, password = :password WHERE id = :id';
            $new_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $_POST['pro_id']);
            $stmt->bindParam(':first_name', $_POST['firstname']);
            $stmt->bindParam(':last_name', $_POST['lastname']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':phoneno', $_POST['phoneno']);
            $stmt->bindParam(':gender', $_POST['gender']);
            $stmt->bindParam(':password', $new_pass);

           $row = $stmt->execute();
       }
    
    echo json_encode($row);
}