<?php
// We need to use sessions, so you should always start sessions using the below code.
//session_start();
// If the user is not logged in redirect to the login page...
//if (!isset($_SESSION['loggedin'])) {
//header('Location: Index.html');
//exit;
//}
?>
<?php
session_start();

$base_path = explode("admin", dirname(__DIR__))[0];
include($base_path . "db\Conectare.php");
$error = '';
if (isset($_POST['submit'])) {
    // preluam datele de pe formular
    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $phone = htmlentities($_POST['phone'], ENT_QUOTES);
    $description = htmlentities($_POST['description'], ENT_QUOTES);
    $photo = htmlentities($_POST['photo'], ENT_QUOTES);
    // verificam daca sunt completate
    if ($name == '' || $email == '' || $phone == '' || $description == '' || $photo == '') {

        $error = 'ERROR: Campuri goale!';
    } else {

        if ($stmt = $mysqli->prepare("INSERT into employees (name, email, phone, description, photo) VALUES (?, ?, ?, ?, ?)")) {
            $stmt->bind_param("sssss", $name, $email, $phone, $description, $photo);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "ERROR: Nu se poate executa insert.";
        }
    }
}

$mysqli->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title><?php echo "Inserare inregistrare"; ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../../style.css" />
</head>

<body>
    <!--menu bar-->
    <nav>
        <div class="logo">
            <h4>ZOOMIN</h4>
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="../../poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="/licenta/login"><?php echo isset($_SESSION['loggedin']) ? "Logout" : "Login"; ?></a></li>
            <li><img class="icon2" src="../../poze\home.png" alt="home icon" style="width:25px; height:25px;" /><a href="/licenta/">Home</a></li>
            <li><img class="icon2" src="../../poze\about.png" alt="about us icon" style="width:25px; height:25px;" /><a href="/licenta/about">About us</a></li>
            <li><img class="icon2" src="../../poze\camera.png" alt="services icon" style="width:25px; height:25px;" /><a href="/licenta/services">Services</a>
            <li><img class="icon2" src="../../poze\feedback.png" alt="feedback icon" style="width:25px; height:25px;" /><a href="/licenta/feedback">Feedback</a></li>
            <li><img class="icon2" src="../../poze\contact.png" alt="contact icon" style="width:25px; height:25px;" /><a href="/licenta/contact">Contact</a></li>
            <li><img class="icon2" src="../../poze\cart.png" alt="cart icon" style="width:25px; height:25px;" /><a href="/licenta/cart">Cosul meu</a></li>
        </ul>
        <div class="burger">
            <!--aici se afla cele 3 liniute care apar pe marginea din dreapta la varianta mobile-->
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="../../navigation.js"></script>
    <!--inserare-->
    <h1 class="h1inserare"><?php echo "Inserare inregistrare"; ?></h1>
    <div class="bodyangajati">
        <?php if ($error != '') {
            echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
        } ?>
        <div class="containerinserare">
            <form action="" method="post">
                <div class="details">
                    <div class="forinput"><span class="forname">Nume: </span> <input type="text" name="name" value="" placeholder="Enter the name" required /><br /></div>
                    <div class="forinput"><span class="forname">Email: </span> <input type="text" name="email" value="" placeholder="Enter the email" required /><br /></div>
                    <div class="forinput"><span class="forname">Numar telefon: </span> <input type="text" name="phone" value="" placeholder="Enter the phone number" required /><br /></div>
                    <div class="forinput"><span class="forname">Descriere: </span> <input type="text" name="description" value="" placeholder="Enter the description" required /><br /></div>
                    <div class="forinput"><span class="forname">Poza: </span> <input type="text" name="photo" value="" placeholder="Enter the photo" required /><br /></div>
                </div>
                <br />
                <div class="butoninserare"><input type="submit" name="submit" value="Submit" /></div>
                <a class='adminhref' href="../index.php">Index</a>
            </form>
        </div>
    </div>
</body>

</html>