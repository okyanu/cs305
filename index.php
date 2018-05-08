<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title>Artworkio</title>
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

	<body>
				
		<div class="all-box" align="center">
				<form action="index2.php" method="post">
		    	<input type="submit" name="someAction" value="Show All Arts" />
				</form>
		</div>	
			<div class="search-box" align="center">
	        <input type="text" autocomplete="off" placeholder="Search country..." />
	        <div class="result"></div>
		</div>		
		
		
	</body>
</html>