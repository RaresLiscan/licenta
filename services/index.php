<?php
session_start();
// informatii Conectare.
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
?>
<?php
require_once dirname(__DIR__) . "\db\ShoppingCart.php"; ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="../style.css" />

</head>

<body>
    <!--menu bar-->
    <nav>
        <div class="logo">
            <img src="../poze/icon.png" />
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="../poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="/licenta/login"><?php echo isset($_SESSION['loggedin']) ? "Logout" : "Login"; ?></a></li>
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

    <!--servicii-->
    <section class="servicii">
        <div class="containerservices">
            <div class="service" style=' display: flex;
            flex-wrap: wrap; justify-content:center;
            align-items: center;'>
                <?php
                $shoppingCart = new ShoppingCart();
                $query = "SELECT * FROM services";
                $product_array = $shoppingCart->getAllProduct($query);
                $resultset = mysqli_query($conn, $query) or die("database error: " . mysqli_error($conn));
                if (!empty($product_array)) {
                    foreach ($product_array as $key => $value) {
                ?>
                        <div class="service-card">
                            <h2 class="name"><?php echo $product_array[$key]["servicename"]; ?></h2>
                            <span class="price"><?php echo $product_array[$key]["price"]; ?></span>
                            <a class="popup-btn">Quick view</a>
                            <img class="service-img" src="../<?php echo $product_array[$key]["photo0"]; ?>" style="width:100%" />
                        </div>
                        <div class="popup-view">
                            <div class="popup-card">
                                <a><i class="fas fa-times close-btn"></i></a>
                                <div class="slideshow-container">
                                    <div class="mySlides fade" data-group="<?php echo $key; ?>">
                                        <div class="numbertext">1 / 3 </div>
                                        <img class="imgpopup" src="../<?php echo $product_array[$key]["photo1"]; ?>" style="width:100%" />
                                    </div>
                                    <div class="mySlides fade" data-group="<?php echo $key; ?>">
                                        <div class="numbertext">2 / 3 </div>
                                        <img class="imgpopup" src="../<?php echo $product_array[$key]["photo2"]; ?>" style="width:100%" />
                                    </div>
                                    <div class="mySlides fade" data-group="<?php echo $key; ?>">
                                        <div class="numbertext">3 / 3 </div>
                                        <img class="imgpopup" src="../<?php echo $product_array[$key]["photo3"]; ?>" style="width:100%" />
                                    </div>

                                    <a class="prev" onclick="showSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="showSlides(1)">&#10095;</a>
                                </div>
                                <div class="infoservice">
                                    <form method="post" action="../cart/index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                                        <h2 name="servicename"><?php echo $product_array[$key]["servicename"]; ?><br /></h2>
                                        <p name="description"><?php echo $product_array[$key]["description"]; ?></p>
                                        <p name="phnumber">Number of photos: <span><?php echo $product_array[$key]["phnumber"]; ?></span></p>
                                        <p name="time">Shooting time:
                                            <span>
                                                <?php
                                                if (isset($product_array[$key]["timeph"]))
                                                    echo (intdiv($product_array[$key]["timeph"], 60) != 0 ? (intdiv($product_array[$key]["timeph"], 60)) . "h " : "") .
                                                        (($product_array[$key]["timeph"] % 60 != 0) ? ($product_array[$key]["timeph"] % 60) . "m" : "");
                                                ?>
                                            </span>
                                        </p>
                                        <p name="clothing">Number of clothing pieces: <span><?php echo $product_array[$key]["clothing"]; ?></span></p>
                                        <p class="price">Price: $<?php echo $product_array[$key]["price"]; ?></p>
                                        <input type="number" name="quantity" value="1" size="2" min="1" max="5" step="1" />
                                        <input type="submit" value="Add to cart" class="btnAddAction" />
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>
        </div>

        <script type="text/javascript">
            var popupViews = document.querySelectorAll('.popup-view');
            var popupBtns = document.querySelectorAll('.popup-btn');
            var closeBtns = document.querySelectorAll('.close-btn');

            var popup = function(popupClick) {
                popupViews[popupClick].classList.add('active');
                setActivePopup(popupClick);
            }

            popupBtns.forEach((popupBtn, i) => {
                popupBtn.addEventListener("click", () => {
                    popup(i);
                });
            });

            //close btn
            closeBtns.forEach((closeBtn) => {
                closeBtn.addEventListener("click", () => {
                    popupViews.forEach((popupView) => {
                        popupView.classList.remove('active');
                    });
                });
            });
        </script>
    </section>
    <script src="./slider.js"></script>
</body>

</html>