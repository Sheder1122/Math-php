<?php
include "../connect.php";

echo "<form method='GET' action='double_integral2.php'>";

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
echo "<h1>Вычисление двойного определённого интеграла</h1>";
echo "<h2>∬ f(x, y) dy dx</h2>";

echo "<h3>Используйте: x*y, sin(x)*cos(y), x^2+y^2 и т.д.</h3>";
echo "f(x, y) = <input type='text' name='func' size='40' placeholder='например: x*y' required> <br><br>";

echo "<b>Пределы интегрирования по x:</b><br>";
echo "x от <input type='text' name='ax' size='5' required> до <input type='text' name='bx' size='5' required><br><br>";

echo "<b>Пределы интегрирования по y:</b><br>";
echo "y от <input type='text' name='ay' size='5' required> до <input type='text' name='by' size='5' required><br><br>";

echo "Ваш ответ (значение интеграла) = <input type='text' name='user_answer' size='10' required> <br><br>";

echo "<input type='submit' value='Проверить ответ'>";
echo " ";
echo "<input type='reset' value='Очистить'>";
echo "</form>";

echo "<br>";
echo "<a href='../index.html'>Вернуться на главную</a>";
?>