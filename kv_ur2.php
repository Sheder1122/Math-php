<?php
include "connect.php";

// Проверяем существует ли таблица kv_ur
$table_check = mysqli_query($conn, "SHOW TABLES LIKE 'kv_ur'");
if (mysqli_num_rows($table_check) == 0) {
    // Создаем новую таблицу с правильной структурой
    $createTable = "CREATE TABLE kv_ur (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        a FLOAT,
        b FLOAT,
        c FLOAT,
        res TINYINT
    )";
    mysqli_query($conn, $createTable);
    echo "<p style='color:blue;'>Таблица kv_ur создана</p>";
} else {
    // Проверяем есть ли поле user_id в таблице
    $column_check = mysqli_query($conn, "SHOW COLUMNS FROM kv_ur LIKE 'user_id'");
    if (mysqli_num_rows($column_check) == 0) {
        // Добавляем поле user_id в существующую таблицу
        $alterTable = "ALTER TABLE kv_ur ADD COLUMN user_id INT AFTER id";
        mysqli_query($conn, $alterTable);
        echo "<p style='color:blue;'>Поле user_id добавлено в таблицу kv_ur</p>";
    }
}

// Получение данных из формы
$user_id = $_GET['user_id'] ?? '';
$a = $_GET['ka'] ?? '';
$b = $_GET['kb'] ?? '';
$c = $_GET['kc'] ?? '';
$x1re = $_GET['x1re'] ?? '';
$x1im = $_GET['x1im'] ?? '';
$x2re = $_GET['x2re'] ?? '';
$x2im = $_GET['x2im'] ?? '';

// Проверка, что все поля числовые и выбран пользователь
if (is_numeric($user_id) && is_numeric($a) && is_numeric($b) && is_numeric($c) &&
    is_numeric($x1re) && is_numeric($x1im) && is_numeric($x2re) && is_numeric($x2im)) {

    $a = (float)$a;
    $b = (float)$b;
    $c = (float)$c;
    $user_id = (int)$user_id;

    // Вычисление правильных корней
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

    // Сравнение с введёнными значениями (с погрешностью 0.001)
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

    // Запись в таблицу kv_ur с привязкой к пользователю
    $insert = "INSERT INTO kv_ur (user_id, a, b, c, res) VALUES ($user_id, $a, $b, $c, $res)";
    if (mysqli_query($conn, $insert)) {
        $last_id = mysqli_insert_id($conn);
        } else {
        echo "<p style='color:red;'>Ошибка при добавлении записи: " . mysqli_error($conn) . "</p>";
    }

} else {
    echo "<h3 style='color:red;'>Ошибка ввода: все поля должны быть числами и должен быть выбран пользователь!</h3>";
}

// Вывод записей из таблицы kv_ur с информацией о пользователях
$sql = "SELECT kv_ur.*, users.surname, users.name 
        FROM kv_ur 
        LEFT JOIN users ON kv_ur.user_id = users.id 
        ORDER BY kv_ur.id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>История решений (таблица kv_ur)</h2>";
    echo "<table border='1' align='center' width='90%'>";
    echo "<tr>";
    echo "<th>ID записи</th>";
    echo "<th>Пользователь</th>";
    echo "<th>ID пользователя</th>";
    echo "<th>a</th>";
    echo "<th>b</th>";
    echo "<th>c</th>";
    echo "<th>Результат</th>";
    echo "</tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        $res_text = $row['res'] == 1 ? "Правильно" : "Ошибка";
        $color = $row['res'] == 1 ? "lightgreen" : "lightcoral";
        
        $user_name = isset($row['surname']) ? $row['surname'] . " " . $row['name'] : "Неизвестный пользователь";
        
        echo "<tr>";
        echo "<td align='center'>{$row['id']}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td align='center'>{$row['user_id']}</td>";
        echo "<td align='center'>{$row['a']}</td>";
        echo "<td align='center'>{$row['b']}</td>";
        echo "<td align='center'>{$row['c']}</td>";
        echo "<td align='center' bgcolor='$color'>$res_text</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<p>Таблица kv_ur пуста</p>";
}

// Повторный вывод формы для новых попыток
include "kv_ur.php";
?>