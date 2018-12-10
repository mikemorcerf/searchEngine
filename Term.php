<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<style>
		h1 {
            color: blue;
		}
	</style>
</head>
    
    <body>
		<center>
			<h1>Search Engine</h1>
			<form action='/temp.php' method='get' id ='bar'>
				<input type='text' name = 'k' size = '100'>
				<div id= search>
                    <input type= submit value='search'>
                </div>    
			</form>
		</center>	
			<?php
				$mysqli = new mysqli('localhost', 'root','', 'search_engine');

				// Output error info if there is a connection problem
				if ($mysqli->connect_errno) {
				   die("Failed to connect to MySQL: ($mysqli->connect_errno) $mysqli->connect_error");
				}
			
			
			?>
    </body>
</html>



