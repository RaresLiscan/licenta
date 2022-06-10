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
include("Conectare.php");
$error = '';
if (isset($_POST['submit'])) {
    // preluam datele de pe formular
    $servicename = htmlentities($_POST['servicename'], ENT_QUOTES);
    $description = htmlentities($_POST['description'], ENT_QUOTES);
    $phnumber = htmlentities($_POST['phnumber'], ENT_QUOTES);
    $timeph = htmlentities($_POST['timeph'], ENT_QUOTES);
    $clothing = htmlentities($_POST['clothing'], ENT_QUOTES);
    $price = htmlentities($_POST['price'], ENT_QUOTES);
    $photo0 = htmlentities($_POST['photo0'], ENT_QUOTES);
    $photo1 = htmlentities($_POST['photo1'], ENT_QUOTES);
    $photo2 = htmlentities($_POST['photo2'], ENT_QUOTES);
    $photo3 = htmlentities($_POST['photo3'], ENT_QUOTES);
    // verificam daca sunt completate
    if ($servicename == '' || $description == '' || $phnumber == '' || $timeph == '' || $clothing == '' || $price == '' || $photo0 == '' || $photo1 == '' || $photo2 == '' || $photo3 == '') {

        $error = 'ERROR: Campuri goale!';
    } else {

        if ($stmt = $mysqli->prepare("INSERT into services (servicename, description, phnumber, timeph, clothing, price, photo0, photo1, photo2, photo3) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?)")) {
            $stmt->bind_param("ssdsddssss", $servicename, $description, $phnumber, $timeph, $clothing, $price, $photo0, $photo1, $photo2, $photo3);
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
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!--menu bar-->
    <nav>
        <div class="logo">
            <img src="poze/icon.png" />
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="Login.html">Login</a></li>
            <li><img class="icon2" src="poze\home.png" alt="home icon" style="width:25px; height:25px;" /><a href="Licenta.html">Home</a></li>
            <li><img class="icon2" src="poze\about.png" alt="about us icon" style="width:25px; height:25px;" /><a href="AboutUs.php">About us</a></li>
            <li><img class="icon2" src="poze\camera.png" alt="services icon" style="width:25px; height:25px;" /><a href="Services.php">Services</a>
            <li><img class="icon2" src="poze\feedback.png" alt="feedback icon" style="width:25px; height:25px;" /><a href="Feedback.php">Feedback</a></li>
            <li><img class="icon2" src="poze\contact.png" alt="contact icon" style="width:25px; height:25px;" /><a href="Contact.php">Contact</a></li>
            <li><img class="icon2" src="poze\cart.png" alt="cart icon" style="width:25px; height:25px;" /><a href="Cos.html">Cosul meu</a></li>
        </ul>
        <div class="burger">
            <!--aici se afla cele 3 liniute care apar pe marginea din dreapta la varianta mobile-->
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="navigation.js"></script>
    <!--inserare-->
    <h1 class="h1inserare"><?php echo "Inserare inregistrare"; ?></h1>
    <div class="bodyinserare">
        <?php if ($error != '') {
            echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
        } ?>
        <div class="containerinserare">
            <form action="" method="post">
                <div class="details">
                    <div class="forinput"><span class="forname">Nume Serviciu: </span> <input type="text" name="servicename" value="" placeholder="Enter the name" required /><br /></div>
                    <div class="forinput"><span class="forname">Descriere: </span> <input type="text" name="description" value="" placeholder="Enter the description" required /><br /></div>
                    <div class="forinput"><span class="forname">Numar fotografii: </span> <input type="text" name="phnumber" value="" placeholder="Enter the number of photos" required /><br /></div>
                    <div class="forinput"><span class="forname">Timp: </span> <input type="text" name="timeph" value="" placeholder="Enter the shooting time" required /><br /></div>
                    <div class="forinput"><span class="forname">Numar tinute: </span> <input type="text" name="clothing" value="" placeholder="Enter the number of clothing items" required /><br /></div>
                    <div class="forinput"><span class="forname">Pret: </span> <input type="text" name="price" value="" placeholder="Enter the price" required /><br /></div>
                    <div class="forinput"><span class="forname">Poza0: </span> <input type="text" name="photo0" value="" placeholder="Enter the main photo" required /><br /></div>
                    <div class="forinput"><span class="forname">Poza1: </span> <input type="text" name="photo1" value="" placeholder="Enter photo number 1" required /><br /></div>
                    <div class="forinput"><span class="forname">Poza2: </span> <input type="text" name="photo2" value="" placeholder="Enter photo number 2" required /><br /></div>
                    <div class="forinput"><span class="forname">Poza3: </span> <input type="text" name="photo3" value="" placeholder="Enter photo number 3" required /><br /></div>
                </div>
                <br />
                <div class="butoninserare"><input type="submit" name="submit" value="Submit" /></div>
                <a class='adminhref' href="Admin.php">Index</a>
            </form>
        </div>
    </div>
</body>

</html>