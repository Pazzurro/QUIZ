<!DOCTYPE html>

<?php
    $db = new mysqli("127.0.0.1", "root", "", "quiz");
?>



<html>
    <head>
        <title>Super quizy</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body>
        
        <div class="header">
            <p style="font-size: 45px;"><a href="index.php" style="text-decoration: none; color: white"><b>Testy</b></a></p>
            <p style="font-size: 30px;">Wynik twojego testu</p>
        </div>
        
        
        <?php
                
            echo $_POST["3"];    
        
        ?>
        
    </body>
</html>