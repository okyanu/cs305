<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title>Artworkio</title>
	    <link rel="stylesheet" href="css/style.css">
	    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("ajax.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
	</head>
	<style>
.center {
    margin: auto;
    width: 60%;
    border: 3px solid #73AD21;
    padding: 10px;
    text-align: center;
}
</style>
	<body>
		<nav>
	  <ul>
	    <li><a href="index.php">Home</a></li>
	    <li><a href="logout.php">Logout</a></li>
	  </ul>
	</nav>	
		<div class="center">
				<form action="index2.php" method="post">
		    	<input type="submit" name="someAction" value="Show All Arts" />
				</form>
		</div>
		<div class="center">	
			<div class="search-box">
	        <input type="text" autocomplete="off" placeholder="Search artist..." />
	        <div class="result"></div>
		</div>	
		</div>	
			
		
		
	</body>
</html>