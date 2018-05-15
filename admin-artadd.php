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

  <p><a href="admin-index.php" class="btn btn-danger">Go Back</a></p>
<?php
     // display the errors
     error_reporting(E_ALL);
     ini_set("display_errors", 1);
 ?>

 <?php
     // when the form submitted



     include("dbConfig.php");
     $conn = connect();
     if(!empty($_POST['category'])){
       $currentDir = getcwd();
       $uploadDirectory = "/images/";
       $uploadDirectory2 = "images/";

       $errors = []; // Store all foreseen and unforseen errors here

       $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

       $fileName = $_FILES['imagePath']['name'];
       $fileTmpName  = $_FILES['imagePath']['tmp_name'];

       $uploadPath = $currentDir . $uploadDirectory . basename($fileName);
       $uploadPath2 = $uploadDirectory2 . basename($fileName);

       $name = stripslashes($_REQUEST['name']);
       $category_id =  $_POST['category'];
       $artistid = $_POST['artist'];
       $typeid = $_POST['type'];
       $create_atid = $_POST['create'];
       $show_atid =  $_POST['show'];



        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }


       $query = "INSERT into `art` (name,artistid,typeid,create_atid,show_atid,category_id,imagePath)
VALUES ('$name','$artistid', '$typeid','$create_atid','$show_atid','$category_id','$uploadPath2')";

$result = mysqli_query($conn,$query);
if($result){
    echo "<div class='form'>
<h3>Inserted succesfully.</h3>
<br/>Click to  go back to admin home page <a href='admin-index.php'>Click</a></div>";
}


     }
 ?>

 <?php
     // connection test


     $sql = "SELECT * FROM artworkio.category" ;
     $result = mysqli_query($conn,$sql);
 ?>

 <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>" enctype='multipart/form-data'>
   <input type="text" name="name" placeholder="Name" required />
  <select name="category">
    <?php $sql = "SELECT * FROM artworkio.category" ;
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)): ?>
      <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
    <?php endwhile; ?>
  </select>

  <select name="artist">
    <?php $sql = "SELECT * FROM artworkio.artist" ;
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)): ?>
      <option value="<?= $row['id']; ?>"><?= $row['first_name']; ?></option>
    <?php endwhile; ?>
  </select>

  <select name="type">
    <?php $sql = "SELECT * FROM artworkio.type" ;
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)): ?>
      <option value="<?= $row['id']; ?>"><?= $row['title']; ?></option>
    <?php endwhile; ?>
  </select>

  <select name="create">
    <?php $sql = "SELECT * FROM artworkio.create_at" ;
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)): ?>
      <option value="<?= $row['id']; ?>"><?= $row['create_year']; ?></option>
    <?php endwhile; ?>
  </select>

  <select name="show">
    <?php $sql = "SELECT * FROM artworkio.show_at" ;
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)): ?>
      <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
    <?php endwhile; ?>
  </select>
  <input type="file" name="imagePath" placeholder="Name" required />



  <input type="submit" value="Add">
 </form>
