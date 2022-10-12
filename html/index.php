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
            <p style="font-size: 30px;">Test składa się z trzech pytań</p>
        </div>
        
        <form action="result.php" method="post">
            <?php
                $res = $db->query("SELECT id FROM questions");
                $questionNumber = count($res->fetch_all(MYSQLI_ASSOC));
                
                $radiantID = 0;   
            
                for($j = 0; $j < 3; $j++)
                {
                    
                    echo'<div class="questionBox">';

                    $question = rand(1, $questionNumber);  

                    //ZAPYTANIE Z WYLOSOWANYM PYTANIANIEM
                    $sql_Question = "SELECT id, content FROM questions WHERE id = " .$question;

                    //ZAPYTANIE Z ODPOWIEDZIAMI DO PYTANIA
                    $sql_Answears = "SELECT id AS answearID, content, isCorrect, Questions_id FROM answears WHERE Questions_id = " .$question;



                    if($questionResult = $db->query($sql_Question))
                    {
                        if($answearResult = $db->query($sql_Answears))
                        {
                            $answearRow = $answearResult->fetch_all(MYSQLI_ASSOC);

                            while($questionRow = $questionResult->fetch_array())
                            {
                                echo '
                                    <div class="question">
                                        <p>' .$questionRow["content"]. '</p>
                                    </div>
                                    ';


                                for($i = 0; $i < count($answearRow); $i++)
                                {
                                    echo '
                                        <div class="answear">
                                        <input type="radio" name="answear'.$j.'"value="'.$radiantID.'"><span>' .$answearRow[$i]["content"]. '</span> </div>
                                    ';
                                    
                                    $radiantID++;
                                } 
                            }  
                        }
                    }

                    echo '<hr></div>';
                }

                $db->close();
        
            ?>
            
            <div class="header"> 
                <button style="margin-top: 5%;" type="submit">Zakończ test</button>
            </div>
        </form>
        
        
    </body>
</html>