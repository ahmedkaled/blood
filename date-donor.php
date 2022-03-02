<?php
$name = $_POST['name'];
$phone =$_POST['phone'];
$name_city =$_POST['name_city'];
$nsmeblood =$_POST['nameblood'];

//conect database 
$con = new mysqli("localhost","root","","bankblood");

//check conect database 
if($con->connect_error){
    die ("faild to connect : " .$con->connect_error);
}

$qry=
?>