<?php
include "../connect.php";

  $a=$_GET['checkbox'];
  if (empty($a))
    echo "<h1>Ничего не выбрано</h1>";
  else
  {
    for ($i=0;$i<count($a);$i++)
    {
      $id=$a[$i];
      $sql="delete from users where id=$id";
      $q=mysqli_query($conn, $sql);
    }
  }
  include('delete_users.php');
?>