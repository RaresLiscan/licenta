<?php
include("Conectare.php");

// se preia id din pagina vizualizare
$error = '';
if (!empty($_POST['id'])) {
    if (isset($_POST['submit'])) { // verificam daca id-ul din URL este unul valid
        if (is_numeric($_POST['id'])) { // preluam variabilele din URL/form
            $id = $_POST['id'];
            $name = htmlentities($_POST['name'], ENT_QUOTES);
            $email = htmlentities($_POST['email'], ENT_QUOTES);
            $phone = htmlentities($_POST['phone'], ENT_QUOTES);
            $description = htmlentities($_POST['description'], ENT_QUOTES);
            $photo = htmlentities($_POST['photo'], ENT_QUOTES);

            if ($name == '' || $email == '' || $phone == '' || $description == '' || $photo == '') {
                echo "<div> ERROR: Completati campurile obligatorii!</div>";
            } else {
                if ($stmt = $mysqli->prepare("UPDATE employees SET name=?,email=?,phone=?,description=?,photo=? WHERE id='" . $id . "'")) {
                    $stmt->bind_param("sssss", $name, $email, $phone, $description, $photo);
                    $stmt->execute();
                    $stmt->close();
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
</head>
<link rel="stylesheet" href="style.css" />

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
    <!--modificare-->
    <h1 class="h1inserare"><?php if ($_GET['id'] != '') {
                                echo "Modificare Inregistrare";
                            } ?></h1>
    <div class="bodyangajati">
        <?php if ($error != '') {
            echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
        } ?>
        <div class="containerinserare">
            <form action="" method="post">
                <div>
                    <?php if ($_GET['id'] != '') { ?>
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                        <p>ID: <?php echo $_GET['id'];
                                if ($result = $mysqli->query("SELECT * FROM employees where id='" . $_GET['id'] . "'")) {
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_object(); ?></p>
                        <div class="details">
                            <div class="forinput"><span class="forname">Nume: </span> <input type="text" name="name" value="<?php echo $row->name; ?>" /><br /></div>
                            <div class="forinput"><span class="forname">Email: </span> <input type="text" name="email" value="<?php echo $row->email; ?>" /><br /></div>
                            <div class="forinput"><span class="forname">Numar telefon: </span> <input type="text" name="phone" value="<?php echo $row->phone; ?>" /><br /></div>
                            <div class="forinput"><span class="forname">Descriere: </span> <input type="text" name="description" value="<?php echo $row->description; ?>" /><br /></div>
                            <div class="forinput"><span class="forname">Poza: </span> <input type="text" name="photo" value="<?php echo $row->photo;
                                                                                                                            }
                                                                                                                        }
                                                                                                                    } ?>" /><br /></div>
                        </div>
                        <br />
                        <div class="butoninserare"><input type="submit" name="submit" value="Submit" /></div>
                        <a hclass='adminhref' ref="Admin.php">Index</a>
                        <br><a class='adminhref' href="logout.php">Iesire</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>