<?php

require_once("navigation.php");		//include the global nav


//Catch the info from the create form
//Render to the screen as a test
//Connect to the database (do manually here at first)
//Insert into the database

$id = htmlspecialchars($_POST['id'], ENT_QUOTES);		//this is from a hidden form field from the prior screen
$FFusername = htmlspecialchars($_POST['FFusername'], ENT_QUOTES);
$FFpassword = htmlspecialchars($_POST['FFpassword'], ENT_QUOTES);
$FFname = htmlspecialchars($_POST['FFname'], ENT_QUOTES);
$picture = htmlspecialchars($_POST['picture'], ENT_QUOTES);
$activity_level = htmlspecialchars($_POST['activity_level'], ENT_QUOTES);
$food_level = htmlspecialchars($_POST['food_level'], ENT_QUOTES);
$recovery_level = htmlspecialchars($_POST['recovery_level'], ENT_QUOTES);
$activity_goal = htmlspecialchars($_POST['activity_goal'], ENT_QUOTES);
$food_goal = htmlspecialchars($_POST['food_goal'], ENT_QUOTES);
$recovery_goal = htmlspecialchars($_POST['recovery_goal'], ENT_QUOTES);


include("dbconnection.php");

	/* MySQL server connection.*/
	
	try{
		$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// Set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		die("ERROR: Could not connect. " . $e->getMessage());
	}
	

$sql = "UPDATE users SET 
FFusername = ?, 
FFpassword = ?, 
FFname = ?, 
picture = ?,
activity_level = ?,
food_level = ?,
recovery_level = ?,
activity_goal = ?,
food_goal = ?,
recovery_goal = ?
WHERE id = ?";


$pdo->prepare($sql)->execute([$FFusername, $FFpassword, $FFname, $picture, $activity_level, $food_level, $recovery_level, $activity_goal, $food_goal, $recovery_goal, $id]);

echo "<p>Your information has been updated successfully.</p>"; echo "<br />";


//Close the database connection
$pdo = null;
//-----------------------------------------------------------



?>