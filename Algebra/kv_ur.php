<?php
include "../connect.php";

echo "<form action='kv_ur2.php' method='GET'>";

$sql = "SELECT * FROM users";
$q = mysqli_query($conn, $sql);

echo "<table border='1' align='center' width='80%'>";
echo "<caption> Список пользователей </caption>";


for ($i = 0; $i < mysqli_num_rows($q); $i++) {
    echo "<tr>";
    $f = mysqli_fetch_array($q);
    echo "<td><input type='radio' name='user_id' value='{$f['id']}' required> {$f['id']} </td>";
    echo "<td> {$f['surname']} </td>";
    echo "<td> {$f['name']} </td>";
    echo "</tr>";
}

echo "</table>";

echo "<h1> Введите коэффициенты </h1>";
echo "a = <input type='text' size='2' name='ka' required> <br>";
echo "b = <input type='text' size='2' name='kb' required> <br>";
echo "c = <input type='text' size='2' name='kc' required> <br>";

echo "<br>";
echo "<h1> Ваши предполагаемые корни: </h1>";
echo "x1.Re = <input type='text' size='2' name='x1re' required> ";
echo "Im = <input type='text' size='2' name='x1im' required> <br>";
echo "x2.Re = <input type='text' size='2' name='x2re' required> ";
echo "Im = <input type='text' size='2' name='x2im' required> <br>";

echo "<br>";
echo "<input type='submit' value='Проверить ответ'>";
echo "</form>";

echo "<br>";
echo "<a href='../index.html'>Вернуться на главную</a>";
?>