<?php
include "connect.php";

// Добавляем открывающий тег form, которого не хватало
echo "<form method='GET' action='kramer2.php'>";

$sql = "SELECT * FROM users";
$q = mysqli_query($conn, $sql);

echo "<table border='1' align='center' width='80%'>";
echo "<caption> Список пользователей </caption>";
echo "<tr>";
echo "<th>Выбор</th>";
echo "<th>ID</th>";
echo "<th>Фамилия</th>";
echo "<th>Имя</th>";
echo "</tr>";

for ($i = 0; $i < mysqli_num_rows($q); $i++) {
    echo "<tr>";
    $f = mysqli_fetch_array($q);
    echo "<td align='center'><input type='radio' name='user_id' value='{$f['id']}' required></td>";
    echo "<td align='center'>{$f['id']}</td>";
    echo "<td>{$f['surname']}</td>";
    echo "<td>{$f['name']}</td>";
    echo "</tr>";
}
echo "</table>";

echo "<br>";
echo "<h1>Решение системы линейных уравнений методом Крамера</h1>";
echo "<h2>Система 3x3:</h2>";

echo "<table border='1' align='center' cellpadding='10'>";

// Первая строка
echo "<tr>";
echo "<td> <input type='text' name='a11' size='3' value='0' required> x1 +</td>";
echo "<td> <input type='text' name='a12' size='3' value='0' required> x2 +</td>";
echo "<td> <input type='text' name='a13' size='3' value='0' required> x3 =</td>";
echo "<td> <input type='text' name='b1' size='3' value='0' required> </td>";
echo "</tr>";

// Вторая строка
echo "<tr>";
echo "<td> <input type='text' name='a21' size='3' value='0' required> x1 +</td>";
echo "<td> <input type='text' name='a22' size='3' value='0' required> x2 +</td>";
echo "<td> <input type='text' name='a23' size='3' value='0' required> x3 =</td>";
echo "<td> <input type='text' name='b2' size='3' value='0' required> </td>";
echo "</tr>";

// Третья строка
echo "<tr>";
echo "<td> <input type='text' name='a31' size='3' value='0' required>  x1 +</td>";
echo "<td> <input type='text' name='a32' size='3' value='0' required>  x2 +</td>";
echo "<td> <input type='text' name='a33' size='3' value='0' required>  x3 =</td>";
echo "<td> <input type='text' name='b3' size='3' value='0' required> </td>";
echo "</tr>";

echo "</table>";

echo "<br>";
echo "<h2>Введите ваше решение (корни системы):</h2>";
echo "<table border='0' align='center'>";
echo "<tr>";
echo "<td>x1 = <input type='text' name='x1' size='5' required></td>";
echo "<td>x2 = <input type='text' name='x2' size='5' required></td>";
echo "<td>x3 = <input type='text' name='x3' size='5' required></td>";
echo "</tr>";
echo "</table>";

echo "<br>";
echo "<input type='submit' value='Проверить ответ'>";
echo " ";
echo "<input type='reset' value='Очистить'>";
echo "</form>";

echo "<br>";
echo "<a href='index.html'>Вернуться на главную</a>";
?>