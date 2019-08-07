<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Parsing img krpano</title>
</head>
<body>
	<h1>Парсинг картинок</h1>
	<br><hr>
	
	<?php 

	$n1 = 0;
	$n1_max = 5;

	$n2 = 0;
	$n2_max = 3;


	$n3 = 0;
	$n3_max = 15;

	$n4=0;
	$n4_max = 15;

// массив сцен
$scene_arr = array(
	"street_new_10",
	"lobby2_13",
	"lobby1_17",
	"bar_19",
	"chocolate_corridor_24",
	"massage_29",
	"chocolate_32",
	"shop_68",
	"cappuccino_corridor_99",
	"cappuccino_diamond_144",
	"diamond_corridor_149",
	"locker_vip_156",
	"locker_men_159",
	"magnolia_corridor_164",
	"locker_kids_168",
	"locker_women1_172",
	"locker_women2_174",
	"new_york_corridor_181",
	"new_york_183",
	"solarium_185",
	"magnolia_191 ",

);


$url_krpano = "http://www.dance-school.moscow/3d-tourdata/";//каталог панорамы

	// $url_img="http://www.dance-school.moscow/3d-tourdata/street_new_10/0/0/1_1.jpg";

	// echo if_404($url_img);
  
  // перебор сцен
  foreach ($scene_arr as $name_scene) {
	$name_scene = $name_scene . '/';
    echo $name_scene;
    unset($url);
	$url= $url_krpano . $name_scene;//каталог сцены
    
	while ($n1 <= $n1_max) {
		$n2 = 0;
		mkdir($name_scene . $n1,0777,true);

		while ($n2 <= $n2_max) {
			switch ($n2) {
				case 0:
					$n3_max = 1;
					$n4_max = 1;
					break;
				
				case 1:
					$n3_max = 2;
					$n4_max = 2;
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
			}

			$n3 = 0;
			mkdir($name_scene . $n1 . '/' . $n2,0777,true);
			echo "<p class='text'>";

			while ($n3 <= $n3_max) {

				$n4=0;
				while ($n4 <= $n4_max) {

					unset($url_img,$img_name);//чистка переменных
					$img_name = $n3 . '_' . $n4 . '.jpg'; //имя изображения
					$url_img =  $url . $n1 . '/' . $n2 . '/'. $img_name; //путь до изображения


					// проверка на 404
					echo $url_img . '<br>';
					if (get_http_response_code($url_img) == 200) {
							
							if (mkdir($name_scene . $n1 . '/' . $n2,0777,true)) {//создание каталога
								// echo "dir yes: " . $n1 . '/' . $n2 . "<br>";
							}else{
								// echo "dir no: " . $n1 . '/' . $n2 . "<br>";
							};

							$path = $name_scene . $n1 . '/' . $n2 . '/' . $img_name;//куда сохранять картинку

							file_put_contents($path, file_get_contents($url_img));//сохранение картинки
							echo $url_img . '<br>';//вывод URL картинки
						}

						// echo if_404($url_img);
					$n4++;
				};
				$n3++;
			};

			echo "</p><hr>";
			$n2++;
		};

	// mobile
	unset($img_name_mobile,$url_img_mobile);

	$img_name_mobile = $n1 . '.jpg';
	$url_img_mobile	= $url . 'mobile/'. $img_name_mobile;

	if (get_http_response_code($url_img_mobile) == 200) {
								
		if (mkdir($name_scene . 'mobile',0777,true)) {//создание каталога
			// echo "dir yes: " . $n1 . '/' . $n2 . "<br>";
		}else{
			// echo "dir no: " . $n1 . '/' . $n2 . "<br>";
		};

		$path = $name_scene . 'mobile/' . $img_name_mobile;//куда сохранять картинку

		file_put_contents($path, file_get_contents($url_img_mobile));//сохранение картинки
		echo $url_img_mobile . '<br>';//вывод URL картинки
	}
	// .mobile

	echo "<hr><hr><hr>";
		$n1++;
	};//перебор файлов изображений



};//перебор сцен


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