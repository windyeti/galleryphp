<?php
// session_start();
if(empty($_POST) || empty($_FILES)) {
	print_r $_POST;
	print_r $_FILES;
	exit("Нету данных");
}
exit('Данные пришли');

// создаем/проверяем директорию для хранения картинок
if(!file_exists('../files'))
	// создаем папку и указываем права доступа к ней
	mkdir('../files', 777);
?>