<?php
session_start();
// informatii Conectare.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fotografie';
// Încercați să vă conectați folosind informațiile de mai sus.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
// Dacă există o eroare la conexiune, opriți scriptul și afișați eroarea.
exit('Esec Conectare MySQL: ' . mysqli_connect_error());
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>About us</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
        <!--menu bar-->
    <nav>
        <div class="logo">
            <h4>ZOOMIN</h4>
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="Login.html">Login</a></li>
            <li><img class="icon2" src="poze\home.png" alt="home icon" style="width:25px; height:25px;" /><a href="Licenta.html">Home</a></li>
            <li><img class="icon2" src="poze\about.png" alt="about us icon" style="width:25px; height:25px;" /><a href="AboutUs.php">About us</a></li>
            <li><img class="icon2" src="poze\camera.png" alt="services icon" style="width:25px; height:25px;" /><a href="Services.php">Services</a>
            <li><img class="icon2" src="poze\feedback.png" alt="feedback icon" style="width:25px; height:25px;" /><a href="Feedback.php">Feedback</a></li>
            <li><img class="icon2" src="poze\contact.png" alt="contact icon" style="width:25px; height:25px;" /><a href="Contact.php">Contact</a></li>
            <li><img class="icon2" src="poze\cart.png" alt="cart icon" style="width:25px; height:25px;" /><a href="Cos.php">Cosul meu</a></li>
        </ul>
        <div class="burger">
            <!--aici se afla cele 3 liniute care apar pe marginea din dreapta la varianta mobile-->
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="navigation.js"></script>
    <!--about us-->
    <section class="section2">
        <div class="container">
            <h1 class="heading">Meet The Team</h1>
            <div class="card-wrapper">
            <?php
             $sql="SELECT * FROM employees";
             $resultset=mysqli_query($conn, $sql) or die ("database error: " . mysqli_error($conn));
             while($record= mysqli_fetch_assoc($resultset)){
             ?>
                <div class="card">
                    <img src="Poze\licenta1.jpg" alt="fundal about us" class="card-img" />
                    <img  class="profile-img" name="photo" src="<?php echo $record['photo'];?>"/>
                    <h1 name="name"><?php echo $record['name'];?></h1>
                    <p class="job-title">Fotograf</p>
                    <h2 class="despre" name="email">Email: <span><?php echo $record['email'];?></span></h2>
                    <h2 class="despre" name="phone">Phone: <span><?php echo $record['phone'];?></span></h2>
                    <p class="despre" name="description"><?php echo $record['description'];?></p>
                    <a href="#" class="buton">Slide poze</a>
                    <!--<ul class="social-media">
                        <li><a href="#"><img class="poza-social-media" src="contact.png" alt="contact icon" style="width:25px; height:25px;" /></a></li>
                        <li><a href="#"><img class="poza-social-media" src="contact.png" alt="contact icon" style="width:25px; height:25px;" /></a></li>
                        <li><a href="#"><img class="poza-social-media" src="contact.png" alt="contact icon" style="width:25px; height:25px;" /></a></li>
                    </ul>-->
                </div>
                 <?php }
                ?>
            </div>
        </div>
    </section>
</body>
</html>