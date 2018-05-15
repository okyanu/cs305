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
				<?php 
				include('dbConfig.php');
				$conn = connect();
				$sql = "SELECT artworkio.art.imagePath,artworkio.art.id,artworkio.create_at.create_year,artworkio.category.name,artworkio.artist.first_name FROM artworkio.art
					join artworkio.create_at on artworkio.create_at.id=artworkio.art.create_atid
				 	join artworkio.category on artworkio.category.id=artworkio.art.category_id 
				 	join artworkio.artist on artworkio.artist.id=artworkio.art.artistid ";
				$result = $conn->query($sql);

				$conn2 = connect();
				$sql2 ="SELECT artworkio.user.id from artworkio.user where artworkio.user.first_name='{$_SESSION['username']}'";
										$result2 = $conn2->query($sql2);
										if ($result2->num_rows > 0) {
												    // output data of each row
												    while($row = $result2->fetch_assoc()) {
												    	$csore=$row["id"];
												    }
										}
				$conn2->close();
				$use=$csore
				?>
	<nav>
	  <ul>
	    <li><a href="index.php">Home</a></li>
	    <li><a href="logout.php">Logout</a></li>
	  </ul>
	</nav>
	<div class="center">
	<table id="table" border="2" bgcolor="#73AD21">
	<p>Welcome <?php echo $_SESSION['username']; ?>!</p>


					    	<?php 
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
							    	
							        ?>

							        <tr>
							         		<td><img src="<?php echo $row["imagePath"];?> " height="100" align="center"></td>
							         		<td><form method="POST">
										  		<input type="hidden" name="action" value="<?php echo $row["id"]; ?>">
										  		<input type="hidden" name="usea" value="<?php echo $use; ?>">		
										  	<select name="gRate">
										    		<option value="1">1</option>
										    		<option value="2">2</option>
										    		<option value="3">3</option>
										    		<option value="4">4</option>
										    		<option value="5">5</option>
										  	</select>
										  		<input type="submit" name="giveRate" id="giveRate" value="VOTE" onclick="giveRate()" />
										  		<td/>
											</form> </td>
								        	<td><?php echo $row["first_name"]; ?></td> 
								        	<td><?php echo $row["create_year"]; ?></td>
							        	  	<td><?php echo $row["name"]; ?></td>
							        	 	
							        <?php 	$id=$row["id"];
							        		$conny = connect();
											$sqly ="SELECT artworkio.score.scores as k from artworkio.score WHERE art_id=$id and user_id='$use'";
											$resulty = $conny->query($sqly);
											if ($resulty->num_rows > 0) {
												    // output data of each row
												    while($row = $resulty->fetch_assoc()) {
												    	
												    	$csore=$row["k"];
												    }
											}
											else{
												$csore=0;
											}
											$conny->close();
									?>
            								<td><?php echo "Your score ".$csore; ?></td>
            						<?php 	
            								$conny2 = connect();
											$sqly2 ="SELECT avg(artworkio.score.scores) as k from artworkio.score WHERE art_id='$id' ";
											$resulty2 = $conny2->query($sqly2);
											if ($resulty2->num_rows > 0) {
												    // output data of each row
												    while($row = $resulty2->fetch_assoc()) {
														
												    	$asore=$row["k"];
												    }
											}
											$conny2->close();
									?>
							        	 	<td><?php echo "Total score ".$asore; ?></td>
							        </tr>
				<?php 

                }
                 
            } 
            $conn->close();
           ?>					        
        </table>
            </div>
            </body>
</html>