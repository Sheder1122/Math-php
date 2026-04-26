<?php
	include "connect.php";
		
	$id = $_GET['id'];
	$x = $_GET['x'];
	$ex = $_GET['ex'];
	
	$E = 0.001;
	
	function factorial($n){
		if ($n <= 1) return 1;
		return $n * factorial($n - 1);
	}
	
	$N = 0;
	$ex_new = 1 + $x;
	
	for($i = 2; $i < 100; $i++){
		$ex_new += pow($x, $i) / factorial($i);   
	}
	
	$correct = (abs($ex_new - $ex) < $E);
	$res = $correct ? 1 : 0;
	
	$insert = "INSERT INTO exp (id, ex, ex_new, res) 
                VALUES ('$id', '$ex', 'ex_new', '$res')";
	if (mysqli_query($conn, $insert)) {
            if ($res) {
                echo "<h3 style='color:green;'>Введённые значения верны!</h3>";
            } else {
                echo "<h3 style='color:red;'>Введённые значения неверны!</h3>";
            }
	}

	include "exp.php";




?>

