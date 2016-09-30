<?php
namespace abeautifulsite;
use Exception;

require '../lib/SimpleImage/src/abeautifulsite/SimpleImage.php';
require('../db.php');

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
	mkdir('../files', 0777);

//вычленяем расширение картинки
$type = strtolower(strchr($file['name'], '.'));

// создаем уникальное иимя
$filename = md5(uniqid(rand(10000,99999)));
$filename_copy = $filename.'_copy';

//  собираем путь до папки, в которую собираемся положить файл
// !!! $_SERVER['DOCUMENT_ROOT'] ведет только папки htdocs
// надо править путь в файле httpd.conf  до нужного места
$file_dist = $_SERVER['DOCUMENT_ROOT'].'/galleryphp/files/'.$filename.$type;
$file_dist_copy = $_SERVER['DOCUMENT_ROOT'].'/galleryphp/files/'.$filename.'_copy'.$type;

// проверка по расширению
if($file['type'] != 'image/jpeg' && $file['type'] != 'image/gif' && $file['type'] != 'image/png')
	exit('Не верный тип файла');

// проверка типа файла через mime 
$imageinfo = getimagesize($file['tmp_name']);
if($imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/png')
	exit('Не верный тип файла');

// перемещаем файл из tmp в папку
if(!move_uploaded_file($file['tmp_name'], $file_dist))
	echo 'Не переместили файл:'.$filename;
echo 'Переместили файл:'.$filename;

// simpleimage
if (!is_dir('../files/processed/'))
    mkdir('../files/processed/', 0777);

$img = new SimpleImage();

$img->load($file_dist)->thumbnail(100, 75)->save('../files/processed/'.$filename.'_trumb'.$type);
echo '<br>Фото обработано. Trumb сделан.';

// пробуем запрос к БД gallery. предварительно занес парочку с помощью phpmyadmin, подключили db.php
$sql = 'SELECT *  FROM users';
$res = $DB->query($sql);

if($res[0]) {
	$users = array();
	foreach($res as $value) {
		$users[] = $value;
	}
	print_r($users[0]);
}
// ----------------> сделать вывод страницу в формлении html <-------------------------------------------

// внесем в БД данные из нашего запроса -34.56






?>