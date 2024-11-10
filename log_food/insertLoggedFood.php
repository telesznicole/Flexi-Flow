<?php

// Include database connection file
include("dbconnection.php");

try {
    // Create connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement to insert logged meal
    $stmt = $pdo->prepare("
        INSERT INTO logged_food (user_id, date, meal, meal_name, calories, protein, fat, saturated_fat, fiber, carbohydrates) 
        VALUES (:user_id, NOW(), :meal, :meal_name, :calories, :protein, :fat, :saturated_fat, :fiber, :carbohydrates)
    ");

    // Binding user input
    $userId = 1; // Assuming a user is logged in and their ID is known. Replace with appropriate logic.
    $meal = $_POST['meal_type'];
    $mealName = $_POST['meal_name'];

    // Calculate total nutritional values based on ingredients
    $ingredients = $_POST['ingredients'];
    $totalCalories = 0;
    $totalProtein = 0;
    $totalFat = 0;
    $totalSaturatedFat = 0;
    $totalFiber = 0;
    $totalCarbohydrates = 0;

    foreach ($ingredients as $ingredient) {
        // Query nutritional information for each ingredient
        $ingredientStmt = $pdo->prepare("SELECT * FROM food WHERE food_name = :ingredient");
        $ingredientStmt->bindParam(':ingredient', $ingredient);
        $ingredientStmt->execute();
        $ingredientData = $ingredientStmt->fetch(PDO::FETCH_ASSOC);

        if ($ingredientData) {
            $totalCalories += $ingredientData['calories'];
            $totalProtein += $ingredientData['protein'];
            $totalFat += $ingredientData['fat'];
            $totalSaturatedFat += $ingredientData['saturated_fat'];
            $totalFiber += $ingredientData['fiber'];
            $totalCarbohydrates += $ingredientData['carbohydrates'];
        }
    }

    // Bind parameters
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':meal', $meal);
    $stmt->bindParam(':meal_name', $mealName);
    $stmt->bindParam(':calories', $totalCalories);
    $stmt->bindParam(':protein', $totalProtein);
    $stmt->bindParam(':fat', $totalFat);
    $stmt->bindParam(':saturated_fat', $totalSaturatedFat);
    $stmt->bindParam(':fiber', $totalFiber);
    $stmt->bindParam(':carbohydrates', $totalCarbohydrates);

    // Execute the insert query
    $stmt->execute();

    echo "New meal logged successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;

?>
