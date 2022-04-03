<?php 
// $email = $_POST['email'];
$code= $_POST['code'];
//CONECT DATABASE 
$con = new mysqli("localhost","root","","bankblood");
//CHECK CONECT DATABASE 
if ($con->connect_error) {
    die("Faild to connect : ".$con->connect_error);

} 
    
       if(isset($_POST['code'])) {

        $getcode=$_POST['code'];
       }

       if($code === $getcode) {
         echo "good";
       } else {
           echo "falid";
       }
    
?>





