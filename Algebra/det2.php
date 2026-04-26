<?php
include "../connect.php";

// Получение данных из формы
$id = $_GET['user_id'];
$a11 = $_GET['a11'];
$a12 = $_GET['a12'];
$a13 = $_GET['a13'];
$a21 = $_GET['a21'];
$a22 = $_GET['a22'];
$a23 = $_GET['a23'];
$a31 = $_GET['a31'];
$a32 = $_GET['a32'];
$a33 = $_GET['a33'];
$user_det = $_GET['user_det'];

if (is_numeric($id) && is_numeric($a11) && is_numeric($a12) && is_numeric($a13) &&
    is_numeric($a21) && is_numeric($a22) && is_numeric($a23) &&
    is_numeric($a31) && is_numeric($a32) && is_numeric($a33) && is_numeric($user_det)) {
    
    $id = (int)$id;
    
    $correct_det = $a11 * $a22 * $a33 +
                   $a12 * $a23 * $a31 +
                   $a13 * $a21 * $a32 -
                   $a13 * $a22 * $a31 -
                   $a12 * $a21 * $a33 -
                   $a11 * $a23 * $a32;
    
    	$E = 0.001;
    	$correct = abs($user_det - $correct_det) < $E;
    

    	$res = $correct ? 1 : 0;
    
	if ($res){
		echo "<h3 style='color:green;'>Введёный определитель верный!</h3>";
    	}
    	else{
    		echo "<h3 style='color:red;'>Введёный определитель неверный!</h3>";
    	}
    
    $insert = "INSERT INTO det (user_id, a11, a12, a13, a21, a22, a23, a31, a32, a33, res) 
               VALUES ($id, $a11, $a12, $a13, $a21, $a22, $a23, $a31, $a32, $a33, $res)";
    mysqli_query($conn, $insert);        
} 



include "det.php";
?>