<?php 
function doRegist() {
session_start(); 

$post = $_POST;
$login = $post['login'];
$email = $post['email'];
$psw = $post['psw'];
//$country = $post['country'];
$context = file('users.csv');
//    var_dump($context);
$logins = [];
$emails = [];
    foreach ($context as $value) {
        $array = explode(";", $value);
//        var_dump($array[0]);
//        var_dump($array[1]);
        array_push($logins, $array[0]);  
        array_push($emails, $array[1]); 
}
function addNewUser($filename, $data, $array, $item, $array1, $item1) {
    if($item === null){
          echo "Full the form below";
    }elseif(in_array($item, $array)){
        echo $item . " is busy";
    }elseif(in_array($item1, $array1)) {
           echo $item1 ." is busy";
    }else {
    $fp = fopen($filename, 'a+');
    fwrite($fp,"\n");
    fwrite($fp,$data . session_id());
    fclose($fp);
    echo "Welcome! You're with us!";
}
}
    addNewUser('users.csv',$login . ";" . $email . ";". $psw . ";", $logins, $login, $emails, $email);
}
doRegist();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Welcome to Rainbow world</title>
        <meta charset="UTF-8">
        <meta name="keywords" content="раскраски, хобби, творчество, сообщество, общение, радужные события">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.jpg">
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
    <div id="header"> <!--header-->
        <h1 id="txt">Rainbow world</h1>
        </div> <!-- final header-->
             <div class="register-window-m"> <!-- form register-->
                <form action="register.php" method="post" name="create">
                <fieldset id="create">
                    <legend><h4>Creat an account</h4></legend>
                    <div>
                        <label for="loginReg">Your name</label> 
                        <input name='login' id="loginReg" type="text" placeholder="Your name" required>
                    </div>
<!--                     <div id="busyLogin">It is occupied!</div>-->
                    <div>
                        <label for="emailReg">Your email</label> 
                        <input name='email' id="emailReg" type="email" placeholder="Your email" required>
                    </div>
<!--                      <div id="busyEmail">It is occupied!</div>-->
                    <div>
                        <label for="pswReg">Your password</label> 
                        <input name='psw' id="pswReg" type="password" placeholder="Your password" required>
                    </div>
                    <div id="info">Password must content min 5 characters, 1 upper letter and 1 number</div>
                    <div><label for="country">Your country</label>
                        <select id="country" required> 
                            <option selected>Choose country</option> 
                            <optgroup label="Europe"> 
                            <option value="E1">Portugal</option> 
                            <option value="E2">Spain</option> 
                            <option value="E3">France</option> 
                            <option value="E4">Italy</option>
                            <option value="E5">Germany</option>
                            <option value="E6">Great Britain</option>
                            <option value="E7">Russia</option>
                            </optgroup>
                            <optgroup label="Asia">
                            <option value="A1">Japan</option> 
                            <option value="A2">China</option> 
                            <option value="A3">Thailand</option> 
                            <option value="A4">Vietnam</option>
                            </optgroup>
                        </select>
                    </div>
                    <div id="noCountry">Choose your country</div>
                    <button type="submit" name="signUP" id="createBtn">join</button>
                    <button type="reset" class="Btn" id="BtnEnter">reset</button>
                    <a href="../index.html" target="_self" class="Btn">back</a>
                </fieldset>
                </form>
                </div> <!-- final form register--> 
    </body>
</html>

