<!DOCTYPE html>
<html>
<head>
	<title>Search Engine</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="wrapper indexPage">
	
		<div class="mainSection">
			
			<div class="searchContainer">
			
				<form action="search.php" method="GET">
				
					<input class="searchBox" type="text" name="term" placeholder="What can I google for you?">
					<input class="searchButton" type="submit" value="Search">
				
				</form>
			
			</div>
            
            <div class = "adminContainer">
				    <label>Admin:</label>
					<input class="searchBox" type="password" name="term" placeholder="Enter Password">
					<input class="searchButton" type="submit" value="login">
            </div>
			
		
		</div>
		
	</div>

	
</body>
    
<script>
   var admin = document.getElementsByClassName('searchButton');
   var pass = document.getElementsByClassName('searchBox');
   admin[1].addEventListener("click", function(){
       if(pass[1].value === "admin"){
           window.location.href = "admin.php";
       }
       else{
           alert("Incorrect Admin Password");
       }
   });
</script>    
</html>
