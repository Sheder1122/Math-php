<?php

include "../connect.php";

echo "<form method='GET' action='triangle_circles2.php'>";

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
echo "<h1>Радиусы вписанной и описанной окружностей треугольника</h1>";
echo "<h2>Введите координаты вершин:</h2>";

echo "Точка A: x = <input type='text' name='x1' size='5' required> y = <input type='text' name='y1' size='5' required><br>";
echo "Точка B: x = <input type='text' name='x2' size='5' required> y = <input type='text' name='y2' size='5' required><br>";
echo "Точка C: x = <input type='text' name='x3' size='5' required> y = <input type='text' name='y3' size='5' required><br>";

echo "<br>";
echo "<h2>Введите предполагаемые радиусы:</h2>";
echo "Радиус вписанной окружности r = <input type='text' name='r_in_user' size='8' required><br>";
echo "Радиус описанной окружности R = <input type='text' name='r_out_user' size='8' required><br>";

echo "<br>";
echo "<input type='submit' value='Проверить ответ'>";
echo " ";
echo "<input type='reset' value='Очистить'>";
echo "</form>";

echo "<br>";
echo "<a href='../index.html'>Вернуться на главную</a>";
