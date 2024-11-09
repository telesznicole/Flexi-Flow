<?php


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

require_once("navigation.php");		//include the global nav

//===================================
//Database Connection
include("dbconnection.php");



/* MySQL server connection.*/

try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}


//===================================



try {

    $stmt = $pdo->prepare('SELECT * FROM users ORDER BY id asc');
    $stmt->execute([]);

    echo "<br />";
    echo "<br />";

    echo "<table border='1'>";
    echo "<tr>";
        echo "<th>id</th>";
        echo "<th>FFusername</th>";
        echo "<th>FFpassword</th>";
        echo "<th>FFname</th>";
        echo "<th>picture</th>";
        echo "<th>activity_level</th>";
        echo "<th>food_level</th>";
        echo "<th>recovery_level</th>";
        echo "<th>activity_goal</th>";
        echo "<th>food_goal</th>";
        echo "<th>recovery_goal</th>";
    echo "</tr>";


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
        

        echo "<tr>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['id'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['FFusername'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['FFpassword'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['FFname'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['picture'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['activity_level'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['food_level'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['recovery_level'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['activity_goal'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['food_goal'] . "</td>";
                echo "<td>" . "<a href=" .  "updateUser.php?page=" . $row['id'] . ">" . $row['recovery_goal'] . "</td>";
          

                echo "<td>" . "<a href=" .  "deleteUser.php?page=" . $row['id'] . ">" . "Delete User" . "</td>";
          
                echo "</tr>";
    
    
        }

        echo "</table>";

    }  catch(PDOException $e){
        die("ERROR: Could not able to execute query. " . $e->getMessage());
    }
    



?>