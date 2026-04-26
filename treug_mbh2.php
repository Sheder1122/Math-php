<?php

include "connect.php";

if ($_GET) {
    $id = $_GET['user_id'];
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];
    $ha = $_GET['ha'];
    $hb= $_GET['hb'];
    $hc= $_GET['hc'];
    $ba = $_GET['ba'];
    $bb= $_GET['bb'];
    $bc= $_GET['bc'];
    $ma = $_GET['ma'];
    $mb= $_GET['mb'];
    $mc= $_GET['mc'];

	if (is_numeric($id) && 
		is_numeric($a) && is_numeric($b) && is_numeric($c) &&
        	is_numeric($ha) && is_numeric($hb) && is_numeric($hc)
        	&& is_numeric($ba) && is_numeric($bb) && is_numeric($bc)
        	&& is_numeric($ma) && is_numeric($mb) && is_numeric($mc)){
        		$E = 0.001;
        		
        		if (($a+$b>$c) and ($a+$c>$b) and ($c+$b>$a)){
        		
        			$p=($a+$b+$c)/2;
        			$s_new = sqrt($p*($p-$a)*($p-$b)*($p-$c));

        		
				$ha_new = 2*$s_new/$a;
        			$hb_new = 2*$s_new/$b;
        			$hc_new = 2*$s_new/$c;

				$ma_new = 0.5*sqrt(2*$b*$b+2*$c*$c-$a*$a);
				$mb_new = 0.5*sqrt(2*$a*$a+2*$c*$c-$b*$b);
				$mc_new = 0.5*sqrt(2*$b*$b+2*$a*$a-$c*$c);
				
				$ba_new = (sqrt($c*$b*($a+$b+$c)*($c+$b-$a)))/($c+$b);
				$bb_new = (sqrt($a*$c*($a+$b+$c)*($a+$c-$b)))/($a+$c);
				$bc_new = (sqrt($a*$b*($a+$b+$c)*($a+$b-$c)))/($a+$b);
				
				
			      $correct = (abs($ha_new - $ha) < $E && 
			                  abs($hb_new - $hb) < $E && 
			                  abs($hc_new - $hc) < $E &&
			                  abs($ma_new - $ma) < $E && 
			                  abs($mb_new - $mb) < $E && 
			                  abs($mc_new - $mc) < $E &&
			                  abs($ba_new - $ba) < $E && 
			                  abs($bb_new - $bb) < $E && 
			                  abs($bc_new - $bc) < $E);
			      
			      $res = $correct ? 1 : 0;
			      
			      $insert = "INSERT INTO TREUG_MBH  (user_id, a, b, c, ha, hb, hc, ma, mb, mc, ba, bb, bc, res) 
                   		VALUES ('$id', '$a', '$b', '$c', '$ha', '$hb', '$hc', '$ma', '$mb', '$mc', '$ba', '$bb', '$bc', '$res')";
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





include "treug_mbh.php";

?>
