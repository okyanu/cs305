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
    $sql = "SELECT DISTINCT artworkio.art.imagePath,artworkio.artist.first_name,artworkio.create_at.create_year,artworkio.category.name, AVG(artworkio.score.scores) as kit
        FROM artworkio.art join artworkio.create_at on artworkio.create_at.id=artworkio.art.create_atid join artworkio.category on artworkio.category.id=artworkio.art.category_id join artworkio.artist on artworkio.artist.id=artworkio.art.artistid join artworkio.score on artworkio.score.art_id=artworkio.art.id WHERE first_name LIKE ?";
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST['term'] . '%';
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();
             ?>
            <table id="table" border="2" bgcolor="#73AD21" align="center">
		
					    	<?php 
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
							    	$ro

							        ?><tr>
							         		<td><img src="<?php echo $row["imagePath"];?> " height="100" align="center"></td>
								        	<td><?php echo $row["first_name"]; ?></td> 
								        	<td><?php echo $row["create_year"]; ?></td>
							        	  	<td><?php echo $row["name"]; ?></td>
							        	 	<td><?php echo "Total score ".$row["kit"]; ?></td>
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