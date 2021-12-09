<?php 
$email = $_POST['email'];
$password = $_POST['password'];

$con = new mysqli("ttps://ahmedkaled.github.io/mysql/","root","","mis");
if ($con->connect_error) {
    die("Faild to connect : ".$con->connect_error);
} else {
    $stmt = $con->prepare("select * from mis where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data ['password'] === $password){
            echo "<h1 style='text-align:center; color:blue; margin:300px 0; border:2px solid red;background-color:yellow'>تم تسجيل الدخول بنجاح </h1>";
            echo '<a href="index.html" style="font-size:35px;">صفحة التبرع</a>';
        } else {
            echo "<h2>  الا يميل غلط اوالباسورد خطأ </h2>";
        } 
    } else {
        echo "<h1> البريد الالكتروني ليس صحيح </h1>";
    }
}
?>

    




