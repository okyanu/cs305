<?php
function connect() {
$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "artworkio";
  $con = mysqli_connect($hostname, $username, $password, $dbname);	
  return $con;
}

if(array_key_exists('giveRate',$_POST)){
	
    giveRate();
}

function giveRate(){
   	$uid=$_POST['usea']; ///id aliyo
	$gid=$_POST['action']; //resimin idsini aliyo
	$re=$_POST['gRate']; /// verilen oyu aliyo
	$conn2 = connect();
	/*echo "id".$uid;
	echo "resimin".$gid;
	echo "verilen".$re;*/
		
		$komut="SELECT * FROM artworkio.score WHERE artworkio.score.art_id='$gid' AND 
		artworkio.score.user_id='$uid'";
		$res=$conn2->query($komut);
		if ($res->num_rows > 0) {
							    // output data of each row
							    while($row = $res->fetch_array(MYSQLI_ASSOC)) {
							    	$sc=$row["user_id"];
							    }
		}
		//echo $sc;
		if($sc!=0){
			$sql = "UPDATE artworkio.score SET artworkio.score.scores='$re' 
					WHERE artworkio.score.art_id='$gid' AND artworkio.score.user_id='$uid'";
				if ($conn2->query($sql) === TRUE) {
    				echo "Record updated successfully";
					} 
					$conn2->close();
		}
		else{
    	$sql2 = "INSERT INTO artworkio.score (scores, art_id, user_id)
		VALUES ('$re', '$gid', '$uid')";

			if ($conn2->query($sql2) === TRUE) {
			    echo "New record created successfully";
			} else {
		}	    
		
	}
	$conn2->close();
}
?>