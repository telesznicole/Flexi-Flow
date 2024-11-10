<?php
// Include your database connection
include("dbconnection.php");

// Check if the 'meal_id' parameter is set
if (isset($_GET['meal_id'])) {
    $meal_id = $_GET['meal_id'];  // The meal ID passed in the query string

    // Attempt to connect to the database
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Query to get all food_ids associated with the given meal_id
        $stmt = $pdo->prepare('SELECT food_id FROM meal WHERE meal_id = :meal_id');
        $stmt->bindParam(':meal_id', $meal_id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Fetch the food_ids associated with the meal_id
        $food_ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($food_ids) {
            // Loop through each food_id and retrieve its food_name and calories
            foreach ($food_ids as $food) {
                $food_id = $food['food_id'];

                // Query to get the food name and calories for the current food_id
                $stmt2 = $pdo->prepare('SELECT food_name, calories FROM food WHERE id = :food_id');
                $stmt2->bindParam(':food_id', $food_id, PDO::PARAM_INT);
                $stmt2->execute();
                
                // Fetch the food name and calories for the given food_id
                $food_data = $stmt2->fetch(PDO::FETCH_ASSOC);
                if ($food_data) {
                    // Display the food name and calories
                    echo " - " . htmlspecialchars($food_data['food_name']) . " (Calories: " . htmlspecialchars($food_data['calories']) . ')';
                } else {
                    echo " - Food name or calories not found for food_id $food_id<br>"; // If data is not found
                }
            }
        } else {
            echo "No foods found for this meal_id.<br>";  // If no food_ids are found for the meal_id
        }
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
} else {
    echo "meal_id parameter is missing.";  // If the meal_id parameter is missing
}
?>
