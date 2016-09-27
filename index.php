<?php
session_start();

if(!isset($_SESSION['name']) || !isset($_SESSION['count']))
	$_SESSION = array(
		'name' => 'Егор',
		'count' => 0
		);
	else
		$_SESSION['count']++;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<p>Имя:<?=$_SESSION['name']?></p>
<p>Счетчик:<?=$_SESSION['count']?></p>
<p style="margin-bottom: 20px"><a href="logout.php">Выход</a></p>
<form action="php/upload.php" class="forma" metod="POST" enctype="multipart/form-data">
	<div class="forma__name">Имя:<input type="text" class="forma__name__field"></div>
	<div class="forma__email">Email:<input type="text" class="forma__email__field"></div>
	<div class="forma__photo"><input type="file" class="forma__photo__button"></div>
	<div class="forma__submit"><input type="submit" class="forma__submit__button" value="Отправить"></div>
</form>
<script src="js/jquery-2.1.4.js"></script>
<script>
$(function() {
	$('.forma__submit__button').click(function(e) {
		e.preventDefault();
		$.ajax({
			url : 'php/upload.php',
			method : 'post',
			data : {
				data : dataform
				},
			success : function(result) {

			},
			error : function(err) {
				console.log('Ошибка');

			}
			}
		});
	})
});
</script>
</body>
</html>