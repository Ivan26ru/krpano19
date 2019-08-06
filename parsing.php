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

	$n1 = 1;
	$n1_max = 5;

	$n2 = 0;
	$n2_max = 3;


	$n3 = 0;
	$n3_max = 10;

	$n4=0;
	$n4_max = 10;
	$url="http://www.dance-school.moscow/3d-tourdata/street_new_10/";
	// $url_img="http://www.dance-school.moscow/3d-tourdata/street_new_10/0/0/1_1.jpg";

	
// while ($n1 <= $n1_max) {
// 	$n2 = 0;

	while ($n2 <= $n2_max) {
		$n3 = 0;
		echo "<p class='text'>";

		while ($n3 <= $n3_max) {
			$n4=0;
			while ($n4 <= $n4_max) {
				unset($url_img);
				$url_img =  $url . $n1 . '/' . $n2 . '/'. $n3 . '_' . $n4 . '.jpg';

					if (get_http_response_code($url_img) == 200) {
						echo $url_img . '<br>';
					}

					// echo if_404($url_img);
				$n4++;
			};
			$n3++;
		};

		echo "</p><hr>";
		$n2++;
	};

// 	$n1++;
// };


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
    document.execCommand("copy");
});


	}); //конец ready
</script>


</body>
</html>