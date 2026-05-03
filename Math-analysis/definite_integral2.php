<?php
include "../connect.php";

function safe_eval($expr, $x_val) {
    $expr = str_replace('^', '**', $expr);
    $expr = preg_replace('/(\d+)([a-zA-Z])/', '$1*$2', $expr);
    $expr = str_replace('x', '$x', $expr);

    $code = '$x = ' . floatval($x_val) . '; return ' . $expr . ';';
    try {
        $result = eval($code);
        return $result;
    } catch (ParseError $e) {
        return null;
    }
}

function simpson($func, $a, $b, $n = 1000) {
    if ($n % 2 != 0) $n++;
    $h = ($b - $a) / $n;
    $sum = safe_eval($func, $a) + safe_eval($func, $b);
    for ($i = 1; $i < $n; $i++) {
        $x = $a + $i * $h;
        $f = safe_eval($func, $x);
        if ($f === null) return null;
        if ($i % 2 == 0) {
            $sum += 2 * $f;
        } else {
            $sum += 4 * $f;
        }
    }
    return ($h / 3) * $sum;
}

if ($_GET) {
    $user_id = $_GET['user_id'] ?? '';
    $func = $_GET['func'] ?? '';
    $a = $_GET['a'] ?? '';
    $b = $_GET['b'] ?? '';
    $user_answer = $_GET['user_answer'] ?? '';

    if (is_numeric($user_id) && is_numeric($a) && is_numeric($b) && is_numeric($user_answer) && !empty($func)) {
        $user_id = (int)$user_id;
        $a = (float)$a;
        $b = (float)$b;
        $user_answer = (float)$user_answer;

        $correct = simpson($func, $a, $b, 2000);
        if ($correct === null) {
            echo "<h3 style='color:red;'>Ошибка в выражении функции!</h3>";
        } else {
            $E = 0.001;
            $is_correct = (abs($correct - $user_answer) < $E);
            $res = $is_correct ? 1 : 0;

            $insert = "INSERT INTO definite_integral (user_id, func, a, b, user_answer, correct_answer, res) 
                       VALUES ($user_id, '" . mysqli_real_escape_string($conn, $func) . "', $a, $b, $user_answer, $correct, $res)";
            if (mysqli_query($conn, $insert)) {
                if ($is_correct) {
                    echo "<h3 style='color:green;'>Ответ верный!</h3>";
                } else {
                    echo "<h3 style='color:red;'>Ответ неверный. Правильное значение: " . round($correct, 6) . "</h3>";
                }
            } else {
                echo "<h3 style='color:red;'>Ошибка при сохранении результатов!</h3>";
            }
        }
    } else {
        echo "<h3 style='color:red;'>Ошибка: все поля должны быть заполнены корректно (числа, выбрана функция и пользователь)!</h3>";
    }
}

include "definite_integral.php";
?>