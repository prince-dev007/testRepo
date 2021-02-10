<?php include 'header.php';?>
<?php include_once 'dbconnection/dbConnection.php'?>
<link href="cart/css/cart.css" rel="stylesheet" type="text/css"><link>
<main class="main-wrapper">
<div class="banner-image-wrap"></div>
<?php
        $db = new db_connect();
        $sql = "Select * from products  where id=".$_GET['id'];
        $product = $db->fetch($sql);
        for($i=0;$i<count($product);$i++){
    ?>
    <div class="wrapper">
        <div class="bread-crumb">
            <a href="index.php"> Home </a> <i class="fas fa-angle-right"></i>
            <a href="shopping.php"> Products </a> <i class="fas fa-angle-right"></i>
            <?php echo $product[$i]['name'];?>
        </div>
    </div>
<div class="card-wrapper section-sapce col-md-12 bg-white">
    <div class="row justify-content-md-center">
        <div class="card-image-wrap col-sm-5">
            <img src="cart/productImages/051596990220.webp">            
        </div>
        <div class="card-details-wrap col-sm-7">
            <div class="details-heading">
                <h4><?php echo $product[$i]['name'];?></h4>
            </div>
            <div class="rating-share-wrap">
                <div class="rating rating-card-details">
                  <i class="fas fa-star rating-yellow"></i>
                  <i class="fas fa-star rating-yellow"></i>
                  <i class="fas fa-star rating-yellow"></i>
                  <i class="fas fa-star rating-yellow"></i>
                  <i class="fas fa-star rating-yellow"></i>
                  <span><strong>5 out of 5</strong></span></p>
                </div>
                <div class="shared-wrap">
                    <span>Share: </span>
                    <a href="#" title="Mail" target="_blank"><i class="fas fa-envelope"></i></a>
                    <a href="#" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <hr>
            <p class="details-price">&#36;<?php echo $product[0]['price'];?>
                <span class="sub-text">Inclusive of all taxes</span>
            </p>
            <p>
                <?=$product[0]['description'] ?>
            </p>
            <!--<div class="feature-wrap">
                <a href="#"   data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-shield-alt"></i>
                    <span>Test Result</span>
                </a>
            </div>-->
            <div class="feature-wrap">
                <a href="#"   data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-paint-roller"></i>
                    <span>Technical Specification</span>
                </a>
            </div>
            <!--<div class="feature-wrap">
                <a href="#"   data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-truck-loading"></i>
                    <span>Lorem ipsum et</span>
                </a>
            </div>-->
            <form action="cart/CartController.php" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $product[0]['id'];?>">
                <div class="colors-wrap">
                    <h5 class="subheading">Quantity</h5>
                    <select name="qty" id="qty" required class="custom-select" >
                        <option value="">Choose...</option>
                        <?php  for($i=1;$i<=1;$i++){?>
                           <option value="<?=$i?>"><?=$i?></option>
                        <?php } ?>
                    </select>
                </div>
               <div class="qty-wrap"></div>
                <button type="text" name="action" value="AddToCart" class="btn button-primary text-uppercase button-active-primary"><i class="fas fa-credit-card"></i> Add to cart </button>
            </form>
        </div>
    </div>
</div>

<?php } ?>
</div>
</main>
<!--container.//-->
<?php include 'footer.php';?>
<div id="myModal" class="modal fade-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Informational</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <embed src= "https://theroofstore.net/Roof_Painting_Service_Broward_County_for_Smart_Shield.pdf" width= "100%" height= "500px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



