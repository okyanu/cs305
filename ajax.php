<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include('dbConfig.php');
$mysqli = connect();
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
if(isset($_REQUEST['term'])){
    // Prepare a select statement
    $sql = "SELECT * FROM artworkio.art join artworkio.create_at on artworkio.create_at.id=artworkio.art.create_atid join artworkio.category on artworkio.category.id=artworkio.art.category_id join artworkio.artist on artworkio.artist.id=artworkio.art.artistid WHERE first_name LIKE ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST['term'] . '%';
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
             ?>
            <table id="table" border="2" bgcolor="f200">
		
					    	<?php 
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_array(MYSQLI_ASSOC)) {

							        ?><tr>
							         		<td><img src="<?php echo $row["imagePath"];?> " height="100" align="center"></td>
								         	<td><form method="POST">
										  		<input type="hidden" name="action" value="<?php echo $row["id"]; ?>">
										  	<select name="gRate">
										    		<option value="1">1</option>
										    		<option value="2">2</option>
										    		<option value="3">3</option>
										    		<option value="4">4</option>
										    		<option value="5">5</option>
										  	</select>
										  		<input type="submit" name="giveRate" id="giveRate" value="RUN" onclick="giveRate()" /><td/>
											</form> </td>
								        	<td><?php echo $row["first_name"]; ?></td> 
								        	<td><?php echo $row["create_year"]; ?></td>
							        	  	<td><?php echo $row["name"]; ?></td>
							        	  	<td><?php echo "Total vote ".$row["vote"];?></td>
							        	 	<td><?php echo "Total score ".$row["score"]; ?></td>
							        </tr>
							        <?php 

                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    $stmt->close();
}
 
// Close connection
$mysqli->close();
?>