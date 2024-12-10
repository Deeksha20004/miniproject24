<?php

include('connect.php');

$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$newpassword = isset($_POST['newpassword']) ? trim($_POST['newpassword']) : null;
$conpassword = isset($_POST['conpassword']) ? trim($_POST['conpassword']) : null;

if ($newpassword==$conpassword){
    $sql="select psw from signup where email='$email';";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
}
if($count==1){
    $sqll="update signup set psw='$newpassword' pswrepeat='$newpassword' where email='$email';";
    header("location:login.html");
}


$con->close();

?>

