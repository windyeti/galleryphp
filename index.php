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
<form action="php/upload.php" class="forma" method="POST" enctype="multipart/form-data">
	<div class="forma__name">Имя:<input type="text" name="firstname" class="forma__name__field"></div>
	<div class="forma__email">Email:<input type="text" name="email" class="forma__email__field"></div>
	<div class="forma__photo"><input type="file" name="photo" class="forma__photo__button"></div>
	<div class="forma__submit"><input type="submit" name="submit" class="forma__submit__button" value="Отправить"></div>
</form>
<div class="result"></div>
<script src="js/jquery-2.1.4.js"></script>
<script>
// $(function() {
// 	$('.forma__submit__button').click(function(e) {
// 		// e.preventDefault();
// 		var dataform = {};
// 		var result = '';
// 		var fields = $('.forma [name="firstname"], .forma [name="email"], .forma [name="photo"]');
// 		fields.each(function(ndx, elem) {
// 			dataform[$(elem).attr('name')] = $(elem).val();
// 			result += '<div>'+$(elem).attr('name')+' : '+$(elem).val()+'</div>';
// 		});
// 		console.log(dataform);
// 		$('.result').html(result);

// 		var data = JSON.stringify(dataform);
// 		console.log(data);

// 		$.ajax({
// 			url : 'php/upload.php',
// 			type : 'post',
// 			data : {
// 				data : data
// 				},
// 			success : function(result) {
// 				$('.result').html( $('.result').html()+'<div>Все ушло</div>' )
// 			},
// 			error : function(err) {
// 				console.log(err.message);

// 			},
// 			dataType: 'json'
// 		});
// 	return false;	
// 	});
// });
</script>
</body>
</html>