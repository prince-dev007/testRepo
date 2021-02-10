<?php ob_start() ?>
<?php include "header.php"; ?>
<?php include_once 'dbconnection/dbConnection.php'?>
<main class="main-wrapper">
    <!--Start Carousel-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/image1.jpg">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Our Products Start Paying For Themselves</h1><br>
                        <p>THE MOMENT THEY ARE INSTALLED</p><br>
                        <a class="btn btn-sm btn-warning" href="#" role="button">Sign up today</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/image3.jpg">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>We Designed Three Main Coating Systems</h1><br>
                        <p>With Unlimited Colors Even Clear!</p><br>
                        <a class="btn btn-sm btn-warning" href="#" role="button">Learn more</a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-md-12 section-sapce text-center">
        <?php
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['payer'])){?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">OOPS!</h4>
                   <?php echo "<p>Something went wrong. please try again. Your transaction id is: <b>".$_SESSION['payer']."</b> </p>"; ?>
            </div>
        <?php
            foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
           }else{
                foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
                header('Location:shopping.php');
            }
        ?>
        <h1 class="font-semibold">Best Sellers</h1>
        <p>Systems that Restore, Preserve & Protect!</p>
        <div class="col-md-12 text-center ">

            <div class="row justify-content-md-center">
                <!--Start Cart-->
                <?php
                $colorCard =array("blue", "gray", "red");
                $db = new db_connect();
                $sql = "Select * from products";
                //	echo $sql;
                $product =  $db->fetch($sql);
                for($i=0;$i<count($product);$i++){
                    ?>
                    <div class="col-md-3">
                        <div class="card card-<?php echo $colorCard[$i]?>">
                            <a href="#" class="colorlist">
                                <i class="fas fa-paint-roller"  aria-hidden="true"></i>
                            </a>
                            <a href="#" class="wishlist">
                                <i class="far fa-heart"  aria-hidden="true"></i>
                            </a>
                            <div class="imgBx">
                                <img src="images/product-img.png" alt="">
                            </div>
                            <div class="contentBx">
                                <h3><?php echo $product[$i]['name'];?></h3>
                                <h2 class="price">&#36;<?php echo $product[$i]['price'];?></h2>
                                <a href="productDetails.php?name=<?php echo $product[$i]['name'];?>&id=<?php echo $product[$i]['id'];?>" class="buy buy-blue font-semibold">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</main>
<?php include_once 'footer.php'?>