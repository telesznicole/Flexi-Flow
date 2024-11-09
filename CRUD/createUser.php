<?php
require_once("navigation.php");		//include the global nav
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


<form name="myForm" method="post" action="insertUserToDB.php">


<h3>All Translations Common Fields</h3>


	<p>FFusername<br />
	<input type="text" name="FFusername" id="FFusername">
	<br />
	</p>

	<p>FFpassword<br />
	<input type="text" name="FFpassword" id="FFpassword">
	<br />
	</p>

	<p>FFname<br />
	<input type="text" name="FFname" id="FFname">
	<br />
	</p>

	<p>picture<br />
	<input type="text" name="picture" id="picture">
	<br />
	</p>

	<p>activity_level<br />
	<input type="decimal" name="activity_level" id="activity_level">
	<br />
	</p>

	<p>food_level<br />
	<input type="decimal" name="food_level" id="food_level">
	<br />
	</p>

	<p>recovery_level<br />
	<input type="decimal" name="recovery_level" id="recovery_level">
	<br />
	</p>

	<p>activity_goal<br />
	<input type="decimal" name="activity_goal" id="activity_goal">
	<br />
	</p>

	<p>food_goal<br />
	<input type="decimal" name="food_goal" id="food_goal">
	<br />
	</p>

	<p>recovery_goal<br />
	<input type="decimal" name="recovery_goal" id="recovery_goal">
	<br />
	</p>




<br /><br />



	<input type="submit" class="btn btn-primary">


	<br /><br />

</form>


