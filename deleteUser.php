<?php

require_once("navigation.php");		//include the global nav


$page = htmlspecialchars($_GET['page']);	//id of record to query from database from the select page's query string


//echo "Page to delete var = $page <br />";

include("dbconnection.php");



/* MySQL server connection.*/

try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}


$myID=$page; //$myID represents the database ID of the library users item that will be deleted.


// Attempt select query execution
try{

	$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
	$stmt->execute([$myID]); 

} catch(PDOException $e){
    die("ERROR: Could not able to execute $stmt. " . $e->getMessage());
}

// Close connection
unset($pdo);


echo "<br />"; echo "Your information was deleted successfully."; echo "<br />";



?>