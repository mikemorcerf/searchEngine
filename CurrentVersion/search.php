<?php
include("config.php");
include("results.php");
	
if(isset($_GET["term"])) {
	$term = $_GET["term"];
}
else {
	exit("You must enter a search term");
}

$type = isset($_GET["type"]) ? $_GET["type"] : "sites";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Engine</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	
</head>
<body>

	<div class="wrapper">
	
		<div class="header">
		
		
			<div class="headerContent">
				
				<div class="searchContainer">
				
					<form action="search.php" method="GET">
					
						<div class="searchBarContainer">
						
							<input class="searchBox" type="text" name="term" value="<?php echo $term; ?>">
							<button>
								Search
							</button>
						</div>
						
					</form>
				
				</div>
				
			</div>
		
		</div>
		
		<div class="mainResultsSection">
			
			<?php
			
			$time_pre = microtime(true);
			
			$resultsProvider = new results($con);

			$numResults = $resultsProvider->getNumResults($term);
			$pageSize = 20;
            
            
            function insertTerm($term, $count) {
                global $con;

                $query = $con->prepare("INSERT INTO searches(term, count)
                                VALUES(:term, :count)");


                $query->bindParam(":term", $term);
                $query->bindParam(":count", $count);

                return $query->execute();
            }

                insertTerm($term, $numResults);
            
			$time_post = microtime(true);
			$exec_time = $time_post - $time_pre;
			$exec_time = number_format($exec_time, 6);
			
			
			echo "<p class='resultsCount'>$numResults results found in $exec_time seconds</p>";
			
			echo $resultsProvider->getResultsHtml($term);
			?>
		
		</div>
		
		
	</div>

	
</body>
</html>
