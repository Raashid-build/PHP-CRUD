<?php
    session_start();
    include "db_connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST["f_name"];
        $lastname = $_POST["l_name"];
        $email = $_POST["emails"];
        $phone = $_POST["num"];
        $role = $_POST["position"];

        try {
            $sql = "INSERT INTO applicants (firstname, lastname, email, phone, applied_position)
                    VALUES (:firstname, :lastname, :email, :phone, :role)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':role', $role);

            $stmt->execute();
            
            $_SESSION['form_success'] = true; // Set flash message

            header("Location: form.php"); 
                        
            exit();
            
        } catch(PDOException $e) {
            echo "error=" . $e->getMessage();
        }
    }

?>