<?php
include "../connect.php";
  $surname=$_GET['surname'];
  $name=$_GET['name'];

	$i = 1;
	$sql = "SELECT * FROM users WHERE id = $i";
	$q = mysqli_query($conn, $sql);

	while(mysqli_num_rows($q) != null){
	 	$i++;
	 	$sql = "SELECT * FROM users WHERE id = $i";
   	 	$q = mysqli_query($conn, $sql);
	}
	$sql="insert into users values ".
    		"($i,'$surname','$name')";
 	$q=mysqli_query($conn, $sql);
 	
  include 'add_user.php';
?>