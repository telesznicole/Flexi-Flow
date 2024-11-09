<?php

//Catch the info from the create form
//Render to the screen as a test
//Connect to the database (do manually here at first)
//Insert into the database


//Tutorial from https://www.tutorialspoint.com/mysqli/mysqli_insert_query.htm and https://www.w3schools.com/php/php_mysql_insert.asp and https://phpdelusions.net/pdo combined

require_once("navigation.php");		//include the global nav



$FFusername = $_POST['FFusername'];
$FFpassword = $_POST['FFpassword'];
$FFname = $_POST['FFname'];
$picture = $_POST['picture'];
$activity_level = $_POST['activity_level'];
$food_level = $_POST['food_level'];
$recovery_level = $_POST['recovery_level'];
$activity_goal = $_POST['activity_goal'];
$food_goal = $_POST['food_goal'];
$recovery_goal = $_POST['recovery_goal'];

include("dbconnection.php");


try {
   $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "It should have connected to the database <br />";
	// prepare sql and bind parameters
	$stmt = $pdo->prepare("INSERT INTO users(FFusername, FFpassword, FFname, picture, activity_level, food_level, recovery_level, activity_goal, food_goal, recovery_goal)
	VALUES (:FFusername, :FFpassword, :FFname, :picture, :activity_level, :food_level, :recovery_level, :activity_goal, :food_goal, :recovery_goal)");

	$stmt->bindParam(':FFusername', $FFusername);
	$stmt->bindParam(':FFpassword', $FFpassword);
	$stmt->bindParam(':FFname', $FFname);
	$stmt->bindParam(':picture', $picture);
	$stmt->bindParam(':activity_level', $activity_level);
	$stmt->bindParam(':food_level', $food_level);
	$stmt->bindParam(':recovery_level', $recovery_level);
	$stmt->bindParam(':activity_goal', $activity_goal);
	$stmt->bindParam(':food_goal', $food_goal);
	$stmt->bindParam(':recovery_goal', $recovery_goal);

	$stmt->execute();

	
	//echo "DEBUG - sql = $stmt <br />";
	echo "New users created successfully";
	}
catch(PDOException $e)
	{
	echo "Error: " . $e->getMessage();
	}

//Close the database connection
$pdo = null;
//-----------------------------------------------------------




?>