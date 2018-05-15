<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: admin.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our site.</h1>
    </div>
    <p><a href="admin-logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
    <p><a href="admin-categoryadd.php" class="btn btn-danger">Add Category</a></p>
    <p><a href="admin-typeadd.php" class="btn btn-danger">Add Type</a></p>
    <p><a href="admin-artistadd.php" class="btn btn-danger">Add Artist</a></p>
    <p><a href="admin-artadd.php" class="btn btn-danger">Add Art</a></p>
    <p><a href="admin-create_at.php" class="btn btn-danger">Add Art Create Year</a></p>
    <p><a href="admin-show_at.php" class="btn btn-danger">Add Art Show Place</a></p>

</body>
</html>
