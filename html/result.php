<!DOCTYPE html>

<?php
    $db = new mysqli("127.0.0.1", "root", "", "quiz");

    $sql_GetCorrectAnswers = "SELECT content, isCorrect FROM answears WHERE isCorrect = 1";
?>



<html>
    <head>
        <title>Super quizy</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body style="width: 50%; margin: auto">

        
        <div class="header">
            <p style="font-size: 45px;"><a href="index.php" style="text-decoration: none; color: white"><b>Quizy</b></a></p>
            <p style="font-size: 30px;">Wynik twojego quizu</p>
        </div>
        
        
        <?php
            $correctAnswers = 0;
            $wrongAnswers = 0;
            $procent = 0;
        
            $answersArray = array();
            
            $howManyCorrect = $_POST["howManyCorrect"];
            $howManyAnswers = $_POST["howManyAnswers"];
            
                
            for($i = 0; $i < $howManyAnswers; $i++)
            {
                if(isset($_POST[$i]))
                {
                    array_push($answersArray, $_POST[$i]);
                }
                
            }
        
            
            for($i = 0; $i < count($answersArray); $i++)
            {
                if($answersArray[$i] == 1)
                {
                    $correctAnswers++;
                } 
                else
                {
                    $wrongAnswers++;
                }
            }   
                
        
            if($howManyCorrect != 0)
            {
                if($correctAnswers - $wrongAnswers > 0)
                {
                    $procent = (100 * ($correctAnswers - $wrongAnswers)) / $howManyCorrect;  
                }
                
              
            }
                
            echo'
                
                <div class="questionBox" style="text-align: center; color: white">
                    <h2> Twój wynik </h2>
                    <h1> ' .round($procent, 2).' %</h1>
                    
                    <br><br>
                    
                    <h3> Odpowiedziałeś poprawnie na: ' .$correctAnswers. ' odpowiedzi z ' .$howManyCorrect. ' poprawnych</h3>
                    <h3> Odpowiedziałeś błędnie na: ' .$wrongAnswers. ' odpowiedzi</h3>
                </div>
            ';
        
        
            //echo "Liczba poprawnych odpowiedzi: " .$howManyCorrect. "<br>";
            //echo "Liczba twoich poprawnych odpowiedzi: " .$correctAnswers. "<br>";
            //echo "Wynik w procentach: " .round($procent, 2). "%";

            
            
        
            $db->close();
        
        ?>
        
    </body>
</html>