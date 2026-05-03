<?php
include "../connect.php";

function matrix_rank($a11, $a12, $a13, $a21, $a22, $a23, $a31, $a32, $a33) {
    $E = 1e-9;
    $A = [
        [$a11, $a12, $a13],
        [$a21, $a22, $a23],
        [$a31, $a32, $a33]
    ];

    $rank = 0;
    $cols = 3;
    $rows = 3;
    $row = 0;

    for ($col = 0; $col < $cols && $row < $rows; $col++) {
        $maxVal = 0;
        $maxRow = $row;
        for ($i = $row; $i < $rows; $i++) {
            if (abs($A[$i][$col]) > $maxVal) {
                $maxVal = abs($A[$i][$col]);
                $maxRow = $i;
            }
        }

        if ($maxVal < $E) {
            continue;
        }

        if ($maxRow != $row) {
            $temp = $A[$row];
            $A[$row] = $A[$maxRow];
            $A[$maxRow] = $temp;
        }

        for ($i = $row + 1; $i < $rows; $i++) {
            $factor = $A[$i][$col] / $A[$row][$col];
            for ($j = $col; $j < $cols; $j++) {
                $A[$i][$j] -= $factor * $A[$row][$j];
            }
        }

        $rank++;
        $row++;
    }

    return $rank;
}
if ($_GET) {
    $id = $_GET['user_id'] ?? '';
    $a11 = $_GET['a11'] ?? ''; $a12 = $_GET['a12'] ?? ''; $a13 = $_GET['a13'] ?? '';
    $a21 = $_GET['a21'] ?? ''; $a22 = $_GET['a22'] ?? ''; $a23 = $_GET['a23'] ?? '';
    $a31 = $_GET['a31'] ?? ''; $a32 = $_GET['a32'] ?? ''; $a33 = $_GET['a33'] ?? '';
    $user_rank = $_GET['user_rank'] ?? '';

    if (is_numeric($id) &&
        is_numeric($a11) && is_numeric($a12) && is_numeric($a13) &&
        is_numeric($a21) && is_numeric($a22) && is_numeric($a23) &&
        is_numeric($a31) && is_numeric($a32) && is_numeric($a33) &&
        is_numeric($user_rank) && $user_rank >= 0 && $user_rank <= 3) {

        $id = (int)$id;
        $user_rank = (int)$user_rank;

        $correct_rank = matrix_rank(
            (float)$a11, (float)$a12, (float)$a13,
            (float)$a21, (float)$a22, (float)$a23,
            (float)$a31, (float)$a32, (float)$a33
        );

        $res = ($user_rank === $correct_rank) ? 1 : 0;

        $insert = "INSERT INTO matrix_rank 
            (user_id, a11, a12, a13, a21, a22, a23, a31, a32, a33, user_rank, correct_rank, res) 
            VALUES ($id, $a11, $a12, $a13, $a21, $a22, $a23, $a31, $a32, $a33, $user_rank, $correct_rank, $res)";

        if (mysqli_query($conn, $insert)) {
            if ($res) {
                echo "<h3 style='color:green;'>Ранг определён верно!</h3>";
            } else {
                echo "<h3 style='color:red;'>Ошибка! Правильный ранг = $correct_rank.</h3>";
            }
        } else {
            echo "<h3 style='color:red;'>Ошибка при сохранении результатов: " . mysqli_error($conn) . "</h3>";
        }
    } else {
        echo "<h3 style='color:red;'>Ошибка: все поля должны быть числами, ранг выбран от 0 до 3!</h3>";
    }
}

include "rank_matrix.php";
?>