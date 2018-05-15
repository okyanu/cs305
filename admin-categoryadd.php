<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: admin.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Category Add</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <p><a href="admin-index.php" class="btn btn-danger">Go Back</a></p>

<?php
include("dbConfig.php");
$conn = connect();

if (isset($_REQUEST['name'])){
        // removes backslashes
	$name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string

        $query = "INSERT into `category` ( name)
VALUES ( '$name')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>Inserted succesfullu.</h3>
<br/>Click to  go back to admin home page <a href='admin-index.php'></a>Click</div>";
        }
    }else{
?>

<div class="form">
<h1>Category Add</h1>
<form name="category" action="" method="post">
<input type="text" name="name" placeholder="Name" required />

<input type="submit" name="submit" value="Save" />
</form>
</div>
<?php } ?>
</body>
</html>
