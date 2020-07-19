<?php 
require_once __DIR__. './core/init.php';

$sql = 'DELETE FROM results WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $row = $stmt->execute();

    if (isset($row)) {
        header("location:reports.php");
    }
 ?>