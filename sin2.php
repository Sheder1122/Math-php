<?php
	include "connect.php";
		
	$id = $_GET['id'];
	$x = $_GET['x'];
	$sinx = $_GET['sinx'];
	
	$E = 0.001;
	$k = 1;
	
	$sinx_new = 1;
	
	function factorial($n){
		if ($n <= 1) return 1;
		return $n * factorial($n - 1);
	}


	
	for ($i = 2; $i < 100; $i +=2){
		if ($k % 2 != 0){
			$sinx_new -= pow($x,$i) / factorial($i+1);
		}
		else{
			$sinx_new += pow($x,$i) / factorial($i+1);
		}
		$k++;
	}
	

	
	$correct = (abs($sinx_new - $sinx) < $E);
	$res = $correct ? 1 : 0;
	
	$insert = "INSERT INTO sin (id, sin, new_sin, res) 
                VALUES ('$id', '$sinx', '$sinx_new', '$res')";
	if (mysqli_query($conn, $insert)) {
            if ($res) {
                echo "<h3 style='color:green;'>Введённые значения верны!</h3>";
            } else {
                echo "<h3 style='color:red;'>Введённые значения неверны!</h3>";
            }
	}

	include "sin.php";

?>
