<?php

?>

<!DOCTYPE html>
<!--
Здесь пользователи будут иметь возможность загружать свои картинки
-->
<html>
    <head>
        <title>Rainbow - let's this world colour!</title>
        <meta charset="UTF-8">
        <meta name="description" content="Сообщество любителей раскраски и делать этот мир ярким">
        <meta name="keywords" content="раскраски, хобби, творчество, сообщество, общение, радужные события">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="../img/icon.jpg">
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
        <div id="header"> <!--header-->
            <h1 id='txt'>Welcome to Rainbow world</h1>
        </div> <!-- final header-->
        <div>      
                    <p><?php echo "Hello" . $login; ?></p>
                    <form action="ajax/obrabotchik.php" method="post" autocomplete="on" enctype="multipart/form-data" name="Upload">
                    <fieldset class="field"> 
                        <div class="item">
                        <label for="nameBook">Name of coloring-book's</label>
                        <input id="nameBook" type="text" autofocus>
                        </div>
                    <div class="item" id="theme">
                        <label for="theme">What theme?</label>
                        <label><input type="radio" name='theme' value='Nature'>Nature</label>
                        <label><input type="radio" name='theme' value='Space' >Space</label>
                        <label><input type="radio" name='theme' value='Animals'>Animals</label>
                        <label><input type="radio" name='theme' value='Cars'>Cars</label>
                        <label><input type="radio" name='theme' value='Cities'>Cities</label>
                        <label><input type="radio" name='theme' value='Other' checked>Other</label>
                    </div> 
<!--                    <div class="item-mobile">
                        <label for="themeM">What theme?</label>
                        <select id="themeM" required> 
                            <option value="Nature"> Nature</option> 
                            <option selected value="Space">Space</option> 
                            <option value="Animals">Animals</option> 
                            <option value="Cars">Cars</option>
                            <option value="Cities">Cities</option>
                            <option value="Other">Other</option>
                        </select> 
                    </div>-->
                    <div class="item">
                        <label for="type">What instruments did you use?</label>
                        <select id="type" required> 
                            <option value="pen"> colour pens</option> 
                            <option selected value="pencil">colour pencils</option> 
                            <option value="gouache">gouache</option> 
                            <option value="watercolour">watercolour</option>
                            <option value="markers">markers</option>
                        </select> 
                    </div>
                    <div class="item">
                        <label for="amount">How many colours did you use?</label> 
                       <input id="amount" type="number" min="1" step="1">
                    </div>
                    <div>
                        <label for="describe">&#9999; Describe it</label>
                        <textarea id="describe" placeholder="I choosed this pic because..." cols="70" rows="3" maxlength="100"></textarea>
                    </div>  
                    <fieldset id="share">
                    <div>
                        <label for="pics">Upload your best picture</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="51200"> 
                        <input id="pics" name="picture[]" type="file" multiple accept="image/*">
                    </div>
                    </fieldset>
                    <fieldset class="button-shareit">
                        <input type="submit" value="Share" id='shareBtn' class="Btn">
                        <input type="reset" value="Reset" class="Btn">
                    </fieldset>  
                    </fieldset>  
                </form>
                            
            <h2><a href="auth-ajax.php?out=true">Go out</a></h2>
       </div> <!--конец главной рамки-->
    </body>
</html>
