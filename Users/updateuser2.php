<?php
include "../connect.php";
	
	$user_id = $_GET['user_id'];
	$surname = $_GET['surname'];
	$name = $_GET['name'];
	
	if (!empty($user_id) && is_numeric($user_id) && !empty($surname) && !empty($name)) {
	    $user_id = (int)$user_id;
	    $surname = mysqli_real_escape_string($conn, $surname);
	    $name = mysqli_real_escape_string($conn, $name);
	    
	    $q = "UPDATE users SET surname = '$surname', name = '$name' WHERE id = $user_id";
	    
	    if (mysqli_query($conn, $q)) {
	        if (mysqli_affected_rows($conn) > 0) {
	            echo "<h3 style='color:green;'>Данные пользователя с ID $user_id успешно обновлены!</h3>";
	            echo "<p>Новые данные: <b>$surname $name</b></p>";
	        } 
		}
	}
	
	include "updateuser.php";
?>