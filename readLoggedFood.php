<?php
// Include your database connection
include("dbconnection.php");

// Check if both 'user_id' and 'date' parameters are set
if (isset($_GET['user_id']) && isset($_GET['date'])) {
    $user_id = $_GET['user_id'];  // The user ID
    $date = $_GET['date'];  // The date in YYYY-MM-DD HH:MM:SS format

    // Validate the date format (YYYY-MM-DD)
    if (DateTime::createFromFormat('Y-m-d H:i:s', $date) === false) {
        die("Invalid date format. Please use YYYY-MM-DD HH:MM:SS.");
    }

    // Convert the date to just the date (YYYY-MM-DD)
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d'); 

    // Attempt to connect to the database
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // First query: Get the logged foods for the given user and date
        $stmt = $pdo->prepare('SELECT * FROM logged_food WHERE user_id = :user_id AND DATE(date) = :date');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();
        
        // Fetch the logged foods
        $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($foods) {
            // Loop through the logged foods
            foreach ($foods as $food) {
                foreach ($food as $key => $value) {
                    echo $key . ": " . htmlspecialchars($value) . "\n"; // Print the field name and its value
                }

                // Now, for each food_id, retrieve the title from the food table
                $food_id = $food['food_id'];
                $stmt2 = $pdo->prepare('SELECT food_name FROM food WHERE id = :food_id');
                $stmt2->bindParam(':food_id', $food_id, PDO::PARAM_INT);
                $stmt2->execute();
                
                // Fetch the food title
                $food_name = $stmt2->fetch(PDO::FETCH_ASSOC);
                
                if ($food_name) {
                    echo "food_name: " . $food_name['food_name'] . "\n";  // Print the food title
                } else {
                    echo "Food title not found.\n";  // If food title is not found
                }

                // Check if meal_name is not null and retrieve the associated meal information
                $meal_name = $food['meal_name'];
                if ($meal_name !== null) {
                    // Fetch all food_ids associated with the meal from the 'meal' table
                    $stmt3 = $pdo->prepare('SELECT food_id FROM meal WHERE id = :meal_name');
                    $stmt3->bindParam(':meal_name', $meal_name, PDO::PARAM_INT);
                    $stmt3->execute();
                }

                echo "\n";  // Add a line break after each food record
            }
        } else {
            echo "No foods found for the given user and date.";  // If no foods are found
        }
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
} else {
    echo "user_id or date parameter is missing.";  // If parameters are missing
}
?>
