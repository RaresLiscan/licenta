<?php
require_once "ShoppingCart.php";
include("Conectare.php");
session_start();


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

//Dacă utilizatorul nu este conectat redirecționează la pagina de autentificare ...
if (!isset($_SESSION['loggedin'])) {
header('Location: Login.html');
exit;
}

// pt membrii inregistrati
$id_user=$_SESSION['id'];
$shoppingCart = new ShoppingCart();
if (! empty($_GET["action"])) {
 switch ($_GET["action"]) {
 case "add":
 if (! empty($_POST["quantity"])) {
 
 $serviceResult = $shoppingCart->getProductByCode($_GET["code"]);
 
 $cartResult = $shoppingCart->getCartItemByProduct($serviceResult[0]["id"], $id_user);
 
 if (! empty($cartResult)) {
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

<HTML>
<HEAD>
<TITLE>creare cos permament in PHP</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY> <!--menu bar-->
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

    <!--cos-->
	<main class="containercos">
	<div class="item-flex">
 
<section class="cart">
<div class="cart-item-box">
    <h2 class="section-heading">Order Summery</h2>
    <div class="product-cart">
        <div class="cart">
	        <?php
		        $cartItem = $shoppingCart->getMemberCartItem($id_user);
		            if (! empty($cartItem)) {
			            $item_total = 0;
	        ?>
    
	<table cellpadding="10" cellspacing="1">
	<tbody>
	
    
	<?php
		foreach ($cartItem as $item) {
	?>
    <div class="img-box">
                                <img src="<?php echo $item["photo0"]; ?>" alt="Portrait photography" style="width:80px" class="product-img" />
                            </div>
                            <div class="detail">
                                <h4 class="product-name"><strong>NAME: <?php echo $item["servicename"]; ?><strong></h4>
                                <div class="wrappercos">
                                    <div class="product-name">
                                        <strong>QUANTITY: <?php echo $item["quantity"]; ?> <br>
                                    </div>
                                    <div class="product-name">
                                         <strong>PRICE: <?php echo $item["price"]; ?>
                                    </div>
                                    <div class="product-reservation">
                                    <form action="#" method="post">
                                       <div><a href="reservation.php" name="rezerv" style="color:black;">Make a reservation<a></div>
                                       <!--input type="submit" name="submit" value="Send" />-->
                                       
                                        </form>
                                    </div>
                                </div>
                                <div ><a href="Cos.php?action=remove&id=<?php echo $item["cart_id"]; ?>" class="btnRemoveAction"><img class="icon2" src="icon-delete.png" alt="icon-delete" title="Remove Item" style="width:25px; height:25px;" /></a></div>
                            </div>



	    <?php
            $item_total += ($item["price"] * $item["quantity"]);
            echo  $item_total;
        }
         ?>
    <tr>
    <!--<td colspan="3" text-align=right><strong>Total:</strong></td>
    <td text-align=right>//echo "RON ".$item_total; ?></td>-->
    <td></td>
    </tr>
    </tbody>
    </table>
     <?php
	    }
      ?>
 </div>
 </div>
 </div>
 <div><a href="Services.php" style="color:black;">Alegeti alt produs</a></div>
<div><a href="logout.php" style="color:black;">Abandonati sesiunea de cumparare</a></div>
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
                                            if ($r = mysqli_fetch_assoc($run_pro)){
                                                echo 'exista acest cod ' . $discount;
                                                echo '<br>';
                                                echo 'You will get' .$r['amount'] *100 .'% off';
                                            }     
                                            else {
                                                echo 'nu exista acest cod';  
                                                $r['amount']=0;
                                            }
                                                     echo '<br>';?>
                                                     
<div class="total">
                          <?php echo 'Total cu discount: ';
                              echo $item_total - ( $r['amount']*$item_total ) ;
                              echo 'LEI';
                                        }
                                ?>
                                <div class="total">
                            <td colspan="3" text-align=right><strong>Total fara discount: <?php echo  $item_total . " LEI" . "<br>" ;?></strong></td>   
                        </div>
                                </div>
                        </div>
                    </div>
 </form>
                    <!-- <div class="amount">
                        <div class="total">
                            <td colspan="3" text-align=right><strong>Total fara discount: <?php //echo  $item_total . " LEI" . "<br>" ;?></strong></td>   
                        </div>
                    </div>-->
</div>
</div>
</div>
 </main>
</BODY>
</HTML>


<!-- if (isset($_POST['discount_token'])) {
                              echo 'Total cu discount: ';
                              echo $item_total - ( $r['amount']*$item_total );
                              echo 'LEI';} ?>
-->