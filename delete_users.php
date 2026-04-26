<?php
	include "connect.php";
  
	$sql = "SELECT * FROM users";
	$q = mysqli_query($conn, $sql);
	
	
	echo "<form action=delete_users2.php>";
	
	echo "<table border='1' align='center' width='80%'>";
	echo "<caption> Список пользователей </caption>";
	for ($i = 0; $i < mysqli_num_rows($q); $i++) {
	    echo "<tr>";
	    $f = mysqli_fetch_array($q);
	    echo "<td><input type='checkbox' name='checkbox[]' value='{$f['id']}'> {$f['id']} </td>";
	    echo "<td> {$f['surname']} </td>";
	    echo "<td> {$f['name']} </td>";
	    echo "</tr>";
	}
	echo "</table>";
	echo "</br>";
	echo "<input type=submit value=Удалить>";
	echo "</form>";
?>