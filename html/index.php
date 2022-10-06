<!DOCTYPE html>

<?php
    $db = new mysqli("127.0.0.1", "root", "", "quiz");

    $sql_Questions = "SELECT questions.content AS question, answears.content AS answear, answears.isCorrect FROM questions JOIN answears ON questions.id = answears.Questions_id";
?>



<html>
    <head>
        <title>Super quizy</title>
    </head>
    <body>
        
        
        
        <?php
            
            if($result = $db->query($sql_Questions))
            {
                while($row = $result->fetch_array())
                {
                    echo $row["question"]. "<br>";
                    
                    for($i = 0; $i < 4; $i++)
                    {
                        echo '<p>' .$row["answear"]. '  -  -  - ' .$row["isCorrect"];
                    }
                }
            }
        
        ?>
        
        
        
    </body>
</html>