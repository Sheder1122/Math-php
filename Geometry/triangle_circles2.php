<?php
include "../connect.php";

$user_id = $_GET['user_id'] ?? '';
$x1 = $_GET['x1'] ?? ''; $y1 = $_GET['y1'] ?? '';
$x2 = $_GET['x2'] ?? ''; $y2 = $_GET['y2'] ?? '';
$x3 = $_GET['x3'] ?? ''; $y3 = $_GET['y3'] ?? '';
$r_in_user  = $_GET['r_in_user']  ?? '';
$r_out_user = $_GET['r_out_user'] ?? '';

if (!is_numeric($user_id) || !is_numeric($x1) || !is_numeric($y1) ||
    !is_numeric($x2) || !is_numeric($y2) ||
    !is_numeric($x3) || !is_numeric($y3) ||
    !is_numeric($r_in_user) || !is_numeric($r_out_user)) {
    echo "<h3 style='color:red;'>Ошибка: все поля должны быть числами и выбран пользователь!</h3>";
    include "triangle_circles.php";
    exit;
}

$user_id = (int)$user_id;
$x1 = (float)$x1; $y1 = (float)$y1;
$x2 = (float)$x2; $y2 = (float)$y2;
$x3 = (float)$x3; $y3 = (float)$y3;
$r_in_user  = (float)$r_in_user;
$r_out_user = (float)$r_out_user;

$a = sqrt(($x2 - $x3) ** 2 + ($y2 - $y3) ** 2);
$b = sqrt(($x1 - $x3) ** 2 + ($y1 - $y3) ** 2);
$c = sqrt(($x1 - $x2) ** 2 + ($y1 - $y2) ** 2);

if (!(($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a))) {
    echo "<h3 style='color:red;'>Треугольник с такими координатами не существует!</h3>";
    include "triangle_circles.php";
    exit;
}

$p = ($a + $b + $c) / 2;
$S = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));

$r_in  = $S / $p;
$r_out = ($a * $b * $c) / (4 * $S);

$E = 0.001;
$correct = (abs($r_in - $r_in_user) < $E) && (abs($r_out - $r_out_user) < $E);
$res = $correct ? 1 : 0;

$insert = "INSERT INTO triangle_circles (user_id, x1, y1, x2, y2, x3, y3, r_in_user, r_out_user, r_in, r_out, res)
           VALUES ($user_id, $x1, $y1, $x2, $y2, $x3, $y3, $r_in_user, $r_out_user, $r_in, $r_out, $res)";

if (mysqli_query($conn, $insert)) {
    if ($res) {
        echo "<h3 style='color:green;'>Ответ верный!"</h3>";
    } else {
        echo "<h3 style='color:red;'>Ответ неверный."</h3>";
    }
} else {
    echo "<h3 style='color:red;'>Ошибка при сохранении: " . mysqli_error($conn) . "</h3>";
}

include "triangle_circles.php";
?>