<?php
  include "users.php";
  include "../connect.php";

  echo "<form action=add_user2.php>";
  echo "<h1>Введите нового пользователя</h1>";
    echo "Фамилия = <input type=text name=surname> <br>";
    echo "Имя = <input type=text name=name> <br><br>";    
  echo "<input type=submit value=Добавить>";
  echo "</form>";

echo "<br>";
echo "<a href='../index.html'>Вернуться на главную</a>";
?>