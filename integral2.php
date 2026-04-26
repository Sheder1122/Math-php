<?php
include "connect.php";

$user_id = $_GET['user_id'] ?? '';
$func = $_GET['func'] ?? '';
$answer = $_GET['perv'] ?? '';

function safe_eval($expr, $x_val){
	$expr = str_replace('^', '**', $expr);
	$expr = preg_replace('/(\d+)([a-zA-Z])/', '$1*$2', $expr);
	$expr = str_replace('x', '$x', $expr);
	
	$code = '$x = '. floatval($x_val) . '; return ' . $expr . ';';
	try{
		$result = eval($code);
		return $result;
	} catch (ParseError $e){
		return null;
	}
}

function derivative($func, $x_val, $h = 1e-5){
	$f_plus = safe_eval($func, $x_val + $h);
	$f_minus = safe_eval($func, $x_val - $h);	
	if ($f_plus === null || $f_minus === null) return null;
	return ($f_plus - $f_minus)/(2 * $h);
}

$E = 0.001;
$correct = 1;

if (!empty($user_id) && is_numeric($user_id) && !empty($func) && !empty($answer)){
	$points = [0.5, 1, 2, 3.14];
	
	foreach ($points as $x){
		$f_val = safe_eval($func, $x);
		if ($f_val === null){
			$correct = 0; 
			break;
		}
	
		$deriv_of_answer = derivative($answer, $x);
		if (derivative($answer, $x) === null){
			$correct = 0;
			break;
		}
		
		if (abs($f_val - derivative($answer, $x)) > $E){
			$correct = 0;
			break;
		}
	}

$res = $correct ? 1 :0;

$insert = "INSERT INTO integral  (user_id, func, user_answer, res) 
     		VALUES ('$user_id', 'func', 'answer',  '$res')";
		if (mysqli_query($conn, $insert)) {
            if ($res) {
                echo "<h3 style='color:green;'>Введённые значения верны!</h3>";
            } else {
                echo "<h3 style='color:red;'>Введённые значения неверны!</h3>";
            }
	}
}

include "integral.php";

?>
