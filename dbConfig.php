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
   	
	$gid=$_POST['action'];
	$conn2 = connect();
	$sql2 = "SELECT artworkio.art.score,artworkio.art.vote FROM artworkio.art WHERE id='{$gid}'";
	$result = $conn2->query($sql2);
	if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	$csore=$row["score"];
			    	$cvote=$row["vote"];
			    }
	}
	$conn2->close();
	$conn2 = connect();
	//echo $_POST['gRate'];
	$csore=$csore+$_POST['gRate'];
	$cvote=$cvote+1;
   	$sql3 = "UPDATE art SET score='".$csore."' WHERE id='{$gid}'" ;
   	$conn2->query($sql3);
   	$sql4 = "UPDATE art SET vote='".$cvote."' WHERE id='{$gid}'" ;
   	$conn2->query($sql4);
	$conn2->close();
}

?>