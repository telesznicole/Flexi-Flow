<?php

require_once("navigation.php");		//include the global nav



$page = htmlspecialchars($_GET['page']);	//id of record to query from database from the select page's query string


//echo "Page var = $page <br />";

include("dbconnection.php");

//=====================================

 
/* MySQL server connection.*/

try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}


try {
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$page]); 
foreach ($stmt as $row)
	{
    $FFusername = $row['FFusername'];
	$FFpassword = $row['FFpassword'];
	$FFname = $row['FFname'];
	$picture = $row['picture'];
	$activity_level = $row['activity_level'];
	$food_level = $row['food_level'];
	$recovery_level = $row['recovery_level'];
	$activity_goal = $row['activity_goal'];
	$food_goal = $row['food_goal'];
	$recovery_goal = $row['recovery_goal'];


	}
}  catch(PDOException $e){
    die("ERROR: Could not able to execute $stmt. " . $e->getMessage());
}






?>







<style>
body {
	padding-left: 20px;
}
</style>



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- CHANGE THIS - Temporary CDN for FontAwesome just to get it up and running-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.css" rel="stylesheet">  



<form name="myForm" method="post" action="updatedUserToDB.php">
	

<input type="hidden" name="id" id="id" value="<?php echo $page;?>">





<h3>Update User</h3>





<p>FFusername<br />
<br />	
	<input type="text" name="FFusername" id="FFusername" value="<?php echo $FFusername;?>">
	<br />
</p>	

<p>FFpassword<br />
<br />	
	<input type="text" name="FFpassword" id="FFpassword" value="<?php echo $FFpassword;?>">
	<br />
</p>

<p>FFname<br />
<br />	
	<input type="text" name="FFname" id="FFname" value="<?php echo $FFname;?>">
	<br />
</p>

<p>picture<br />
<br />	
	<input type="text" name="picture" id="picture" value="<?php echo $picture;?>">
	<br />
</p>

<p>activity_level<br />
<br />	
	<input type="decimal" name="activity_level" id="activity_level" value="<?php echo $activity_level;?>">
	<br />
</p>

<p>food_level<br />
<br />	
	<input type="decimal" name="food_level" id="food_level" value="<?php echo $food_level;?>">
	<br />
</p>

<p>recovery_level<br />
<br />	
	<input type="decimal" name="recovery_level" id="recovery_level" value="<?php echo $recovery_level;?>">
	<br />
</p>

<p>activity_goal<br />
<br />	
	<input type="decimal" name="activity_goal" id="activity_goal" value="<?php echo $activity_goal;?>">
	<br />
</p>

<p>food_goal<br />
<br />	
	<input type="decimal" name="food_goal" id="food_goal" value="<?php echo $food_goal;?>">
	<br />
</p>

<p>recovery_goal<br />
<br />	
	<input type="decimal" name="recovery_goal" id="recovery_goal" value="<?php echo $recovery_goal;?>">
	<br />
</p>









	<input type="submit" class="btn btn-primary">


	<br /><br />

</form>	


