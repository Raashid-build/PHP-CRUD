<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants List</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body{
            font-family: Roboto, san-serif;
            background-color: powderblue;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: auto;
            background-color: white;
        }
        th{
            text-align: center;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div style="text-align: right; margin: 15px;  ">
        <a href="form.php" class="btn btn-primary" title="Application Form">Submit Application</a>
    </div>  

    <div class="container-fluid"><h1 class="text-center fw-bold p-2">Applicants List </h1>
  
    <table class="table w-75">
        <tr>
            <th class="table-primary border border-black border-1">ID</th>
            <th class="table-primary border border-black border-1">First Name</th>
            <th class="table-primary border border-black border-1">Last Name</th>
            <th class="table-primary border border-black border-1">Email</th>
            <th class="table-primary border border-black border-1">Phone No.</th>
            <th class="table-primary border border-black border-1">Applied Position</th>
            <th class="table-primary border border-black border-1">Edit</th>
            <th class="table-primary border border-black border-1">Delete</th>
        <tr>

        <?php
            include 'db_connect.php';
            try {
                $sql = "SELECT * FROM applicants";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['applied_position']) . "</td>";
                    echo "<td class='text-center'><button class='btn btn-primary'><a title='Edit' href='update.php?id=" . $row['id'] . "'><i class='bi bi-pencil-fill text-white'></i></a></button></td>";
                    echo "<td class='text-center'><button class='btn btn-danger'><a title='Delete' href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this applicant?');\"><i class='bi bi-trash-fill text-white'></i></a></button></td>";
     
                    echo "</tr>";
                }
            } catch(PDOException $e) {
                echo "<tr><td colspan='3'>Error: " . $e->getMessage() . "</td></tr>";
            }
        ?>
        
    </table></div>
</body>
</html>