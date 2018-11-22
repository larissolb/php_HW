<?php

/*Задача #1 Разбор функций. Пока разобрала 5
* array_combine, array_walk, array_key_exists, array_search, shuffle
*/
// array_combine 
/*Мой пример с полученными данными пользователя: 
 * Удобно использовать при получении данных логина/пароля и создавать пары для дальнейшего
 *  использования в проверке при авторизации либо восстановления пароля
 */
$login = array('fox', 'bear', 'lara'); 
$psw = array('fox1T', 'B6aeR', 'lA5Ra'); 
$email = array('fox@ab.com', 'bear@gmail.com', 'lara@yandex.ru'); 
$logpsw = array_combine($login, $psw); 
$emailpsw = array_combine($email, $psw); 

print_r("login-psw:"); 
var_dump($logpsw); 

print_r("email-psw:"); 
var_dump($emailpsw);

//результат выполнения: 
/*login-psw:array(3) { ["fox"]=> string(5) "fox1T" ["bear"]=> string(5) "B6aeR" ["lara"]=> string(5) "lA5Ra" }  
*email-psw:array(3) { ["fox@ab.com"]=> string(5) "fox1T" ["bear@gmail.com"]=> string(5) "B6aeR" ["lara@yandex.ru"]=> string(5) "lA5Ra" }
*/

// array_walk 
/*Мой пример с полученными данными пользователя: 
 * группировка полученных данных в более читабельный вид отдельными абзацами (к примеру). 
 * После применения функции выше array_combine
 */
$logpsw = array("fox" => "fox1T", "bear" =>"B6aeR", "lara" => "lA5Ra"); 
function test_alter(&$item1, $key, $prefix) 
{ 
$item1 = "$prefix:<br />\n login: $key <br />\n psw: $item1 <br />\n"; 
} 
function test_print($item2, $key) 
{ 
echo "$item2 <br />\n "; 
} 
array_walk($logpsw, 'test_alter', 'UserData'); 
array_walk($logpsw, 'test_print');

//результат выполнения:
/*
 * UserData: 
* login: fox  
* psw: fox1T  
* 
* UserData: 
* login: bear  
* psw: B6aeR  
* 
* UserData: 
* login: lara  
* psw: lA5Ra
 */

// array_key_exists 
/*Мой пример с полученными данными пользователя: 
 * Поиск по базе наличия логина/емейла 
 */
$logpsw = array("fox" => "fox1T", "bear" =>"B6aeR", "lara" => "lA5Ra"); 
$item = 'sun'; 
if(array_key_exists($item, $logpsw)){ 
echo  "Success! '$item' consists in array!"; 
} else { 
echo "'$item' is not found";}

//Варианты результатов выполнения видны в echo


// array_search 
/*Мой пример с полученными данными пользователя: 
 * Поиск по базе наличия логина/емейла и в случае нахождения выдача соответствующего пароля (при восстановлении пароля) 
 */
$logpsw = array('fox1T' => "fox", "B6aeR" =>"bear", "lA5Ra" => "lara"); 
$login = 'rabbit'; 
$psw = array_search($login, $logpsw);  
if(array_search($login, $logpsw)) { 

echo "for login '$login' is founded password: '$psw'"; 
} else { 

echo "this login '$login' is not founded!"; 
}

//Варианты результатов выполнения видны в echo

// shuffle 
/*Мой пример с полученными данными, н-р, загруженными файлами(картинки) 
* Они загрузились, попали в базу, обработались (размер, туда-сюда) и через php при выгрузке 
 * на сайте рандомно выгрузились в определенное место на сайте в виде мини-слайдера
 */
$pics = array('pic1','pic2', 'pic3', 'pic4'); 
shuffle($pics); 
foreach ($pics as $pics) { 
    echo "$pics "; 
}

//Результаты рандомные, сортировка рандомно происходит

/*задача #2
 *  Дан массив [3, 1, 6, 0, 4, 5].
 *  С помощью цикла foreach найдите сумму квадратов элементов этого массива. 
 */


$arr = array(3, 1, 6 , 0 , 4, 5);
foreach ($arr as $value) {
 $sum += $value ** 2;
	
	unset($value);			
	var_dump(array_sum($arr));
        var_dump($sum);
}

/* 
4. Создать массив из дней недели. С помощью цикла foreach выведите все дни недели, а текущий день выведите жирным.
Текущий день можно получить с помощью функции date.
Название дней выводить по-русски

 */
    $week = array('Воскресенье ', 'Понедельник ', 'Вторник ', 'Среда ','Четверг ', 'Пятница ', 'Суббота ');
    foreach ($week as &$value) {
        if($value ===  $week[(date('w'))]) {
    echo '<b>'.$value.'</b>';     
} else {
    echo  $value = $value;
}
}
/* 
5. Отсортировать массив по 'price'
 */
function sortPrice($x, $y) {
    if ($x['price'] > $y['price']) {
        return true;
    } else {
        return 0;
    }

}
usort($arr, 'sortPrice');
echo '<pre>' . print_r($arr, 1) . '</pre>';