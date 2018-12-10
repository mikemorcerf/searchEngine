<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
</head>
    
    <body>
        <?php
            $mysqli = new mysqli('hello', 'mike', 'pass1', 'search_engine');

            // Output error info if there is a connection problem
            if ($mysqli->connect_errno) {
               die("Failed to connect to MySQL: ($mysqli->connect_errno) $mysqli->connect_error");
            }
        
        ?>
    </body>
</html>



