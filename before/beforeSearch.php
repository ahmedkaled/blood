<?php
//conect database 
$con = new mysqli("localhost","root","","bankblood");

//check conect database 
if($con->connect_error){
    die ("faild to connect : " .$con->connect_error);
}

                $query = " SELECT * FROM `city` ";
                $result1= mysqli_query($con,$query);
                
                $query2 = " SELECT * FROM `blood` ";
                $result2 = mysqli_query($con,$query2);
                ?>

<!DOCTYPE html>
<html lang="ar">
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
      <div class="contanier">
        <form method="post" action="showdate.php">
          <div class="text">
            <h3>بحث عن متبرع</h3>
          </div>
          <div class="list">
            <label for="Governorate">المحافظة</label>
            <select id="citys"  name="city_id" >
                    <?php 
                        while ($row1 = mysqli_fetch_array($result1)):;
                        ?>
                        <option value="" hidden >-- اختر المحافظة --</option>
                        <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?>   </option>
                        <?php endwhile;?>
                        </select>
            <!-- <label for="family">الفصيلة</label> -->
            <label for="blood">فصيلة الدم</label>
                    <select id="blood" name="blood_id">
                    <?php 
                    while ($row2 = mysqli_fetch_array($result2)):;
                    ?>
                    <option value="" hidden>-- اختر الفصيلة --</option>
                    <option value="<?php echo $row2[0]; ?> "> <?php echo $row2[1]; ?>  </option>
                    <?php endwhile;?>

                        
                        </select>
          </div>
          <button type="submit">بحث<i class="fas fa-search"></i></button>
        </form>
      </div>
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
