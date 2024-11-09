<?php
// Include your database connection
include("dbconnection.php");

// Check if both 'FFusername' and 'FFpassword' parameters are set
if (isset($_GET['FFusername']) && isset($_GET['FFpassword'])) {
    $FFusername = $_GET['FFusername'];
    $FFpassword = $_GET['FFpassword'];

    // Attempt to connect to the database
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare the query to find the user by FFusername
        $stmt = $pdo->prepare('SELECT * FROM users WHERE FFusername = :FFusername LIMIT 1');
        $stmt->bindParam(':FFusername', $FFusername, PDO::PARAM_STR);
        $stmt->execute();
        
        // Fetch the user details (if found)
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            // Check if the FFpassword matches the stored one
            if ($FFpassword === $user['FFpassword']) {
                echo "true"; // Username and password match
            } else {
                echo "false"; // Password doesn't match
            }
        } else {
            echo "false"; // User not found
        }
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
} else {
    echo "FFusername or FFpassword parameter is missing.";
}
?>
