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

if (isset($_REQUEST['first_name'])){
        // removes backslashes
  $first_name = stripslashes($_REQUEST['first_name']);
  $surname = stripslashes($_REQUEST['surname']);
  $birthdate = date("Y-m-d", strtotime($_REQUEST["birthday"]));
  $nation = stripslashes($_REQUEST['nation']);

        $query = "INSERT into `artist` (first_name,surname,birthday,nation)
VALUES ( '$first_name','$surname', '$birthdate','$nation')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>Inserted succesfully.</h3>
<br/>Click to  go back to admin home page <a href='admin-index.php'>Click</a></div>";
        }
    }else{
?>

<div class="form">
<h1>Artist Add</h1>
<form name="category" action="" method="post">
<input type="text" name="first_name" placeholder="First Name" required />
<input type="text" name="surname" placeholder="Surname" required />
<input type="date" name="birthday" placeholder="Birthday" />
<input type="text" name="nation" placeholder="Nation" required />
<input type="submit" name="submit" value="Save" />
</form>
</div>
<?php } ?>
</body>
</html>
