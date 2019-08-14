<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Parsing img krpano</title>
</head>
<body>
	<h1>Парсинг картинок</h1>
	<h2>MAKE PANO (MULTIRES) droplet</h2>
	<br><hr>
	
	<?php 

// file_put_contents('img1.jpg', file_get_contents('https://natopil.ru/upload/sauna_vtour/panos/sauna.tiles/b/l1/1/l1_b_1_1.jpg'));

// массив сцен
$scene_arr = array(
	'sauna.tiles'
);

// массив сторон
$storona_arr = array(
	'b',
	'd',
	'f',
	'l',
	'r',
	'u'
);

// массив внутреннего содержимого сторон
$storona_in_arr = array(
	'l1',
	'l2',
	'l3'
);

$name_panorama = "sauna";

$url_krpano = "https://natopil.ru/upload/sauna_vtour/panos/";//каталог панорамы

	// $url_img="http://www.dance-school.moscow/3d-tourdata/street_new_10/0/0/1_1.jpg";

	// echo if_404($url_img);
  
  // перебор сцен
  foreach ($scene_arr as $name_scene) {

	$name_scene = $name_scene . '/';// sauna.tiles/
    echo $name_scene . '<br>';
    unset($url);
	$url= $url_krpano . $name_scene;// https://natopil.ru/upload/sauna_vtour/panos/sauna.tiles/
    
foreach ($storona_arr as $storona) {
	mkdir($name_panorama . '/' . $name_scene . $storona,0777,true);

	foreach ($storona_in_arr as $storona_in) {
		
			switch ($storona_in) {
				case 'l1':
					$folders = 2;
					$files = 2;
					break;
				
				case 'l2':
					$folders = 3;
					$files = 3;
					break;
				
				case 'l3':
					$folders = 5;
					$files = 5;
					break;
				
				default:
					$folders = 5;
					$files = 5;
					break;
			}

			mkdir($name_panorama . '/' . $name_scene . $storona . '/' . $storona_in,0777,true);// sauna/sauna.tiles/b/l1/
				
				$folder_this=1;
				while ($folder_this <= $folders) {
							mkdir($name_panorama . '/' . $name_scene . $storona . '/' . $storona_in . '/' .$folder_this,0777,true);// sauna/sauna.tiles/b/l1/1/

							$file_this = 1;
							while ($file_this <= $files) {

							unset($url_img,$img_name,$path,$src_img);//чистка переменных

							$img_name = $storona_in . '_' . $storona . '_' . $folder_this . '_' . $file_this . '.jpg';
							$src_img = $storona . '/' . $storona_in . '/' . $folder_this . '/';

							$url_img = $url . $src_img . $img_name;
							$path = $name_panorama . '/' . $name_scene . $src_img . $img_name;



							var_dump($url_img);
							echo "<br>";

							if (get_http_response_code($url_img) == 200) {
									file_put_contents($path, file_get_contents($url_img));//сохранение картинки
								}
								$file_this++;
							};//file_this
							$folder_this++;
				};//$folder_this


	}//$storona_in_arr

}//$storona_arr


// file_put_contents($name_panorama . '/' . $name_scene . 'preview.jpg', file_get_contents($url . 'preview.jpg'));//сохранение картинки

};//перебор сцен

echo "<h1>Done!</h1>";
echo "<pre>";
print_r($scene_arr);
echo "</pre>";


// отдает код
function get_http_response_code($theURL) {
 $headers = get_headers($theURL);
 return substr($headers[0], 9, 3);
 }

?>

</body>
</html>