<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name =$_POST['fname'];
$phone =$_POST['phone'];
$age =$_POST['age'];
$gender =$_POST['gender'];
$blood =$_POST['name_blood'];
$city =$_POST['name_city'];


//conect database 
$con = new mysqli("localhost","root","","bankblood");

//check conect database 
if($con->connect_error){
    die ("faild to connect : " .$con->connect_error);
}

$qry="INSERT INTO `donor` ( `fname`, `phone`, `age`, `gender`,`blood_id`,`city_id`) VALUES ( '$name', '$phone','$age', '$gender','$blood','$city')";
$ins=mysqli_query($con,$qry);
// $qry2="INSERT INTO `blood` ( `name_blood`) VALUES ('$blood')";
// $ins2=mysqli_query($con,$qry2);
// $qry3="INSERT INTO `city` (`name_city`) VALUES ('$city')";
// $ins3=mysqli_query($con,$qry3);
// echo $ins;

if (!$ins) {
    echo mysqli_error($con);
    echo "<h2 style=' color:red;display:flex ;justify-content:center; margin-top:250px' >هناك مشكلة </h2>";
    echo '<a href="Date-donor.html" style="display:flex ;justify-content:center;font-size:45px; text-decoration:none;">حاول مرة اخري</a>';
} 
else {
    echo "<body style='background-color:gray;'></body>";
    echo "<h1 style='color:white; display:flex ;justify-content:center; margin-top:250px'>تم ادخال البيانات بنجاح  </h1>";
    echo "<h1 style='color:white; display:flex ;justify-content:center; margin-top:200px'>شكرا لتبرعك </h1>";
    echo '<a href="index.html" style="display:flex ;justify-content:center;font-size:40px; text-decoration:none;">الصفحة الرئيسية للموقع</a>';
}

exit;
} else {
    echo "Error : You Cant Brwose This Page Directly";
}
?>