<?php
include "../connect.php";

function safe_eval_xy($expr, $x_val, $y_val) {
    $expr = str_replace('^', '**', $expr);
    $expr = preg_replace('/(\d+)([xy])/', '$1*$2', $expr);
    $expr = str_replace('x', $x_val, $expr);
    $expr = str_replace('y', $y_val, $expr);

    try {
        return eval("return $expr;");
    } catch (Throwable $e) {
        return null;
    }
}

function inner_simpson($func, $x_val, $y_min, $y_max, $n = 100) {
    if ($n % 2 != 0) $n++;
    $h = ($y_max - $y_min) / $n;
    $sum = safe_eval_xy($func, $x_val, $y_min) + safe_eval_xy($func, $x_val, $y_max);
    for ($i = 1; $i < $n; $i++) {
        $y = $y_min + $i * $h;
        $f = safe_eval_xy($func, $x_val, $y);
        if ($f === null) return null;
        $sum += ($i % 2 == 0) ? 2 * $f : 4 * $f;
    }
    return ($h / 3) * $sum;
}

function double_simpson($func, $ax, $bx, $ay, $by, $n = 100) {
    if ($n % 2 != 0) $n++;
    $h = ($bx - $ax) / $n;
    $g = function($x) use ($func, $ay, $by) {
        return inner_simpson($func, $x, $ay, $by, 100);
    };

    $g_a = $g($ax);
    $g_b = $g($bx);
    if ($g_a === null || $g_b === null) return null;
    $sum = $g_a + $g_b;
    for ($i = 1; $i < $n; $i++) {
        $x = $ax + $i * $h;
        $gx = $g($x);
        if ($gx === null) return null;
        $sum += ($i % 2 == 0) ? 2 * $gx : 4 * $gx;
    }
    return ($h / 3) * $sum;
}

if ($_GET) {
    $user_id = $_GET['user_id'] ?? '';
    $func    = $_GET['func']    ?? '';
    $ax = $_GET['ax'] ?? '';  $bx = $_GET['bx'] ?? '';
    $ay = $_GET['ay'] ?? '';  $by = $_GET['by'] ?? '';
    $user_answer = $_GET['user_answer'] ?? '';

    if (is_numeric($user_id) && !empty($func) &&
        is_numeric($ax) && is_numeric($bx) &&
        is_numeric($ay) && is_numeric($by) &&
        is_numeric($user_answer)) {

        $user_id = (int)$user_id;
        $ax = (float)$ax;  $bx = (float)$bx;
        $ay = (float)$ay;  $by = (float)$by;
        $user_answer = (float)$user_answer;

        $correct = double_simpson($func, $ax, $bx, $ay, $by, 80);
        if ($correct === null) {
            echo "<h3 style='color:red;'>Ошибка в выражении функции. Проверьте синтаксис!</h3>";
        } else {
            $E = 0.001;
            $is_correct = (abs($correct - $user_answer) < $E);
            $res = $is_correct ? 1 : 0;

            $escaped_func = mysqli_real_escape_string($conn, $func);
            $insert = "INSERT INTO double_integral 
                    (`user_id`, `func`, `ax`, `bx`, `ay`, `by`, `user_answer`, `correct_answer`, `res`) 
                    VALUES ($user_id, '$escaped_func', $ax, $bx, $ay, $by, 
                            $user_answer, $correct, $res)";

            if (mysqli_query($conn, $insert)) {
                if ($is_correct) {
                    echo "<h3 style='color:green;'>Ответ верный!</h3>";
                } else {
                    echo "<h3 style='color:red;'>Ответ неверный. Правильное значение ≈ " . round($correct, 6) . "</h3>";
                }
            } else {
                echo "<h3 style='color:red;'>Ошибка при сохранении результатов: " . mysqli_error($conn) . "</h3>";
            }
        }
    } else {
        echo "<h3 style='color:red;'>Ошибка: все поля должны быть заполнены корректно!</h3>";
    }
}

include "double_integral.php";
?>