<?php
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'testphasedb1');
if(mysqli_connect_error())
{
    die("DB Connection Failed");
}

?>