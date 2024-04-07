<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">List of clients</h1>
        <a href="add.php" class="btn btn-success">Add new client</a>
        <br><br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "myshop";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data from database
                    $sql = "SELECT * FROM clients";
                    $result = $conn->query($sql);

                    // Check if there are any clients
                    if (!$result) {
                        trigger_error('Invalid query: ' . $conn->error);
                    }

                    // Display data
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo 
                            "<tr>
                                    <td>$row[id]</td>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                    <td>$row[phone]</td>
                                    <td>$row[address]</td>
                                    <td>
                                        <a href='edit.php?id=$row[id]' class='btn btn-primary'>Edit</a>
                                        <a href='delete.php?id=$row[id]' class='btn btn-danger'>Delete</a>
                                    </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No clients found</td></tr>";
                    }

                ?>
            </tbody>
        
    </div>
</body>
</html>