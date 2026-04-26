<?php

include "connect.php";

if ($_GET) {
    $id = $_GET['user_id'];
	$a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];
    $angle1 = $_GET['angle1'];
    $angle2 = $_GET['angle2'];
	$angle3 = $_GET['angle3'];

	if (is_numeric($id) && 
		is_numeric($id) && is_numeric($a) && is_numeric($c) &&
        	is_numeric($angle1) && is_numeric($angle2) && is_numeric($angle3)){
        		$E = 1;
        		
        		if (($a+$b>$c) and ($a+$c>$b) and ($c+$b>$a)){
        			$cosC = ($a*$a+$b*$b-$c*$c)/(2*$a*$b);
        			$cosB = ($a*$a+$c*$c-$b*$b)/(2*$a*$c);
        			$cosA = ($c*$c+$b*$b-$a*$a)/(2*$c*$b);
        			
        			$pi = 3.1415926535;
        			$angle1_new = acos($cosA) * 180 / $pi;
        			$angle2_new = acos($cosB) * 180 / $pi;
        			$angle3_new = acos($cosC) * 180 / $pi;
        			
			      $correct = (abs($angle1_new - $angle1) < $E && 
			                  abs($angle2_new - $angle2) < $E && 
			                  abs($angle3_new - $angle3) < $E);
			      
			      $res = $correct ? 1 : 0;
			      
			      $insert = "INSERT INTO TREUG  (user_id, a, b, c, angle1, angle2, angle3, res) 
                   		VALUES ('$id', '$a', '$b', '$c', '$angle1', '$angle2', '$angle3', '$res')";
		if (mysqli_query($conn, $insert)) {
            if ($res) {
                echo "<h3 style='color:green;'>Введённые корни верны!</h3>";
            } else {
                echo "<h3 style='color:red;'>Введённые корни неверны!</h3>";
            }
		}
				}
			}
}





include "treug.php";

?>