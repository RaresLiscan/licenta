<?php
// We need to use sessions, so you should always start sessions using the below code.
//session_start();
// If the user is not logged in redirect to the login page...
//if (!isset($_SESSION['loggedin'])) {
//header('Location: Index.html');
//exit;
//}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>Vizualizare Inregistrari</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <!--menu bar-->
    <nav>
        <div class="logo">
            <h4>ZOOMIN</h4>
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="../poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="/licenta/login">Login</a></li>
            <li><img class="icon2" src="../poze\home.png" alt="home icon" style="width:25px; height:25px;" /><a href="/licenta/">Home</a></li>
            <li><img class="icon2" src="../poze\about.png" alt="about us icon" style="width:25px; height:25px;" /><a href="/licenta/about">About us</a></li>
            <li><img class="icon2" src="../poze\camera.png" alt="services icon" style="width:25px; height:25px;" /><a href="/licenta/services">Services</a>
            <li><img class="icon2" src="../poze\feedback.png" alt="feedback icon" style="width:25px; height:25px;" /><a href="/licenta/feedback">Feedback</a></li>
            <li><img class="icon2" src="../poze\contact.png" alt="contact icon" style="width:25px; height:25px;" /><a href="/licenta/contact">Contact</a></li>
            <li><img class="icon2" src="../poze\cart.png" alt="cart icon" style="width:25px; height:25px;" /><a href="/licenta/cart">Cosul meu</a></li>
        </ul>
        <div class="burger">
            <!--aici se afla cele 3 liniute care apar pe marginea din dreapta la varianta mobile-->
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="../navigation.js"></script>
    <h1 class="h1admin">Inregistrarile din tabela Services</h1>
    <?php

    include(dirname(__DIR__) . "/db/Conectare.php");
    // se preiau inregistrarile din baza de date
    if ($result = $mysqli->query("SELECT * FROM services ORDER BY id ")) { // Afisare inregistrari pe ecran
        if ($result->num_rows > 0) {
            // afisarea inregistrarilor intr-o table
            echo "<table class='admintable1' border='1' cellpadding='10'>";

            echo "<tr class='tableheader'><th>ID</th><th>Nume Serviciu</th><th>Descriere</th><th>Numar fotografii</th><th>Timp</th><th>Numar tinute</th><th>Pret</th><th>Poza0</th><th>Poza1</th><th>Poza2</th><th>Poza3</th><th></th><th></th></tr>";
            while ($row = $result->fetch_object()) {
                // definirea unei linii pt fiecare inregistrare
                echo "<tr>";
                echo "<td>" . $row->id . "</td>";
                echo "<td>" . $row->servicename . "</td>";
                echo "<td>" . $row->description . "</td>";
                echo "<td>" . $row->phnumber . "</td>";
                echo "<td>" . $row->timeph . "</td>";
                echo "<td>" . $row->clothing . "</td>";
                echo "<td>" . $row->price . "</td>";
                echo "<td>" . $row->photo0 . "</td>";
                echo "<td>" . $row->photo1 . "</td>";
                echo "<td>" . $row->photo2 . "</td>";
                echo "<td>" . $row->photo3 . "</td>";
                echo "<td><a class='adminhref' href='./edit-service?id=" . $row->id . "'>Modificare</a></td>";
                echo "<td><a class='adminhref' href='./delete-service?id=" . $row->id . "'>Stergere</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nu sunt inregistrari in tabela!";
        }
    } else {
        echo "Error: " . $mysqli->error();
    }
    ?>
    <a class="adminhref" href="./add-employee">Adaugarea unui nou produs</a>

    <!--AFISARE UTILIZATORI-->
    <h1 class="h1admin">Inregistrarile din tabela Users</h1>
    <?php
    if ($result = $mysqli->query("SELECT * FROM users ORDER BY id ")) { // Afisare inregistrari pe ecran
        if ($result->num_rows > 0) {
            // afisarea inregistrarilor intr-o table
            echo "<table class='admintable2' border='1' cellpadding='10'>";

            echo "<tr class='tableheader'><th>ID</th><th>Username</th><th>Email</th></tr>";
            while ($row = $result->fetch_object()) {
                // definirea unei linii pt fiecare inregistrare
                echo "<tr>";
                echo "<td>" . $row->id . "</td>";
                echo "<td>" . $row->username . "</td>";
                echo "<td>" . $row->email . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nu sunt inregistrari in tabela!";
        }
    } else {
        echo "Error: " . $mysqli->error();
    }
    ?>
    <!--AFISARE ANGAJATI-->
    <h1 class="h1admin">Inregistrarile din tabela Employees</h1>
    <?php
    if ($result = $mysqli->query("SELECT * FROM employees ORDER BY id")) { // Afisare inregistrari pe ecran
        if ($result->num_rows > 0) {
            // afisarea inregistrarilor intr-o table
            echo "<table class='admintable3' border='1' cellpadding='10'>";

            echo "<tr class='tableheader'><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Description</th><th>Photo</th><th></th><th></th></tr>";
            while ($row = $result->fetch_object()) {
                // definirea unei linii pt fiecare inregistrare
                echo "<tr>";
                echo "<td>" . $row->id . "</td>";
                echo "<td>" . $row->name . "</td>";
                echo "<td>" . $row->email . "</td>";
                echo "<td>" . $row->phone . "</td>";
                echo "<td>" . $row->description . "</td>";
                echo "<td>" . $row->photo . "</td>";
                echo "<td><a class='adminhref' href='./edit-employees?id=" . $row->id . "'>Modificare</a></td>";
                echo "<td><a class='adminhref' href='./delete-employees?id=" . $row->id . "'>Stergere</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nu sunt inregistrari in tabela!";
        }
    } else {
        echo "Error: " . $mysqli->error();
    }

    $mysqli->close();
    ?>
    <a class='adminhref' href="./add-employee">Adaugarea unui nou angajat</a>
    <br><a class='adminhref' href="logout.php">Iesire</a>
</body>

</html>