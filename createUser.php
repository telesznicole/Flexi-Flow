<?php
// Include your database connection
include("dbconnection.php");

// Check if both 'FFusername' and 'FFpassword' parameters are set
if (isset($_GET['FFusername']) && isset($_GET['FFpassword'])) {
    // Set the values of the new user
    $FFusername = htmlspecialchars($_GET['FFusername']); // Sanitize the username
    $FFpassword = htmlspecialchars($_GET['FFpassword']); // Sanitize the password
    $FFname = $FFusername;
    $picture = 'pictures/undefinedUser.png';
    $activity_level = 0;
    $food_level = 0;
    $recovery_level = 0;
    $activity_goal = 60;
    $food_goal = 2000;
    $recovery_goal = 90;

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
            echo "false"; // User already exists
        } else {
            // Insert new user into the database
            $insertStmt = $pdo->prepare(
                'INSERT INTO users (FFusername, FFpassword, FFname, picture, activity_level, food_level, recovery_level, activity_goal, food_goal, recovery_goal) 
                 VALUES (:FFusername, :FFpassword, :FFname, :picture, :activity_level, :food_level, :recovery_level, :activity_goal, :food_goal, :recovery_goal)'
            );
            $insertStmt->bindParam(':FFusername', $FFusername, PDO::PARAM_STR);
            $insertStmt->bindParam(':FFpassword', $FFpassword, PDO::PARAM_STR);
            $insertStmt->bindParam(':FFname', $FFname, PDO::PARAM_STR);
            $insertStmt->bindParam(':picture', $picture, PDO::PARAM_STR);
            $insertStmt->bindParam(':activity_level', $activity_level, PDO::PARAM_INT);
            $insertStmt->bindParam(':food_level', $food_level, PDO::PARAM_INT);
            $insertStmt->bindParam(':recovery_level', $recovery_level, PDO::PARAM_INT);
            $insertStmt->bindParam(':activity_goal', $activity_goal, PDO::PARAM_INT);
            $insertStmt->bindParam(':food_goal', $food_goal, PDO::PARAM_INT);
            $insertStmt->bindParam(':recovery_goal', $recovery_goal, PDO::PARAM_INT);
            
            $insertStmt->execute(); // Execute the insert statement
            
            echo $user['id']; // Successfully added new user
        }
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
} else {
    echo "Username or Password parameter is missing.";
}
?>
