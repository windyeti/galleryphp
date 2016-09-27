<?php
if(empty($_POST) || empty($_FILES)) {
	print_r($_POST);
	print_r($_FILES);
	exit("Нету данных");
} else {
	print_r($_POST);
	print_r($_FILES);
	exit('Данные пришли');

}
?>