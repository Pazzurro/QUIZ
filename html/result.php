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
    <body>
        
        <div class="header">
            <p style="font-size: 45px;"><a href="index.php" style="text-decoration: none; color: white"><b>Testy</b></a></p>
            <p style="font-size: 30px;">Wynik twojego quizu</p>
        </div>
        
        
        <?php
                
            if(isset($_POST["answear0"]) && isset($_POST["answear1"]) && isset($_POST["answear2"]) && isset($_POST["answear3"]) && isset($_POST["answear4"]))
            {
                $answersArray = array($_POST["answear0"], $_POST["answear1"], $_POST["answear2"], $_POST["answear3"], $_POST["answear4"]);
                
                $correctAnswers = 0;
                
                if($correctAnswerResult = $db->query($sql_GetCorrectAnswers))
                {
                    while($correctAnswerRow = $correctAnswerResult->fetch_array())
                    {
                        for($i = 0; $i < 5; $i++)
                        {
                           if($answersArray[$i] == $correctAnswerRow["content"])
                            {
                                $correctAnswers++;
                            }  
                        }   
                    } 
                }
                
                $procent = ($correctAnswers * 20); 
                
                echo "Liczba poprawnych odpowiedzi: " .$correctAnswers. "<br> To daje: ".$procent. "%";
                
                
            }
            else
            {
               echo "Nie odpowiedziałeś na wszystkie odpowiedzi"; 
            }
            
            
        
            $db->close();
        
        ?>
        
    </body>
</html>