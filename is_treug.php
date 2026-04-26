<?php
include "connect.php";

echo "<form method='GET' action='is_treug2.php'>";

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
echo "<h1>Определение типа треугольника по координатам вершин</h1>";
echo "<h2>Введите координаты точек:</h2>";

echo "Точка A: x = <input type='text' name='x1' size='5' required> y = <input type='text' name='y1' size='5' required><br>";
echo "Точка B: x = <input type='text' name='x2' size='5' required> y = <input type='text' name='y2' size='5' required><br>";
echo "Точка C: x = <input type='text' name='x3' size='5' required> y = <input type='text' name='y3' size='5' required><br>";

echo "<h2>Выберите тип треугольника:</h2>";
$options = [
    1 => 'Не треугольник',
    2 => 'Тупоугольный треугольник',
    3 => 'Прямоугольный треугольник',
    4 => 'Остроугольный треугольник'
];

foreach ($options as $val => $label) {
    echo "<input type='radio' name='triangle_type' value='$val' required> $label<br>";
}

echo "<br>";
echo "<input type='submit' value='Проверить ответ'>";
echo " ";
echo "<input type='reset' value='Очистить'>";
echo "</form>";

echo "<br>";
echo "<a href='index.html'>Вернуться на главную</a>";
?>