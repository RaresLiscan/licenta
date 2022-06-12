<?php

session_start();

$base_path = explode("admin", dirname(__DIR__))[0];
include($base_path . "db\Conectare.php");

// se preia id din pagina vizualizare
$error = '';
if (!empty($_POST['id'])) {
    if (isset($_POST['submit'])) { // verificam daca id-ul din URL este unul valid
        if (is_numeric($_POST['id'])) { // preluam variabilele din URL/form
            $id = $_POST['id'];
            $servicename = htmlentities($_POST['servicename'], ENT_QUOTES);
            $description = htmlentities($_POST['description'], ENT_QUOTES);
            $phnumber = htmlentities($_POST['phnumber'], ENT_QUOTES);
            $timeph = htmlentities($_POST['timeph'], ENT_QUOTES);
            $clothing = htmlentities($_POST['clothing'], ENT_QUOTES);
            $price = htmlentities($_POST['price'], ENT_QUOTES);
            $photo1 = htmlentities($_POST['photo1'], ENT_QUOTES);
            $photo2 = htmlentities($_POST['photo2'], ENT_QUOTES);
            $photo3 = htmlentities($_POST['photo3'], ENT_QUOTES);

            if ($servicename == '' || $description == '' || $phnumber == '' || $timeph == '' || $clothing == '' || $price == '' || $photo1 == '' || $photo2 == '' || $photo3 == '') {
                echo "<div> ERROR: Completati campurile obligatorii!</div>";
            } else {
                if ($stmt = $mysqli->prepare("UPDATE services SET servicename=?,description=?,phnumber=?,timeph=?,clothing=?, price=?, photo1=?, photo2=?, photo3=? WHERE id='" . $id . "'")) {
                    $stmt->bind_param("ssdsddsss", $servicename, $description, $phnumber, $timeph, $clothing, $price, $photo1, $photo2, $photo3);
                    $stmt->execute();
                    $stmt->close();

                    header("Location: /licenta/admin");
                } else {
                    echo "ERROR: nu se poate executa update.";
                }
            }
        }
        // daca variabila 'id' nu este valida, afisam mesaj de eroare
        else {
            echo "id incorect!";
        }
    }
} ?>
<html>

<head>
    <title> <?php if ($_GET['id'] != '') {
                echo "Modificare inregistrare";
            } ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
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
    <!--modificare-->
    <h1 class="h1inserare"><?php if ($_GET['id'] != '') {
                                echo "Modificare Inregistrare";
                            } ?></h1>
    <div class="bodymodificare">
        <?php if ($error != '') {
            echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
        } ?>
        <div class="containerinserare">
            <form action="" method="post">
                <?php if ($_GET['id'] != '') { ?>
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                    <p>ID: <?php echo $_GET['id'];
                            if ($result = $mysqli->query("SELECT * FROM services where id='" . $_GET['id'] . "'")) {
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_object(); ?></p>
                    <div class="details">
                        <div class="forinput"><span class="forname">Nume Serviciu: </span> <input type="text" name="servicename" value="<?php echo $row->servicename; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Descriere: </span> <input type="text" name="description" value="<?php echo $row->description; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Numar fotografii: </span> <input type="text" name="phnumber" value="<?php echo $row->phnumber; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Timp: </span> <input type="text" name="timeph" value="<?php echo $row->timeph; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Numar tinute: </span> <input type="text" name="clothing" value="<?php echo $row->clothing; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Pret: </span> <input type="text" name="price" value="<?php echo $row->price; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Poza0: </span> <input type="text" name="photo0" value="<?php echo $row->photo0; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Poza1: </span> <input type="text" name="photo1" value="<?php echo $row->photo1; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Poza2: </span> <input type="text" name="photo2" value="<?php echo $row->photo2; ?>" /><br /></div>
                        <div class="forinput"><span class="forname">Poza3: </span> <input type="text" name="photo3" value="<?php echo $row->photo3;
                                                                                                                        }
                                                                                                                    }
                                                                                                                } ?>" /><br /></div>
                    </div>
                    <br />
                    <div class="butoninserare"><input type="submit" name="submit" value="Submit" /></div>
                    <a class='adminhref' href="../index.php">Index</a>
                    <br><a class='adminhref' href="../../logout.php">Iesire</a>
            </form>
        </div>
    </div>
</body>

</html>