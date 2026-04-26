<?php
include "connect.php";

$id = $_GET['user_id'] ?? '';
$a = $_GET['ka'] ?? '';
$b = $_GET['kb'] ?? '';
$c = $_GET['kc'] ?? '';
$x1re = $_GET['x1re'] ?? '';
$x1im = $_GET['x1im'] ?? '';
$x2re = $_GET['x2re'] ?? '';
$x2im = $_GET['x2im'] ?? '';

if (is_numeric($id) && is_numeric($a) && is_numeric($b) && is_numeric($c) &&
    is_numeric($x1re) && is_numeric($x1im) && is_numeric($x2re) && is_numeric($x2im)) {

    $a = (float)$a;
    $b = (float)$b;
    $c = (float)$c;
    $id = (int)$id;

    $d = $b * $b - 4 * $a * $c;

    if ($d >= 0) {
        $new_x1re = (-$b + sqrt($d)) / (2 * $a);
        $new_x1im = 0;
        $new_x2re = (-$b - sqrt($d)) / (2 * $a);
        $new_x2im = 0;
    } else {
        $new_x1re = (-$b) / (2 * $a);
        $new_x1im = sqrt(-$d) / (2 * $a);
        $new_x2re = $new_x1re;
        $new_x2im = -$new_x1im;
    }

    $E = 0.001;
    $correct = (abs($x1re - $new_x1re) < $E && abs($x1im - $new_x1im) < $E &&
                abs($x2re - $new_x2re) < $E && abs($x2im - $new_x2im) < $E);

    if ($correct) {
        echo "<h3 style='color:green;'>Ответ правильный</h3>";
        $res = 1;
    } else {
        echo "<h3 style='color:red;'>Ответ ошибочный</h3>";
        $res = 0;
    }

    $insert = "INSERT INTO kv_ur (user_id, a, b, c, res) VALUES ($id, $a, $b, $c, $res)";
    if (mysqli_query($conn, $insert)) {
        $last_id = mysqli_insert_id($conn);
        } else {
        echo "<p style='color:red;'>Ошибка при добавлении записи: " . mysqli_error($conn) . "</p>";
    }

} else {
    echo "<h3 style='color:red;'>Ошибка ввода: все поля должны быть числами и должен быть выбран пользователь!</h3>";
}

include "kv_ur.php";
?>