<?php

include "connect.php";

if ($_GET) {
    $id = $_GET['id'];
	$a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];
    $ha = $_GET['ha'];
    $hb = $_GET['hb'];
	$hc = $_GET['hc'];
	$s = $_GET['s'];


	if (is_numeric($id) && 
		is_numeric($id) && is_numeric($a) && is_numeric($c) &&
        	is_numeric($ha) && is_numeric($hb) && is_numeric($hb) && is_numeric($s)){
        		$E = 0.001;
        		
        		if (($a+$b>$c) and ($a+$c>$b) and ($c+$b>$a)){
        			$cosC = ($a*$a+$b*$b-$c*$c)/(2*$a*$b);
        			$cosB = ($a*$a+$c*$c-$b*$b)/(2*$a*$c);
        			$cosA = ($c*$c+$b*$b-$a*$a)/(2*$c*$b);
        			
        			$p=($a+$b+$c)/2;
        			$s_new = sqrt($p*($p-$a)*($p-$b)*($p-$c));
        			
        			$ha_new = 2*$s_new/$a;
        			$hb_new = 2*$s_new/$b;
        			$hc_new = 2*$s_new/$c;
        			
			      $correct = (abs($ha_new - $ha) < $E && 
			                  abs($hb_new - $hb) < $E && 
			                  abs($hc_new - $hc) < $E &&
			                  abs($s_new - $s) < $S);
			      
			      $res = $correct ? 1 : 0;
			      
			      $insert = "INSERT INTO treug_square  (id, a, b, c, ha, hb, hc, s, res) 
                   		VALUES ('$id', '$a', '$b', '$c', '$ha', '$hb', '$hc', 's', '$res')";
		if (mysqli_query($conn, $insert)) {
            if ($res) {
                echo "<h3 style='color:green;'>Введённые значения верны!</h3>";
            } else {
                echo "<h3 style='color:red;'>Введённые значения неверны!</h3>";
            }
		}
				}
			}
}





include "square.php";

?>
