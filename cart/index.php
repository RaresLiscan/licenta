<?php
require_once dirname(__DIR__) . "/db/ShoppingCart.php";
include(dirname(__DIR__) . "/db/Conectare.php");
session_start();


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fotografie';
// Încercați să vă conectați folosind informațiile de mai sus.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // Dacă există o eroare la conexiune, opriți scriptul și afișați eroarea.
    exit('Esec Conectare MySQL: ' . mysqli_connect_error());
}

//Dacă utilizatorul nu este conectat redirecționează la pagina de autentificare ...
if (!isset($_SESSION['loggedin'])) {
    header('Location: /licenta/login');
    exit;
}

// pt membrii inregistrati
$id_user = $_SESSION['id'];
$shoppingCart = new ShoppingCart();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {

                $serviceResult = $shoppingCart->getProductByCode($_GET["code"]);

                $cartResult = $shoppingCart->getCartItemByProduct($serviceResult[0]["id"], $id_user);

                if (!empty($cartResult)) {
                    // Modificare cantitate in cos
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                } else {
                    // Adaugare in tabelul cos
                    $shoppingCart->addToCart($serviceResult[0]["id"], $_POST["quantity"], $id_user);
                }
            }
            break;
        case "remove":
            // Sterg o sg inregistrare
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            // Sterg cosul
            $shoppingCart->emptyCart($id_user);
            break;
        case "update":
            $shoppingCart->updateCartQuantity($_POST["quantity"], $_GET["id"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <script>
        window.history.replaceState({}, document.title, "/licenta/cart/");
    </script>


    <!--menu bar-->
    <nav>
        <div class="logo">
            <img src="../poze/icon.png" />
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
    <script src="./cartSubmit.js"></script>


    <!--cos-->
    <main class="containercos">
        <div class="item-flex">

            <section class="cart">
                <div class="cart-item-box">
                    <h2 class="section-heading">Order Summary</h2>
                    <div class="product-cart">
                        <div class="cart">
                            <?php
                            $cartItem = $shoppingCart->getMemberCartItem($id_user);
                            if (!empty($cartItem)) {
                                $item_total = 0;
                            ?>



                                <?php
                                foreach ($cartItem as $item) {
                                    $item_total += ($item["price"] * $item["quantity"]);
                                ?>
                                    <div class=" img-box">
                                        <img src="../<?php echo $item["photo0"]; ?>" alt="Portrait photography" style="width:80px" class="product-img" />
                                    </div>
                                    <div class="detail">
                                        <h4 class="product-name"><strong>NAME: <?php echo $item["servicename"]; ?><strong></h4>
                                        <div class="wrappercos">
                                            <div><a href="./index.php?action=remove&id=<?php echo $item["cart_id"]; ?>" class="btnRemoveAction"><img class="trash" src="../poze/icon-delete.png" alt="icon-delete" title="Remove Item" style="width:25px; height:25px;" /></a>

                                                <div class="product-name">
                                                    <strong>QUANTITY: <?php echo $item["quantity"]; ?> <br>
                                                </div>
                                                <div class="product-name">
                                                    <strong>PRICE: <?php echo $item["price"]; ?>
                                                </div>
                                                <div class="product-reservation">
                                                    <form id="cart-<?php echo $item['cart_id']; ?>" action="../reservation/index.php" method="post" style="display: none">
                                                        <input type="text" style="display: none" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                                        <input type="submit" style="display: none;">
                                                    </form>
                                                    <div>
                                                        <div onclick="handleCartSubmit(<?php echo $item['cart_id']; ?>)" class="rezerv">
                                                            <p name="rezerv" style="color:black;">Make a reservation
                                                            <p>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                <?php } ?>
                                <?php

                                echo "TOTAL: $" . $item_total;
                                ?>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div><a href="/licenta/services" style="color:black;">Alegeti alt produs</a></div>
                <div><a href="../logout.php" style="color:black;">Abandonati sesiunea de cumparare</a></div>
                <div class="wrappercos">
                    <form action="" method="post">
                        <div class="discount-token">
                            <label for="discount-token" class="label-default">Gift card/Discount code</label>
                            <div class="wrapper-flex">
                                <input type="text" name="discount-token" id="discount-token" class="input-default" />
                                <button type="submit" name="apply" class="btn-primary btn-outline">Apply</button>
                                <?php
                                if (isset($_POST['apply'])) {

                                    $discount = $_POST['discount-token'];
                                    $get_pro = "SELECT codename, amount FROM discount WHERE codename LIKE '%$discount'";
                                    $run_pro = mysqli_query($conn, $get_pro);
                                    if ($r = mysqli_fetch_assoc($run_pro)) {
                                        echo 'exista acest cod ' . $discount;
                                        echo '<br>';
                                        echo 'You will get' . $r['amount'] * 100 . '% off';
                                    } else {
                                        echo 'nu exista acest cod';
                                        $r['amount'] = 0;
                                    }
                                    echo '<br>'; ?>

                                    <div class="total">
                                    <?php echo 'Total cu discount: ';
                                    echo $item_total - ($r['amount'] * $item_total);
                                    echo 'LEI';
                                }
                                    ?>
                                    <div class="total">
                                        <td colspan="3" text-align=right><strong>Total without discount: $<?php echo  $item_total . "<br>"; ?></strong></td>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
</body>

</html>