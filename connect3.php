<?php

$con=mysqli_connect("localhost:3306","root","","login");
if (mysqli_connect_error())
{
    echo "can not connect";
}
if(isset($_POST['login']))
{
    $query="SELECT * FROM `adminlogin` WHERE `Admin_Name`='$_POST[Admin_Name]' AND `Admin_Password`='$_POST[Admin_Password]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION[`adminlogin`]=$_POST['Admin_Name'];

        header("location:adminpanel.php");
    }
    else
    {
        echo"<script>alert('Incorrect Password');</script>";
        header("location:login.html");

    }
}


?>