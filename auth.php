<?php
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
    $context = file('users.csv');
    $emails = [];
    $psws = [];
    
//перебор массива из файла, где хранятся данные пользователя
foreach ($context as $value) {
    $array = explode(";", $value);
    array_push($emails, $array[1]); //получение емейлов
//    array_push($psws, $array[2]); 
    $psws += [$array[1]=>$array[2]];//получение паролей сразу с ключом в виде емейла 
    }
//    var_dump($psws);

//перебор массива из файла по соответствию паролю по введенному емейлу
foreach ($psws as $key => $value) {
if($post['email'] !== null && $post['email'] == $key){
    $psw1 = $value;
} 
}   

//запуск функций для проверки всех условий: наличие емейла и пароля в базе, сверка пароля по хешу(введенный с имеющимся в файле)
//проверка соответствия емейла паролю
   if(isPresent($post['email'], $emails)){
       if(checkHashPsw($post['psw'], $psw1)){
       $_SESSION['auth'] = true;
       include_once './share.php';
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

?>

<!DOCTYPE html>
<!--
Авторизационная форма
-->
<html>
    <head>
        <title>Rainbow - let's this world colour!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div><?php if ($_SESSION['auth']){header("Location: /share.php");exit;}?></div>
        <?php if (isset($_SESSION['auth'])): ?>

        <h2><a href="auth.php?out=true">Go out</a> </h2>
        
            <?php else: ?>
        <div id="header"> <!--header-->
            <h1 id='txt'>Welcome to Rainbow world</h1>
        </div> <!-- final header-->
        <div class="authorization"><a href="#authorization"></a> <!-- authorization -->
            <form action="auth.php" method="post" name="authorization">
                <fieldset id="authorization" class="open-window">
                    <div><input name="email"  id="email" type="email" placeholder="Your Email" required></div>
                    <div><input name="psw"  id="psw" type="password" placeholder="Your Password" required></div>           
                    <button type="submit" name="signIN"  id='BtnEnter'>enter</button>
                    <a href="#" id="aBtnlater"><input type="button" value="later" class="Btn"></a>
                    <div class="links-authorization"> <!-- links inside form authorization-->
                        <a href="#forgot">Forgot?</a>
                        <a href="/register.php">Register</a>
                    </div> <!-- final links inside authorization-->
                </fieldset>
            </form>
            <?php endif; ?>
            </div> <!-- final authorization-->
    </body>
</html>