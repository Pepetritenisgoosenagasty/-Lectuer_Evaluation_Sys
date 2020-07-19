<?php 
session_start();  
require_once '../config/config.php';
require_once '../libraries/Database.php';

$db = new Database();

if ($_POST['pro_id'] != '') {
    if ($_POST['password'] == '') {
          $sql = 'UPDATE class_reps SET firstname = :first_name, lastname = :last_name, indexNo = :index, gender = :gender, email = :email, phoneno = :phoneno, level = :level, session = :session WHERE id = :id';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['user_id']);
            $stmt->bindParam(':first_name', $_POST['firstname']);
            $stmt->bindParam(':last_name', $_POST['lastname']);
            $stmt->bindParam(':index', $_POST['index']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':phoneno', $_POST['phoneno']);
            $stmt->bindParam(':gender', $_POST['gender']);
            $stmt->bindParam(':level', $_POST['level']);
            $stmt->bindParam(':session', $_POST['session']);
            $pro = $stmt->execute();
      }else {
          $sql = 'UPDATE class_reps SET firstname = :first_name, lastname = :last_name, indexNo = :index, gender = :gender, email = :email, phoneno = :phoneno, level = :level, session = :session, password = :password WHERE id = :id';
            $stmt = $db->prepare($sql);
            $new_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bindParam(':id', $_SESSION['user_id']);
            $stmt->bindParam(':first_name', $_POST['firstname']);
            $stmt->bindParam(':last_name', $_POST['lastname']);
            $stmt->bindParam(':index', $_POST['index']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':phoneno', $_POST['phoneno']);
            $stmt->bindParam(':gender', $_POST['gender']);
            $stmt->bindParam(':level', $_POST['level']);
             $stmt->bindParam(':session', $_POST['session']);
            $stmt->bindParam(':password', $new_pass);

            $pro = $stmt->execute();

      }

      echo json_encode($pro);
}


?>