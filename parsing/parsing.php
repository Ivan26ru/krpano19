<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Parsing img krpano</title>
</head>
<body>
	<?php mkdir('test' . date(U), 0777,true); ?>
	<h1>Парсинг картинок</h1>
	<br><hr>
	
	<?php 

	$n1 = 0;
	$n1_max = 5;

	$n2 = 0;
	// качество изображения, чем лучше качество тем больше максимальное число
	$n2_max = 0;


	$n3 = 0;
	$n3_max = 15;

	$n4=0;
	$n4_max = 15;

// массив сцен
$scene_arr = array(
// '_01s4_182',
// '_02s6_220',
// '_04s1_228',
// '_03_24',
// 'pano_262',
// '_09s_264',
// '_05_26',
// '_15_266',
// '_06_108',
// '_07_28',
'_14_173',
// '_13_117',
// '_12_112',
// '_10_110',
);

$device = array(
'html5',
'tablet',
'mobile',
);

//https://maghockey.com/o-centre-magii-hokkeya/3d-tur-po-magii-hokkeya/pmagic/magic-v1data/_04s1_228/0/1/2_0.jpg

// в какую папку будет сохраняться изображения
$name_panorama = "maghockey/";


$url_krpano = "https://maghockey.com/o-centre-magii-hokkeya/3d-tur-po-magii-hokkeya/pmagic/magic-v1data/";//каталог панорамы

	// echo if_404($url_img);
  
  // перебор сцен
  foreach ($scene_arr as $name_scene) {
  	$n1=0;
	$name_scene = $name_scene . '/';
    echo $name_scene . '<br>';
    unset($url);
	$url= $url_krpano . $name_scene;//каталог сцены
    
	while ($n1 <= $n1_max) {
		$n2 = 0;
		// mkdir($name_panorama . $name_scene . $n1,0777,true);

		while ($n2 <= $n2_max) {
			// количество названий изображений, надо менять в зависимости от панорамы
			switch ($n2) {
				case 0:
					$n3_max = 1;
					$n4_max = 1;
					break;
				
				case 1:
					$n3_max = 3;
					$n4_max = 3;
					break;
				
				case 2:
					$n3_max = 5;
					$n4_max = 5;
					break;
				
				case 3:
					$n3_max = 11;
					$n4_max = 11;
					break;
				
				default:
					$n3_max = 15;
					$n4_max = 15;
					break;
			};

			$n3 = 0;
			// mkdir($name_panorama . $name_scene . $n1 . '/' . $n2,0777,true);
			// echo "<p class='text'>";

			while ($n3 <= $n3_max) {

				$n4=0;
				while ($n4 <= $n4_max) {

					unset($url_img,$img_name);//чистка переменных
					$img_name = $n3 . '_' . $n4 . '.jpg'; //имя изображения
					$url_img =  $url . $n1 . '/' . $n2 . '/'. $img_name; //путь до изображения


					echo $url_img . '<br>';
					
					// проверка на 404
					if (get_http_response_code($url_img) == 200) {
							
							if (mkdir($name_panorama . $name_scene . $n1 . '/' . $n2,0777,true)) {//создание каталога
								// echo "dir yes: " . $n1 . '/' . $n2 . "<br>";
							}else{
								// echo "dir no: " . $n1 . '/' . $n2 . "<br>";
							};

							$path = $name_panorama . $name_scene . $n1 . '/' . $n2 . '/' . $img_name;//куда сохранять картинку

							file_put_contents($path, file_get_contents($url_img));//сохранение картинки
							// echo $url_img . '<br>';//вывод URL картинки
						}

						// echo if_404($url_img);
					$n4++;
				};
				$n3++;
			};

			// echo "</p><hr>";
			$n2++;
		};//n2

foreach ($device as $device_this) {
	// mobile
	unset($img_name_device,$url_img_device);

	$img_name_device = $n1 . '.jpg';
	$url_img_device	= $url . $device_this . '/'. $img_name_device;

	if (get_http_response_code($url_img_device) == 200) {
								
		if (mkdir($name_panorama . $name_scene . $device_this ,0777,true)) {//создание каталога
			// echo "dir yes: " . $n1 . '/' . $n2 . "<br>";
		}else{
			// echo "dir no: " . $n1 . '/' . $n2 . "<br>";
		};

		$path = $name_panorama . $name_scene . $device_this . '/' . $img_name_device;//куда сохранять картинку

		file_put_contents($path, file_get_contents($url_img_device));//сохранение картинки
		echo $url_img_device . '<br>';//вывод URL картинки
	};// .mobile

};//device


// CYLINDER
$cylinder_n1=0;
$cylinder_n1_max=1;



while ($cylinder_n1 <= $cylinder_n1_max) {
$cylinder_n2=0;
			switch ($cylinder_n1) {
			case 0:
				$cylinder_n2_max = 1;
				$cylinder_n3_max = 2;
				break;
			
			case 1:
				$cylinder_n2_max = 2;
				$cylinder_n3_max = 4;
				break;
			
			default:
				$cylinder_n2_max = 5;
				$cylinder_n3_max = 5;
				break;
			};

			while ($cylinder_n2 <= $cylinder_n2_max) {
				$cylinder_n3=0;
				
				while ($cylinder_n3 <= $cylinder_n3_max) {

					unset($url_img,$img_name,$this_dir);//чистка переменных
					$img_name = $cylinder_n2 . '_' . $cylinder_n3 . '.jpg'; //имя изображения
					$url_img =  $url . $cylinder_n1 . '/' . $img_name; //путь до изображения


					echo $url_img . '<br>';

				// проверка на 404
					if (get_http_response_code($url_img) == 200) {

							$this_dir=$name_panorama . $name_scene . $cylinder_n1;
							
							mkdir($this_dir,0777,true);

							$path = $this_dir . '/' . $img_name;//куда сохранять картинку

							file_put_contents($path, file_get_contents($url_img));//сохранение картинки
							// echo $url_img . '<br>';//вывод URL картинки
						}
					$cylinder_n3++;	
				};//$cylinder_n3

				$cylinder_n2++;
			}; //$cylinder_n2
	
	$cylinder_n1++;
};//$cylinder_n1



	// echo "<hr><hr><hr>";
		$n1++;
	};//перебор файлов изображений


mkdir($name_panorama . $name_scene,0777,true);
file_put_contents($name_panorama . $name_scene . 'preview.jpg', file_get_contents($url . 'preview.jpg'));//сохранение картинки
file_put_contents($name_panorama . $name_scene . 'thumbnail.jpg', file_get_contents($url . 'thumbnail.jpg'));//сохранение картинки

};//перебор сцен

echo "<h1>Done!</h1>";
echo "<pre>";
print_r($scene_arr);
echo "</pre>";

function if_404($url){

	$handle = curl_init($url);
	curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

	/* Запрос */
	$response = curl_exec($handle);

	/* Проверка на статус 404 (не найдено). */
	$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
		if($httpCode == 404) {
		    /* Обработка 404 */
			// return "404";
		}else{
		    return $url . '<br>';
		}

	curl_close($handle);

	/* Обработка $response */

};

// отдает код
function get_http_response_code($theURL) {
 $headers = get_headers($theURL);
 return substr($headers[0], 9, 3);
 }

?>


<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

	<script>
console.log('скрипт подключен'); //проверка подключения скрипта
jQuery(document).ready(function($) { //ожидание полной загрузки дом дерева и возвожность работы со знаком доллара, в движках
    console.log($); //проверка работоспособности JQuery
    console.log(jQuery.fn.jquery);//узнать версию JQuery


	// 	document.execCommand("copy");

function select(elem){
    var rng, sel;
    if ( document.createRange ) {//Не все браузеры поддерживают createRange
        rng = document.createRange();//создаем объект область
        rng.selectNode( elem )//выберем текущий узел
        sel = window.getSelection();//Получаем объект текущее выделение
        var strSel = ''+sel; //Преобразуем в строку (ох уж js...)
        if (!strSel.length) { //Если ничего не выделено
            sel.removeAllRanges();//Очистим все выделения (на всякий случай) 
            sel.addRange( rng ); //Выделим текущий узел
        }
    } else {//Если браузер не поддерживает createRange (IE<9, например)
        //Выделяем таким образом, уже без всяких проверок
        var rng = document.body.createTextRange();
        rng.moveToElementText( elem );
        rng.select();
    };
};


$(".text").click(function(){
	elem = this;
	console.log(elem);
    select(elem);
    // document.execCommand("copy");
});


	}); //конец ready
</script>


</body>
</html>