<?php
include "../connect.php";

echo "<form method='GET' action='integral2.php'>";

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
echo "<h1>Решение неопределённного интеграла</h1>";
echo "<h2>Введите интегралл и первообразную:</h2>";

echo "<h3>При возведении в степень используйте x*x | sin(x) | cos(x) | log(x) и т.д </h3>";
echo "Интеграл = <input type='text' name='func' size='40' placeholder='например: x*x' required> <br>";
echo "<br>";
echo "Первообразная = <input type='text' name='perv' size='40' placeholder='x*x*x/3' required> <br>";





echo "<br>";
echo "<input type='submit' value='Проверить ответ'>";
echo " ";
echo "<input type='reset' value='Очистить'>";
echo "</form>";

echo "<br>";
echo "<a href='../index.html'>Вернуться на главную</a>";
?>