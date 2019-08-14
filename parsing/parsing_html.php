<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Parsing img krpano</title>
</head>
<body>

	<h1>Парсинг html</h1>
	<h2>формирует url попапов, для скачивания потом через DownloadMaster</h2>
	<br><hr>
<?php 
$popup = array(
'video2.php',
'video1.php',
'vhod.php',
'slider1.php',
'slider.php',
'popup16.php',
'popup15.php',
'popup14.php',
'popup13.php',
'popup12.php',
'popup11.php',
'popup10.php',
'popup9.php',
'popup8.php',
'popup7.php',
'popup6.php',
'popup5.php',
'popup4.php',
'popup3.php',
'popup2.php',
'popup1.php',
'popup.php',
'photo8.php',
'photo7.php',
'photo6.php',
'photo5.php',
'photo4.php',
'photo3.php',
'photo2.php',
'photo1.php',
'photo.php',
);

$url='http://360.tz-animation.ru/musei_1/includes/popup/';

foreach ($popup as $this_popup) {
	echo $url . $this_popup . '<br>';
}
 ?>


</body>
</html>