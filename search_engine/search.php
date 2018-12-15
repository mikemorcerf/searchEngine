<?php
include("config.php");
include("classes/SiteResultsProvider.php");
	
if(isset($_GET["term"])) {
	$term = $_GET["term"];
}
else {
	exit("You must enter a search term");
}

$type = isset($_GET["type"]) ? $_GET["type"] : "sites";
$page = isset($_GET["page"]) ? $_GET["page"] : "1";
$startPage = isset($_GET["page"]) ? $_GET["page"] : "0";



?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Engine</title>
	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
</head>
<body>

	<div class="wrapper">
	
		<div class="header">
		
		
			<div class="headerContent">
			
				<div class="logoContainer">
					<a href="index.php">
						<img src="assets/images/searchLogo2.png">
					</a>
				</div>
				
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
			
			$resultsProvider = new SiteResultsProvider($con);

			$numResults = $resultsProvider->getNumResults($term);
			$pageSize = 20;
            
            if($startPage == 0){
                function insertTerm($term, $count) {
                    global $con;

                    $query = $con->prepare("INSERT INTO searches(term, count)
                                    VALUES(:term, :count)");


                    $query->bindParam(":term", $term);
                    $query->bindParam(":count", $count);

                    return $query->execute();
                }

                insertTerm($term, $numResults);
            }
			$time_post = microtime(true);
			$exec_time = $time_post - $time_pre;
			$exec_time = number_format($exec_time, 6);
			
			
			echo "<p class='resultsCount'>$numResults results found in $exec_time seconds</p>";
			
			echo $resultsProvider->getResultsHtml($page, $pageSize, $term);
			?>
		
		</div>
		
		<div class="paginationContainer">
			<div class="pageButtons">
			
				<div class="pageNumberContainer">
					START
				</div>
				
				<?php
				$pagesToShow = 10;
				$numPages = ceil($numResults / $pageSize);				
				$pagesLeft = min($pagesToShow, $numPages);
				
				$currentPage = $page - floor($pagesToShow / 2);
				
				if($currentPage<1) {
					$currentPage = 1;
				}
				
				if($currentPage + $pagesLeft > $numPages + 1){
					$currentPage = $numPages + 1 - $pagesLeft;
				}
				
				while($pagesLeft !=0 && $currentPage <= $numPages){
					
					if($currentPage == $page){
					
						echo "<div class='pageNumberContainer'>
								<span class='pageNumber'>$currentPage</span>
							</div>";
					}
					else{
					
						echo "<div class='pageNumberContainer'>
								<a href='search.php?term=$term&page=$currentPage'>
									<span class='pageNumber'>$currentPage</span>
								</a>
							</div>";
					}
					
					$currentPage++;
					$pagesLeft--;
				}
				
				?>
				
				<div class="pageNumberContainer">
					END
				</div>
				
			</div>
		</div>
		
		
	</div>

	
</body>
</html>
