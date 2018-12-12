<?php

/* 
 * обработчик. для всех форм(js) должен быть один обработчик, внутри него уже разные варианты(условия)
 */

session_start(); 
$_SESSION['email'] = $email; 

//проверка существования чего-либо в файле. для моего проекта  - это проверка емейла, но можно и логин, и другое проверить
function isPresent($value, $array) {
    if($value !== null && in_array($value, $array)){
//        echo "\n" . $value ." is exist";
        return true;
    } elseif($value == null) {
    } else {
//    echo "Check your data";
    return false;
      }
}

//проверка хеша введеного пароля с хешем пароля из файла
function checkHashPsw ($inputPsw, $checkPsw) {
    if (password_verify($inputPsw, password_hash($checkPsw, PASSWORD_DEFAULT))) {
//    echo 'psw is good';
    return true;
    } else {
//    echo 'psw is wrong';
    return false;
}   
}

//вход в систему с проверкой всех условий
function auth() {
    $post = $_POST;
    $context = file('../users.csv');
    $emails = [];
    $psws = [];
    $logins = [];
    
//перебор массива из файла, где хранятся данные пользователя
foreach ($context as $value) {
    $array = explode(";", $value);
    array_push($emails, $array[1]); //получение емейлов
//    array_push($psws, $array[2]); 
    $psws += [$array[1]=>$array[2]];//получение паролей сразу с ключом в виде емейла 
    $logins += [$array[1]=>$array[0]];//получение логинов сразу с ключом в виде емейла 
    }
//    var_dump($psws);

//перебор массива из файла по соответствию паролю по введенному емейлу
foreach ($psws as $key => $value) {
if($post['email'] !== null && $post['email'] == $key){
    $psw1 = $value;
} 
}   

//перебор массива из файла по соответствию логина по введенному емейлу
foreach ($logins as $key => $value) {
if($post['email'] !== null && $post['email'] == $key){
    $login = $value;
} 
}  
//запуск функций для проверки всех условий: наличие емейла и пароля в базе, сверка пароля по хешу(введенный с имеющимся в файле)
//проверка соответствия емейла паролю
   if(isPresent($post['email'], $emails)){
       if(checkHashPsw($post['psw'], $psw1)){
       $_SESSION['auth'] = true;
       header("Location: /Authoriz_ajax/share-ajax.php");exit;

   }else {
       echo "Password is wrong";
   }}elseif($post['email'] == null) { 
   }else {
       echo $post['email'] . " is not exist";
   }
}
    auth(); 

       
//инициализация выхода
$get = $_GET;
$out = $get['out'];

function logout() {
    session_destroy();
    unset($_SESSION['auth']);
}

if ($out == true) {
    logout();
}

//загрузка картинок

function loadPics (){
    $pics = $_FILES;   
    $types = ['image/png'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE); 
//    var_dump($pics);
foreach ($pics["picture"]["error"] as $key => $error) {
    $tmp_name = $pics["picture"]["tmp_name"][$key];
    $name = basename($pics["picture"]["name"][$key]);
    $type = finfo_file($finfo, $tmp_name);
//    var_dump($type);

   //check size 
    if($error == UPLOAD_ERR_FORM_SIZE){
        echo "$name size is more than 50kb";
    } elseif(!in_array($type, $types)){
        echo "<p>Sorry, this pic '$name' has bad type. Use only .png images</p>";
    }
    else {
        move_uploaded_file($tmp_name, "imgUsers/$name");
        echo "<p>Your pic '$name' has uploaded!</p>";
    }
}
finfo_close($finfo);

}
loadPics();