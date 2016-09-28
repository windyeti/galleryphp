<?php
if(empty($_POST) || empty($_FILES)) {
	print_r($_POST);
	print_r($_FILES);
	echo ("Нету данных");
} else {
	print_r($_POST);
	print_r($_FILES);
	echo ('Данные пришли');
	echo '<br>';

}
$file = $_FILES['photo'];
// создаем/проверяем директорию для хранения картинок
if(!file_exists('../files'))
	// создаем папку и указываем права доступа к ней
	// если не mac os не дает создать папку 
	// из-за недостаточности прав, то их надо изменить 
	// в Get Info для папки проекта
	mkdir('../files', 777);

//вычленяем расширение картинки
$type = strtolower(strchr($file['name'], '.'));

// создаем уникальное иимя
$filename = md5(uniqid(rand(10000,99999)));

//  собираем путь до папки, в которую собираемся положить файл
// !!! $_SERVER['DOCUMENT_ROOT'] ведет только папки htdocs
// надо править путь в файле httpd.conf  до нужного места

$file_dist = $_SERVER['DOCUMENT_ROOT'].'/galleryphp/files/'.$filename.$type;
echo $file_dist;
?>