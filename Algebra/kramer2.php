<?php
include "../connect.php";

if ($_GET) {
    $id = $_GET['user_id'] ?? '';

    $a11 = $_GET['a11'] ?? '';
    $a12 = $_GET['a12'] ?? '';
    $a13 = $_GET['a13'] ?? '';
    $a21 = $_GET['a21'] ?? '';
    $a22 = $_GET['a22'] ?? '';
    $a23 = $_GET['a23'] ?? '';
    $a31 = $_GET['a31'] ?? '';
    $a32 = $_GET['a32'] ?? '';
    $a33 = $_GET['a33'] ?? '';

    $b1 = $_GET['b1'] ?? '';
    $b2 = $_GET['b2'] ?? '';
    $b3 = $_GET['b3'] ?? '';

    $x1 = $_GET['x1'] ?? '';
    $x2 = $_GET['x2'] ?? '';
    $x3 = $_GET['x3'] ?? '';

    if (is_numeric($id) && 
        is_numeric($a11) && is_numeric($a12) && is_numeric($a13) &&
        is_numeric($a21) && is_numeric($a22) && is_numeric($a23) &&
        is_numeric($a31) && is_numeric($a32) && is_numeric($a33) &&
        is_numeric($b1) && is_numeric($b2) && is_numeric($b3) &&
        is_numeric($x1) && is_numeric($x2) && is_numeric($x3)) {
        
        $id = (int)$id;
        
        function determinant($m11, $m12, $m13, $m21, $m22, $m23, $m31, $m32, $m33) {
            return $m11 * $m22 * $m33 +
                   $m12 * $m23 * $m31 +
                   $m13 * $m21 * $m32 -
                   $m13 * $m22 * $m31 -
                   $m12 * $m21 * $m33 -
                   $m11 * $m23 * $m32;
        }
        
        $det = determinant($a11, $a12, $a13, $a21, $a22, $a23, $a31, $a32, $a33);
            
        if ($det == 0) {
        		echo "<h3 style='color:red;'>Определитель равен нулю!</h3>";
        		include "kramer.php";
                exit();
        }
            
        $det1 = determinant($b1, $a12, $a13, $b2, $a22, $a23, $b3, $a32, $a33);
        $det2 = determinant($a11, $b1, $a13, $a21, $b2, $a23, $a31, $b3, $a33);
        $det3 = determinant($a11, $a12, $b1, $a21, $a22, $b2, $a31, $a32, $b3);
        
        $correct_x1 = $det1 / $det;
        $correct_x2 = $det2 / $det;
        $correct_x3 = $det3 / $det;

        $E = 0.001;
        $correct = (abs($x1 - $correct_x1) < $E && 
                    abs($x2 - $correct_x2) < $E && 
                    abs($x3 - $correct_x3) < $E);
        
        $res = $correct ? 1 : 0;

        $insert = "INSERT INTO kramer (user_id, a11, a12, a13, a21, a22, a23, a31, a32, a33, b1, b2, b3, res) 
                   VALUES ('$id', '$a11', '$a12', '$a13', '$a21', '$a22', '$a23', '$a31', '$a32', '$a33', '$b1', '$b2', '$b3', '$res')";
        
        if (mysqli_query($conn, $insert)) {
            if ($res) {
                echo "<h3 style='color:green;'>Введённые корни верны!</h3>";
            } else {
                echo "<h3 style='color:red;'>Введённые корни неверны!</h3>";
            }
        } else {
            echo "<h3 style='color:red;'>Ошибка при сохранении результатов!</h3>";
        }
    } else {
        echo "<h3 style='color:red;'>Ошибка: все поля должны быть числовыми!</h3>";
    }
}

include "kramer.php";
?>