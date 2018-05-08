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
				<?php 
				include('dbConfig.php');
				$conn = connect();
				$sql = "SELECT artworkio.art.id,artworkio.create_at.create_year,artworkio.art.imagePath,artworkio.art.vote,artworkio.art.score,artworkio.category.name,artworkio.artist.first_name FROM artworkio.art join artworkio.create_at on artworkio.create_at.id=artworkio.art.create_atid join artworkio.category on artworkio.category.id=artworkio.art.category_id join artworkio.artist on artworkio.artist.id=artworkio.art.artistid";
				$result = $conn->query($sql);
				?>

<table id="table" border="2" bgcolor="f200">
		
					    	<?php 
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

							        ?><tr>
							         		<td><img src="<?php echo $row["imagePath"];?> " height="100" align="center"></td>
								        	<td><?php echo $row["first_name"]; ?></td> 
								        	<td><?php echo $row["create_year"]; ?></td>
							        	  	<td><?php echo $row["name"]; ?></td>
							        	  	<td><?php echo "Total vote ".$row["vote"];?></td>
							        	 	<td><?php echo "Total score ".$row["score"]; ?></td>
							        </tr>
							        <?php 

                }
            } 
            $conn->close();?>
            </body>
</html>