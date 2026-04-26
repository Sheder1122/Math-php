<?php
include "connect.php";

$options = ['option1' => 'Не треугольник', 'option2' => 'Треугольник'];
$selected = $_POST['my_radio'];

echo "<form method='GET' action='sin2.php'>";
foreach ($options as $value => $label){
	$checked = ($value == $selected) ? 'checked : "";
	
	echo "<input type='radio' name = 'myradio' value = '$value' id = "value" $checked";
	echo "<label for = "$value"> $label</label><br>";
}	

echo "<input type = "submit" value ="Отправить">";
echo '</form>';
?>
