<?php
include "connect.php";

$user_id = $_GET['user_id'] ?? '';
$x1 = $_GET['x1'] ?? '';
$y1 = $_GET['y1'] ?? '';
$x2 = $_GET['x2'] ?? '';
$y2 = $_GET['y2'] ?? '';
$x3 = $_GET['x3'] ?? '';
$y3 = $_GET['y3'] ?? '';
$user_choice = $_GET['triangle_type'] ?? '';

if (is_numeric($user_id) && is_numeric($x1) && is_numeric($y1) && 
    is_numeric($x2) && is_numeric($y2) && is_numeric($x3) && 
    is_numeric($y3) && is_numeric($user_choice)) {
    
    $user_id = (int)$user_id;
    $x1 = (float)$x1; $y1 = (float)$y1;
    $x2 = (float)$x2; $y2 = (float)$y2;
    $x3 = (float)$x3; $y3 = (float)$y3;
    $user_choice = (int)$user_choice;
    
    // Вычисление длин сторон
    $a = sqrt(pow($x2 - $x3, 2) + pow($y2 - $y3, 2)); // сторона a (BC)
    $b = sqrt(pow($x1 - $x3, 2) + pow($y1 - $y3, 2)); // сторона b (AC)
    $c = sqrt(pow($x1 - $x2, 2) + pow($y1 - $y2, 2)); // сторона c (AB)
    
    $E = 0.001;
    
    // Проверка существования треугольника
    if (($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a)) {
        $a2 = $a * $a;
        $b2 = $b * $b;
        $c2 = $c * $c;
        
        // Прямоугольный?
        if (abs($a2 + $b2 - $c2) < $E || abs($a2 + $c2 - $b2) < $E || abs($b2 + $c2 - $a2) < $E) {
            $correct_type = 3;
        }
        // Тупоугольный?
        elseif (($a2 + $b2 - $c2) < -$E || ($a2 + $c2 - $b2) < -$E || ($b2 + $c2 - $a2) < -$E) {
            $correct_type = 2;
        }
        // Остроугольный
        else {
            $correct_type = 4;
        }
    } else {
        $correct_type = 1; // не треугольник
    }
    
    $res = ($user_choice == $correct_type) ? 1 : 0;
    
    // Сохранение в БД
    $insert = "INSERT INTO is_treug (user_id, x1, y1, x2, y2, x3, y3, user_choice, res) 
               VALUES ($user_id, $x1, $y1, $x2, $y2, $x3, $y3, $user_choice, $res)";
    mysqli_query($conn, $insert);
    
    // Вывод результата
    if ($res) {
        echo "<h3 style='color:green;'>Верно! Вы правильно определили тип треугольника.</h3>";
    } else {
        $type_names = [1 => 'Не треугольник', 2 => 'Тупоугольный треугольник', 
                       3 => 'Прямоугольный треугольник', 4 => 'Остроугольный треугольник'];
        echo "<h3 style='color:red;'>Неверно! Правильный тип: {$type_names[$correct_type]}.</h3>";
    }
} else {
    echo "<h3 style='color:red;'>Ошибка: все поля должны быть числами и выбран пользователь!</h3>";
}

include "is_treug.php";
?>