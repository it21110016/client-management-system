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

    // Delete client from database
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];
        $sql = "DELETE FROM clients WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>