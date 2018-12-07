<!--/*----------к 06.12.2018 (после 5 урока)---------------*/

/*удалить каталог рекурсией*/

<?php
function cleanDir($path) { 
    if(file_exists($path) && is_dir($path)) {
        $dir = opendir($path);
        while (false !== ($file = readdir($dir))) {
            if ($file != '.' && $file != '..'){
                $next = $path.'/'.$file;
                if(is_dir($next)){
                     cleanDir($next);
                } else { unlink($next); }
            }
        }
        closedir($dir);
    }
    if(file_exists($path)) {
        rmdir($path);
    }
else {
    echo "$path has cleaned";
}
}
$path = "data";
cleanDir($path);
?>

/*1. создать html форму с одним текстовым полем и кнопкой submit
2. пользователь вводит в форму ссылку (URL адрес)
3. написать обработчик,
который проверяет наличие такой же ссылки в файле,
если не находит, то записывает ее в конец файла */

<?php 
$post = $_POST;
$a = $post['url'];

function addUrl($filename, $ref) {
    $context = file($filename);
    $check = in_array($ref, $context);
    if(!$check) {
    $fp = fopen($filename, 'a+');
    fwrite($fp,"\n");
    fwrite($fp,$ref);
    fclose($fp);
    var_dump($context);
    }else {
    var_dump('try again');
    }
}

addUrl('url.txt', $a);
?>

<form action="hw_0612.php" method="post">
    <input type="text" placeholder="input url" name="url"> 
    <input type="submit">
</form>

<!----------к 04.12.2018--------------->

<?php
/*поиск максимального значения в массиве*/
//с сортировкой
$arr = [23, 89, 44, 107, 67];
rsort($arr);
var_dump($arr[0]); //107

//церез цикл for
$arr = [23, 89, 44, 107, 67];

function getMaxValue($arr) {
    $value = $arr[0];
    $count = count($arr);
for($i=0; $i < $count; $i++) {
if($value > $arr[$i]) {
    $value = $value;        
} else {
    $value = $arr[$i];
}
}
var_dump($value); //107
}
getMaxValue($arr);



/*поиск минимального значения в массиве*/
//с сортировкой
$arr1 = [23, 89, 44, 107, 67];
sort($arr1);
var_dump($arr1[0]);//23

//через цикл for
$arr1 = [23, 89, 44, 107, 67];

function getMinValue($arr) {
$value = $arr[0];
$count = count($arr);
for($i=0; $i < $count; $i++) {
if($value < $arr[$i]) {
    $value = $value;        
} else {
    $value = $arr[$i];
}
}
var_dump($value); //23
}
getMinValue($arr1);


/*----------до 26.11.2018---------------*/

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
	
	var_dump(array_sum($arr));
        var_dump($sum);
}

/* 
4. Создать массив из дней недели. С помощью цикла foreach выведите все дни недели, а текущий день выведите жирным.
Текущий день можно получить с помощью функции date.
Название дней выводить по-русски

 */
    $week = array('Воскресенье ', 'Понедельник ', 'Вторник ', 'Среда ','Четверг ', 'Пятница ', 'Суббота ');
    $weeks = $week[date('w')];
    foreach ($week as $value) {
        if($value === $weeks) {
    echo '<b>'.$value.'</b>';     
} else {
    echo  $value;
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
