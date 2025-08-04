<?php
    require 'db_connect.php';
    $id = $_GET['id'];
    $fname = $_GET['f_name'];
    $lname = $_GET['l_name'];
    $email = $_GET['emails'];
    $num = $_GET['num'];
    $position = $_GET['position'];

    $stmt = $conn->prepare("UPDATE applicants SET firstname =?, lastname =?, email =?, phone =? , applied_position =?   where id = ?");
    $stmt->execute([$fname, $lname, $email, $num, $position, $id]);

    header("Location: display.php");

?>