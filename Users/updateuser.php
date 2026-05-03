<?php
include "../connect.php";
	
	echo "<form action='updateuser2.php' method='GET'>";
	
	$sql = "SELECT * FROM users ORDER BY id";
	$q = mysqli_query($conn, $sql);
	
	echo "<table border='1' align='center' width='80%'>";
	echo "<caption> Выберите пользователя для редактирования </caption>";
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
	echo "<h1> Введите новые данные </h1>";
	echo "Фамилия = <input type='text' name='surname' required> <br>";
	echo "Имя = <input type='text' name='name' required> <br>";
		
	echo "<br>";
	echo "<input type='submit' value ='Обновить данные'>";
	echo " ";
	echo "<input type='reset' value='Очистить'>";
	echo "</form>";
	
	echo "<br>";
	echo "<a href='../index.html'>Вернуться на главную</a>";
?>