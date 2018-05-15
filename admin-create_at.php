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
<title>Type Add</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <p><a href="admin-index.php" class="btn btn-danger">Go Back</a></p>

<?php
include("dbConfig.php");
$conn = connect();

if (isset($_REQUEST['date'])){
        // removes backslashes
  $date = 	stripslashes($_REQUEST['date']);
  $month = 	 stripslashes($_REQUEST['month']);
  $year = 	stripslashes($_REQUEST['year']);

        $query = "INSERT into `create_at` (create_date,create_month,create_year)
VALUES ('$date','$month', '$year')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>Inserted succesfully.</h3>
<br/>Click to  go back to admin home page <a href='admin-index.php'>Click</a></div>";
        }
    }else{
?>

<div class="form">
<h1>Type Add</h1>
<form name="create_at" action="" method="post">
<input type="text" name="date" placeholder="Day" required />
<input type="text" name="month" placeholder="Month" />
<input type="text" name="year" placeholder="Year" required />

<input type="submit" name="submit" value="Save" />
</form>
</div>
<?php } ?>
</body>
</html>
