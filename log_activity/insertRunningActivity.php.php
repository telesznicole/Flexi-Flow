<?php
include("dbconnection.php");

// Decode incoming JSON data
$data = json_decode(file_get_contents("php://input"), true);

$user_id = 1; // Assume user_id is known (use session or some other method to track logged-in user)
$workout_id = 1; // For running workouts, we assume a specific workout ID (e.g., "running")
$date = $data['date'];
$start = $data['start'];
$distance = $data['distance'];
$time = $data['time'];

try {
    // Create PDO instance and set error mode
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert data into Logged Workouts Table
    $stmt = $pdo->prepare("INSERT INTO logged_workouts (user_id, workout_id, date, start, distance, duration) 
    VALUES (:user_id, :workout_id, :date, :start, :distance, :duration)");

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':workout_id', $workout_id);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':start', $start);
    $stmt->bindParam(':distance', $distance);
    $stmt->bindParam(':duration', $time);

    $stmt->execute();

    echo json_encode(["success" => true]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

// Close the database connection
$pdo = null;
?>
