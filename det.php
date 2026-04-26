<?php
	include "connect.php";
	
	echo "<form action='det2.php' method='GET'>";
	
	// Вывод списка пользователей для выбора
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
	echo "<h1>Введите элементы матрицы </h1>";
	
	echo "<table border='1' align='center'>";
	echo "<tr>";
	echo "<td><input type='text' name='a11' size='3' value='0' required></td>";
	echo "<td><input type='text' name='a12' size='3' value='0' required></td>";
	echo "<td><input type='text' name='a13' size='3' value='0' required></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><input type='text' name='a21' size='3' value='0' required></td>";
	echo "<td><input type='text' name='a22' size='3' value='0' required></td>";
	echo "<td><input type='text' name='a23' size='3' value='0' required></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td><input type='text' name='a31' size='3' value='0' required></td>";
	echo "<td><input type='text' name='a32' size='3' value='0' required></td>";
	echo "<td><input type='text' name='a33' size='3' value='0' required></td>";
	echo "</tr>";
	echo "</table>";
	
	echo "<br>";
	echo "<h1>Введите ваш ответ </h1>";
	echo "Определитель = <input type='text' name='user_det' size='5' required> <br>";
	
	echo "<br>";
	echo "<input type='submit' value='Проверить ответ'>";
	echo " ";
	echo "<input type='reset' value='Очистить'>";
	echo "</form>";
	
	echo "<br>";
	echo "<a href='index.html'>Вернуться на главную</a>";
?>