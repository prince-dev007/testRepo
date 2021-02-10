<?php ob_start();?>
<?php include 'header.php';?>
<?php include_once 'dbconnection/dbConnection.php';?>
<link href="cart/css/cart.css" rel="stylesheet" type="text/css">
<?php include_once 'cart/Cart.php';
$db  = new db_connect();
?>
<main class="main-wrapper">
    <div class="banner-cart-image-wrap"></div>
    <div class="wrapper"><div class="bread-crumb"><a href="index.php"> Home </a> <i class="fas fa-angle-right"></i>Cart</div>
    </div>
    <div class="card-wrapper section-sapce col-md-12 bg-white">
        <div class="row justify-content-md-center">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Your cart</span></h4>
                <?php
              //  session_destroy();
                if(isset( $_SESSION['cart'])) {
                    $cartTemp = unserialize($_SESSION['cart']);
                }else{
                    header('Location:shopping.php');
                }
                ?>
                <ul class="list-group mb-3">
                    <?php
                    $shippingCost = 0;
                    $totalPrice = 0;
                    foreach ($cartTemp as $item) {
//                            $shippingCost = $shippingCost + $item->getShippingCost();
                        $totalPrice   = $totalPrice + ( $item->getPrice() * $item->getQty()) ;
                        $shippingCost =  $cartTemp[0]->getShippingCost();
                ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="your-cart-left-side">
                                <small class="text-muted"><?php echo $item->getProductName();?></small>
                            </span>
                            <span class="your-cart-center text-center">$<?php echo $item->getPrice();?>x<?php echo $item->getQty();?></span>
                            <span class="your-cart-right text-muted text-right">$<?php echo ($item->getPrice() * $item->getQty());?></span>
                        </li>
                        </li>
                    <?php } ?>
                    <?php
                    $action = $_SESSION['action'];
                    ?>
                    <?php if($action == 'payment' ){ ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Shipping Cost </span>
                        <strong>$<?php echo $shippingCost;?></strong>
                    </li>
                    <?php } ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>$<?php echo $totalPrice + $shippingCost ?> </strong>
                    </li>
                </ul>
            </div>
            <?php
                $action = $_SESSION['action'];
            ?>
               <div class="col-md-7 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                <?php if($action != 'payment' ){ ?>
                    <form class="needs-validation" method="post" action="cart/CartController.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control"   tabindex="1" id="firstName" name="firstname" placeholder="Enter firstname"  required="required">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control"   tabindex="2" id="lastName" name="lastname" placeholder="Enter lastname"  required="required">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Phone</label>
                            <input type="text" class="form-control"  tabindex="3"   id="phone" name="phone" placeholder="Enter your valid phone number."  required="required">
                            <div class="invalid-feedback">
                                Please enter a valid phone number.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"    tabindex="4"  id="email" name="email" placeholder="Enter your validate email id."  required="required">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea  class="form-control" id="address"  tabindex="5"  name="address" placeholder="Enter your shipping address." required="required"></textarea>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100"  tabindex="6"  id="state" name="state" required="required">
                                    <option value="">Choose...</option>
                                    <?= $db->getState()?>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="country">City</label>
                                <select class="custom-select d-block w-100"  tabindex="7"  id="city" name="city" required="">
                                    <option value='-1'>Choose City</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text"   onkeypress="return [45, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(event.charCode);" class="form-control" id="zip"  tabindex="8"  maxlength="5" name="zip" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <button class="btn btn-danger text-uppercase"  tabindex="9"  style="width:100%;" name="action" value="checkout"><i class="fas fa-cart-plus"></i> Checkout</button><!-- button-primary-->
                            </div>
                        </div>
                    </form>
                <?php }else{
                    echo $cartTemp[0]->getFirstName()." ".  $cartTemp[0]->getLastName()."<br>";
                    echo $cartTemp[0]->getPhone()."<br>";
                    echo $cartTemp[0]->getEmail()."<br>";
                    echo $cartTemp[0]->getAddress()."<br>";
                    echo $cartTemp[0]->getCity().",".$cartTemp[0]->getState()."-".$cartTemp[0]->getZip();
                    ?>
                   <form class="needs-validation" method="post" action="cart/CartController.php">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <button class="btn btn-danger text-uppercase"  tabindex="9"  style="width:100%;" name="action" value="payment"><i class="fas fa-cart-plus"></i> Payment</button><!-- button-primary-->
                            </div>
                        </div>
                   </form>

               <?php }
                ?>

                </div>
            </div> <!-- card.// -->
        </div>
    </div>
</main>
<?php include 'footer.php';?>
<script defer src="cart/cart.js"></script>