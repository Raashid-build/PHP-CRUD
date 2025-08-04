<?php
    session_start();
    $success = false;

    if (isset($_SESSION['form_success'])) {
        $success = true;
        unset($_SESSION['form_success']); // Remove message after showing
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <title>Update Application Form</title>
</head>

<body style="background-color:powderblue; font-family: Lato, san-serif;">
    <?php 

        require 'db_connect.php';
        try {
        
            $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT * from applicants where id = ?");
            $stmt->execute([$id]);
    ?>

    <div class="container w-50 border border-black border-1 rounded mt-5 bg-white">
        <h1 class="text-center p-2 fw-bold">Job Application Form</h1><hr class="mt-0">

        <form class="row g-3 p-3" action="edit.php" method="get">
            <?php
                
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {        
            
            ?>
            
            <div class="col-md-2">
                <label>ID<label>
                <input type="text" name="id" class="form-control border border-dark-subtle" value="<?php  echo  htmlspecialchars($row['id']); ?>" readonly>
            </div>

            <div class="col-md-5">
                <label>First Name</label> 
                <input type="text" name="f_name" class="form-control border border-dark-subtle" required value="<?php  echo  htmlspecialchars($row['firstname']); ?>">
            </div>

            <div class="col-md-5">
                <label>Last Name</label>
                <input type="text" name="l_name" class="form-control border border-dark-subtle" required  value="<?php  echo htmlspecialchars($row['lastname']); ?>" >
            </div>

            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="emails" class="form-control border border-dark-subtle" required value="<?php  echo htmlspecialchars($row['email']); ?>" >
            </div>

            <div class="col-md-6">
                <label>Phone No.</label>
                <input type="text" name="num" class="form-control border border-dark-subtle" required value="<?php  echo htmlspecialchars($row['phone']); ?>" >
            </div>

            <div class="col-md-12">
                <label>Applied Position</label>
                <input type="text" name="position" class="form-control border border-dark-subtle" required value="<?php  echo htmlspecialchars($row['applied_position']); ?>">
            </div>
         
            <div>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>   

        </form>
        
    </div>

    <div style="text-align: center; margin: 15px;">
        <a href="display.php" class="btn btn-outline-dark text-decoration-none" title="List of Applicants who have applied">Show Applicants</a>
    <div>


    <?php
            }
        } catch(PDOException $e) {
            echo "<tr><td colspan='3'>Error: " . $e->getMessage() . "</td></tr>";
        }

    ?>

</body>
</html>