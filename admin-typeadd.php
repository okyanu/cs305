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

if (isset($_REQUEST['title'])){
        // removes backslashes
  $title = stripslashes($_REQUEST['title']);
  $start_year = date("Y", strtotime($_REQUEST["start_year"]));
  $end_year = date("Y", strtotime($_REQUEST["end_year"]));

        $query = "INSERT into `type` (title,start_year,end_year)
VALUES ('$title','$start_year', '$end_year')";
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
<form name="category" action="" method="post">
<input type="text" name="title" placeholder="Title" required />
<input type="year" name="start_year" placeholder="Start Year" />
<input type="year" name="end_year" placeholder="End Year" required />
<input type="submit" name="submit" value="Save" />
</form>
</div>
<?php } ?>
</body>
</html>
