<?php 
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$date =$_POST['date'];
$pass =$_POST['pass'];
//conect database
$con = new mysqli("localhost","root","","mis");

//check conect database 
if ($con->connect_error) {
    die ("Connection Failed : " .$con->connect_error);
}

$qry ="INSERT INTO `login`(`firstname`, `lastname`, `email`, `phone`, `birthday`, `pass`) VALUES ('$firstname','$lastname','$email','$phone','$date','$pass')";
$insert = mysqli_query($con,$qry);
if (!$insert) {
    echo "<h2 style=' color:red;display:flex ;justify-content:center; margin-top:250px' >هناك مشكلة </h2>";
    echo "<p style='color:red;font-size:20px;display:flex ;justify-content:center;'>او هذا البريد الالكتروني موجود بالفعل</p>";
    echo '<a href="./Project/sign-up.html" style="display:flex ;justify-content:center;font-size:45px; text-decoration:none;">حاول مرة اخري</a>';
} 
else {
    echo "<body style='background-color:gray;'></body>";
    echo "<h1 style='color:white; display:flex ;justify-content:center; margin-top:250px'>تم انشاء الحساب بنجاح</h1>";
    echo "<a href='.//Project/login.html'style=' font-size:30px;display:flex ;justify-content:center;' >تسجيل الدخول الان</a>";
}
?>