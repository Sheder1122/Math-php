<?php
include "connect.php";

// Проверяем, что данные были отправлены
if ($_GET) {
    $id = $_GET['id'] ?? '';

    $a11 = $_GET['a11'] ?? '';
    $a12 = $_GET['a12'] ?? '';
    $a13 = $_GET['a13'] ?? '';
    $a21 = $_GET['a21'] ?? '';
    $a22 = $_GET['a22'] ?? '';
    $a23 = $_GET['a23'] ?? '';
    $a31 = $_GET['a31'] ?? '';
    $a32 = $_GET['a32'] ?? '';
    $a33 = $_GET['a33'] ?? '';

    $b11 = $_GET['b11'] ?? '';
    $b12 = $_GET['b12'] ?? '';
    $b13 = $_GET['b13'] ?? '';
    $b21 = $_GET['b21'] ?? '';
    $b22 = $_GET['b22'] ?? '';
    $b23 = $_GET['b23'] ?? '';
    $b31 = $_GET['b31'] ?? '';
    $b32 = $_GET['b32'] ?? '';
    $b33 = $_GET['b33'] ?? '';

    $c11 = $_GET['c11'] ?? '';
    $c12 = $_GET['c12'] ?? '';
    $c13 = $_GET['c13'] ?? '';
    $c21 = $_GET['c21'] ?? '';
    $c22 = $_GET['c22'] ?? '';
    $c23 = $_GET['c23'] ?? '';
    $c31 = $_GET['c31'] ?? '';
    $c32 = $_GET['c32'] ?? '';
    $c33 = $_GET['c33'] ?? '';



        

        $d11 = $a11 + $b11;
        $d12 = $a12 + $b12;
        $d13 = $a13 + $b13;
        $d21 = $a21 + $b21;
        $d22 = $a22 + $b22;
        $d23 = $a23 + $b23;
        $d31 = $a31 + $b31;
        $d33 = $a32 + $b32;
        $d33 = $a33 + $b33;
        	   
        
        $E = 0.001;
        $correct = (abs($a11 - $c11) < $E && abs($a12 - $c12) < $E && abs($a13 - $c13) < $E 
        && abs($a21 - $c21) < $E && abs($a22 - $c11) < $E && abs($a23 - $c23) < $E 
        && abs($a31 - $c31) < $E && abs($a32 - $c32) < $E && abs($a33 - $c33) < $E);
        
        $res = $correct ? 1 : 0;

        $insert = "INSERT INTO kramer (id, a11, a12, a13, a21, a22, a23, a31, a32, a33, res) 
                   VALUES ('$id', '$a11', '$a12', '$a13', '$a21', '$a22', '$a23', '$a31', '$a32', '$a33', '$res')";
        
        if (mysqli_query($conn, $insert)) {
            if ($res) {
                echo "<h3 style='color:green;'>Введённые корни верны!</h3>";
            } else {
                echo "<h3 style='color:red;'>Введённые корни неверны!</h3>";
            }
        } else {
            echo "<h3 style='color:red;'>Ошибка при сохранении результатов!</h3>";
        }
    }

include "matrix_sum.php";
?>
