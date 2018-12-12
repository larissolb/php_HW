<?php

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
        <script src="ajax/js/form.js"></script>
    </head>
    <body>
        <div id="header"> <!--header-->
            <h1 id='txt'>Welcome to Rainbow world</h1>
        </div> <!-- final header-->
        <?php if (isset($_SESSION['auth'])): ?>
        <div class="authorization"><a href="#authorization"></a> <!-- authorization -->
            <?php else: ?>
            <form action="ajax/obrabotchik.php" method="post" name="authorization">
                <fieldset id="authorization" class="open-window">
                    <div><input name="email"  id="email" type="email" placeholder="Your Email" required></div>
                    <div><input name="psw"  id="psw" type="password" placeholder="Your Password" required></div>           
                    <button type="submit" name="signIN"  id='BtnEnter'>enter</button>
                    <a href="#" id="aBtnlater"><input type="button" value="later" class="Btn"></a>
                    <div class="links-authorization"> <!-- links inside form authorization-->
                        <a href="#forgot">Forgot?</a>
                        <a href="../register.php">Register</a>
                    </div> <!-- final links inside authorization-->
                </fieldset>
            </form>
            <?php endif; ?>
            </div> <!-- final authorization-->
    </body>
</html>