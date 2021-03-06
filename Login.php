<?php
session_start();

if(isset($_COOKIE['login']))
{
    if($_COOKIE['login']=='true')
    {
        $_SESSION['login']=true;
    }
}
if(isset($_SESSION["login"]))
{
    header("location:Index.php");
    exit;
}
require 'Functions.php';

if(isset($_POST["login"]))
{
        $username=$_POST["username"];
        $password=$_POST["password"];

    $result=mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");

    if(mysqli_num_rows($result)===1)
    {
        $row=mysqli_fetch_assoc($result);
        $hash = password_hash($password,PASSWORD_DEFAULT);
        if(password_verify($password,$hash))
        {
            $_SESSION["login"]=true;

            if(isset($_POST['remember']))
            {
                setcookie('id',$row['id'],time()+60);
                setcookie('key',hash(sha256,$row['username']),time()+60);
            }

            header("Location:Index.php");
            exit;
        }
    }
    $error=true;
}
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOOTLOOP.ID</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<style>
    .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
</style>
<body>
<div class="container" action="" method="post">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"></h1>
            <div class="account-wall" action="" method="post">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                <form class="form-signin" action="" method="post">
                <input type="text" class="form-control" name="username" placeholder="username">
                <input type="password" class="form-control" name="password" placeholder="password">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" name="remember">Remember me
                </label>
                <a href="loginAdmin.php" class="pull-right need-help">Anda Admin?</a><span class="clearfix"></span>
                </form>
            </div>
            <a href="Register.php" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
</body>
</html>