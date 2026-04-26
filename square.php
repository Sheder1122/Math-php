<?php
include "connect.php";
	
echo "<form method='GET' action='square2.php'>";
	
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
echo "<h1>Нахождение углов по сторонам</h1>";
echo "<h2>Введите стороны треугольника:</h2>";

echo "<td> Сторона А = <input type='text' name='a' size='3' value='0' required></td> <br>";
echo "<td> Сторона Б = <input type='text' name='b' size='3' value='0' required></td> <br>";
echo "<td> Сторона В = <input type='text' name='c' size='3' value='0' required></td> <br>";


echo "<h2>Введите найденные вами длины высот:</h2>";

echo "<tr>";
echo "<td> Высота угла А = <input type='text' name='ha' size='3' value='0' required></td> <br>";
echo "<td> Высота угла Б = <input type='text' name='hb' size='3' value='0' required></td> <br>";
echo "<td> Высота угла В = <input type='text' name='hc' size='3' value='0' required></td> <br>";
echo "</tr>";

echo "<h2>Введите найденную площадь:</h2>";

echo "<td> S =  <input type='text' name='s' size='3' value='0' required></td> <br>";


echo "<br>";
echo "<input type='submit' value='Проверить ответ'>";
echo " ";
echo "<input type='reset' value='Очистить'>";
echo "</form>";

	
echo "<br>";
echo "<a href='index.html'>Вернуться на главную</a>";
?>
