<!DOCTYPE html>

<?php
    $db = new mysqli("127.0.0.1", "root", "", "quiz");

    $sql_Questions = "SELECT questions.content AS question, answears.content AS answear, answears.isCorrect FROM questions JOIN answears ON questions.id = answears.Questions_id";
?>



<html>
    <head>
        <title>Super quizy</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body>
        
        <div class="header">
            <p style="font-size: 45px;"><a href="index.php" style="text-decoration: none; color: white"><b>Quizy</b></a></p>
            <p style="font-size: 30px;">Quiz składa się z pięciu pytań</p>
        </div>
        
        
        <form action="result.php" method="post">
            <?php 
            
                $res = $db->query("SELECT id FROM questions");
                $questionNumber = count($res->fetch_all(MYSQLI_ASSOC));

                $radiantID = 0;  
            
                $questionsAlredyHave = array();

                if($result = $db->query($sql_Questions))
                {
                    for($j = 0; $j < 5; $j++)
                    {

                        echo'<div class="questionBox">';
                        
                        do
                        {
                            $question = rand(1, $questionNumber); 
                            
                            for($i = 0; $i < count($questionsAlredyHave); $i++)
                            {
                                if($question != $array[$i])
                                {
                                    
                                }
                            }
                            
                            
                        }while(true)
                        
                        


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
                                                <input type="radio" name="answear'.$j.'" value="'.$answearRow[$i]["content"].'" id="' .$radiantID. '">
                                                <label for="' .$radiantID. '"> '.$answearRow[$i]["content"].' </label>
                                            </div>
                                        ';

                                        $radiantID++;
                                    } 
                                }  
                            }
                        }

                        echo '<hr></div>';
                    }
                }
            ?>
            
            <div class="header"> 
                <button style="margin-top: 5%;" type="submit">Pokaż wyniki</button>
            </div>
        </form>
        
        
        
        <script>
            
            function openPage(question, answer)
            {
                window.location.href = "comments.php?memeID=" + meme_id;
            }
                
        </script>
        
        
    </body>
</html>