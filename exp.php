<?php
include "connect.php";
	
echo "<form method='GET' action='exp2.php'>";
	
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
    echo "<td align='center'><input type='radio' name='id' value='{$f['id']}' required></td>";
    echo "<td align='center'>{$f['id']}</td>";
    echo "<td>{$f['surname']}</td>";
    echo "<td>{$f['name']}</td>";
    echo "</tr>";
}
echo "</table>";

echo "<br>";
echo "<h1>Нахождение корня экспоненты</h1>";
echo "<h2>Введите значения:</h2>";

echo "<td> Значение икса = <input type='text' name='x' size='3' value='0' required></td> <br>";
echo "<td> Вычисленное значение = <input type='text' name='ex' size='3' value='0' required></td> <br>";


echo "<br>";
echo "<input type='submit' value='Проверить ответ'>";
echo " ";
echo "<input type='reset' value='Очистить'>";
echo "</form>";

	

	
echo "<br>";
echo "<a href='index.html'>Вернуться на главную</a>";
?>
