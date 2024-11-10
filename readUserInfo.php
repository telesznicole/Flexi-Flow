<?php
// Include your database connection
include("dbconnection.php");

// Check if both 'userId' and 'field' parameters are set
if (isset($_GET['userId']) && isset($_GET['field'])) {
    $userId = $_GET['userId'];
    $field = $_GET['field'];  // The field you want to retrieve (e.g., 'FFname', 'activity_level', etc.)

    // Attempt to connect to the database
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare the query to find the user by userId
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :userId LIMIT 1');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Fetch the user details (if found)
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            // Check if the requested field exists in the user record and echo it
            if (isset($user[$field])) {
                echo $user[$field];  // Output the value of the specified field
            } else {
                echo "Field not found";  // If the field does not exist
            }
        } else {
            echo "User not found";  // If the user does not exist
        }
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
} else {
    echo "userId or field parameter is missing.";
}
?>
