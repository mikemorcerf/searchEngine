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
			
			<div class="crawlContainer">
			
				<form action="crawl.php" method="GET">
				
					<input class="searchBox" type="text" name="term" placeholder="Enter website">
					<input class="searchButton" type="submit" value="Crawl">
				
				</form>
			
			</div>
			
		
		</div>
		
	</div>

	
</body>
</html>
