<!DOCTYPE html>
<html>
<head>
	<title>Search Engine</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div class="wrapper indexPage">
	
		<div class="mainSection">
			
			<div class="logoContainer">
				<img src="assets/images/searchLogo.png">
			</div>
			
			<div class="searchContainer">
			
				<form action="search.php" method="GET">
				
					<input class="searchBox" type="text" name="term">
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
