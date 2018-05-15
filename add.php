<?php
include("dbConfig.php");
$conn = connect();


if (isset($_POST['submit'])){
        // removes backslashes
  $name = stripslashes($_REQUEST['name']);
  $artistid = $_POST['artistid'];
  $typeid = $_POST['typeid'];
  $create_atid = $_POST['create_atid'];
  $show_atid = $_POST['show_atid'];
  $category_id = $_POST['category_id'];
  $imagePath = stripslashes($_REQUEST['imagePath']);



        $query = "INSERT into `art` (name,artistid,typeid,create_atid,show_atid,category_id,imagePath)
VALUES ('$name','$artistid', '$typeid','$create_atid','$show_atid','$category_id','$imagePath')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>Inserted succesfully.</h3>
<br/>Click to  go back to admin home page <a href='admin-index.php'>Click</a></div>";
        }
    }else{

?>
