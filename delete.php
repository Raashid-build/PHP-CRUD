<?php 
    require 'db_connect.php';
    $id = $_GET['id'];
    $stmt = $conn->prepare("Delete from applicants where id = ?");
    $stmt->execute([$id]);

    header("Location: display.php");
?>