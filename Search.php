
<?php

//conect database 
$con= new mysqli("localhost","root","","bankblood");

//check conect database 
if($con->connect_error){
    die ("faild to connect : " .$con->connect_error);
}

?>

<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT `donor`.`fname`, `donor`.`phone`, `donor`.`gender`, `city`.`name_city`, `blood`.`name_blood`
    FROM `donor` 
        LEFT JOIN `city` ON `donor`.`city_id` = `city`.`id` 
        LEFT JOIN `blood` ON `donor`.`blood_id` = `blood`.`id`
    WHERE `blood`.`name_blood` LIKE '%$valueToSearch%' or name_city like '$valueToSearch' or gender like '$valueToSearch' ;";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT `donor`.`fname`, `donor`.`phone`, `donor`.`gender`, `city`.`name_city`, `blood`.`name_blood`
    FROM `donor` 
        LEFT JOIN `city` ON `donor`.`city_id` = `city`.`id` 
        LEFT JOIN `blood` ON `donor`.`blood_id` = `blood`.`id`";
    $search_result = filterTable($query);
    
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "bankblood");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href=".//css/style.css" /> -->
    <link rel="stylesheet" href=".//css/styledonor.css" />
    <link rel="icon" type="image/x-icon" href=".//image/logo.png" />
    <link rel="stylesheet" href=".//css/normalize.css" />
    <link rel="stylesheet" href=".//css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>بحث عن متبرع</title>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
  form .text  {
  text-align: center;
  width: 50%;
  display: block;
  margin: 10px auto;
  color:white;
  padding: 5px;
  border-radius: 4px;
  background-color: darkred;
  position: relative;
  box-shadow: 0px 0px 10px 0px black;

}
form .text::after {
  content: "";
  top: -32px;
  right: 25px;
  width: 5px;
  height: 35px;
  background-color: gray;
  position: absolute;
  border-radius: 25px;
  box-shadow: 0px 0px 3px 1px black;
}
form .text::before {
  content: "";
  top: -32px;
  left: 25px;
  width: 5px;
  height: 35px;
  background-color: grey;
  position: absolute;
  border-radius: 25px;
  box-shadow: 0px 0px 3px 1px black;
}
form .text h3 {
  background-color: #700;
  padding: 15px;
  border-radius: 15px;
  color: white;
  text-shadow: 0px 0px 5px 1px white;
  box-shadow: 0px 0px 5px 0px black;

}
table {
    border:1px solid black;
    margin:50px auto;
    width:500px;
    border-collapse: collapse;
    width: 100%;
    position: relative;
    z-index: 200;
    text-align:center;
    box-shadow:0 0 4px 0 black;
    border-radius:10px;
}
th {
    border:1px solid black;
    padding:8px;
    width: 30px;
    padding:15px;
}
            tr,th,td
            {
                width: 100%;
                margin: 0 auto;
                padding:15px;
                border: 1px double white ;
                background-color:darkred;
                color:white;
                border-collapse: collapse;
                
               
            }
            .search {
                width:50%;
                height: 40px;
                position: relative;
                left: -25%;
                background-color:transparent;
            }
            .search::placeholder {
                font-size:15px;
            }
        </style>
    </head>
    <body dir="rtl">
    <header>
      <div class="contanier">
        <div class="logo"><img src="./image/logo.png" alt="" /></div>
        <nav>
          <div class="bar"><i class="fas fa-bars"></i></div>
          <ul>
            <li>
              <i class="fas fa-home"></i
              ><a href="index.html">الصفحة الرئيسية</a>
            </li>
            <li>
              <i class="fas fa-user"></i>
              <a href=".//login.html">تسجيل الدخول</a>
            </li>
            <li><i class="fas fa-bell"></i><a href="info.html">فوائد التبرع</a></li>
            <li>
              <i class="fas fa-info-circle"></i
              ><a href="blood.html">نبذة عن الموقع</a>
            </li>
            <li>
              <i class="fas fa-graduation-cap"></i
              ><a href="./about.html">من نحن</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <section>
        <form  method="post">
        <div class="text">
                    <h3>البحث عن المتبرعين</h3>
                </div>
            <input class="search" type="text" name="valueToSearch" placeholder="البحث بالفصيلة اوالمحافظة"><br><br>
            <button type="submit" name="search" value="Filter">البحث الان<i class="fas fa-search"></i></button><br><br>
            
            <table>
                <tr>
                    <th>اسم المتبرع</th>
                    <th>رقم الهاتف</th>
                    <th>النوع</th>
                    <th>المحافظة</th>
                    <th>الفصيلة</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['name_city'];?></td>
                    <td><?php echo $row['name_blood'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        </section>
        <footer>
      <p>&copy;حقوق الملكية محفوظة "معهد الجيزة العالي للعلوم الادارية -شعبة نظم معلومات 2022"</p>
      <div class="icon">
        <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/a7medkhaled2021"
          ><i class="fab fa-twitter"></i
        ></a>
        <a href="www.youtube.com"><i class="fab fa-youtube"></i></a>
      </div>
    </footer>
    </body>
</html>