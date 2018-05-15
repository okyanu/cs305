<?php
/**
 * Created by PhpStorm.
 * User: Ehtesham Mehmood
 * Date: 11/24/2014
 * Time: 3:26 AM
 */
include("dbConfig.php");
$conn = connect();

if(isset($_POST['admin_login']))//this will tell us what to do if some data has been post through form with button.
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $admin_query="select * from admin where username='$username' AND password='$password'";

    $run_query=mysqli_query($conn,$admin_query);

    if(mysqli_num_rows($run_query)>0)
    {
      session_start();
      $_SESSION['username'] = $username;
      header("location: admin-index.php");
      echo "<script>window.open('admin-index.php','_self')</script>";
    }
    else {echo"<script>alert('Admin Details are incorrect..!')</script>";}

}

?>






<!DOCTYPE html>
<html lang="en" class="body-full-height">

<!-- Mirrored from aqvatarius.com/themes/atlant/html/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 May 2018 18:04:58 GMT -->
<head



        <!-- META SECTION -->
        <title>Admin Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <link href="star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>

        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="admin.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="username" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                          ---------
                        </div>
                        <div class="col-md-6">
                            <input class="btn btn-info btn-block" type="submit" value="login" name="admin_login">Log In</button>
                        </div>
                    </div>
                    </form>
                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2018 CS305
                    </div>

                </div>
            </div>

        </div>

    </body>

</html>
