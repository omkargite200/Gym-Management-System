<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title> Login Page </title>
</head>
<body>

<div class="container" id="container">
    <div class="form-container Admin">
        <form action="#" method="POST" autocomplete="off">
            <h1> Hi!, Admin </h1>
            <span>use your email And Password</span>
            <input type="text" placeholder="Email" name="email">
            <input type="password" placeholder="password" name="Pass">
            <input type="submit" name="Admin" value="Login"></button>
        </form>
    </div>
    <div class="form-container sign-in">
        <form action="#" method="POST" autocomplete="off">
            <h1> User </h1>
            <div class="social-icons">
                <a href="https://myaccount.google.com" target="_blank" class="social-icons"></i></a>
                <a href="https://facebook.com" target="_blank" class="social-icons"></i></a>
                <a href="https://www.linkedin.com" target="_blank" class="social-icons"></i></a>
            </div>
            <span> or use your email password </span>
            <input type="text" placeholder="Username" name="Usern">
            <input type="password" placeholder="Password" name="Pass">
            <a href="registration.php"> Create an Account </a>
            <a href="#"> Forgot Password </a>
            <input type="submit" name="User" value="Login"></button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Welcome Back</h1>
                <p> Enter your personal details to use all of site features</p>
                <button class="hidden" id="login"> user </button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Hello, Friend!</h1>
                <p> Enter your personal details to use all of site features</p>
                <button class="hidden" id="register"> Admin </button>
            </div>
        </div>
    </div>
</div>
    <script src="script.js"></script>
</body>
</html>

<?php
include("connection.php");
error_reporting(0);
session_start();
if(isset($_POST['User']))
{

    $User = $_POST['Usern'];
    $Pass = $_POST['Pass'];

    $sql = " SELECT * FROM `register` where Username='$User' or Email='$User' ";
    $data = mysqli_query($con, $sql);
    if($data)
    {
        if(mysqli_num_rows($data)==1)
        {
            $fetch = mysqli_fetch_assoc($data);
            if($fetch['Password'] == $_POST['Pass'])
            {   
                $_SESSION['user_name']=$User;
                echo"<script> alert('Login Succesfully..!'); </script>";
                header("refresh:0; url=http://localhost/project/User/User.php");
            }
            else
            {
                echo"<script> alert('Password Invalid..'); </script>";
                header("refresh:0; url=http://localhost/project/User/loginPage.php");
            }
            
        }
        else
        {
            echo"<script> alert('User Not Found..! '); </script>";
            header("refresh:0; url=http://localhost/project/User/loginPage.php");
        }
    }
    else
    {
        echo"<script> alert('Query Falied..'); </script>";
    }
}


if(isset($_POST['Admin']))
{

    $Name = $_POST['email'];
    $Pass = $_POST['Pass'];

    $sql = " SELECT * FROM `Admin` where Name = '$Name' ";
    $data = mysqli_query($con, $sql);
    if($data)
    {
        if(mysqli_num_rows($data)==1)
        {
            $fetch = mysqli_fetch_assoc($data);
            if($fetch['Password'] == $_POST['Pass'])
            {   
                $_SESSION['Admin_name']=$Admin;
                echo"<script> alert('Login Succesfully..!'); </script>";
                header("refresh:0; url=http://localhost/project/Admin/Admin.php");
            }
            else
            {
                echo"<script> alert('Password Invalid..'); </script>";
                header("refresh:0; url=http://localhost/project/User/loginPage.php");
            }
            
        }
        else
        {
            echo"<script> alert('User Not Found..! '); </script>";
            header("refresh:0; url=http://localhost/project/User/loginPage.php");
        }
    }
    else
    {
        echo"<script> alert('Query Falied..'); </script>";
    }
}