<?php ob_start();?>
<!--Start Header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Get The Best Roof Coating Products At The Roof Store</title>
    <meta charset="utf-8">
    <meta name="description" content="If you are planning on getting roof coating for your roof, then The Roof Store has the best roof coating materials for you. Check out the website today." />
    <meta name="keywords" rating="" content="Best roof coating products, best roof coating materials" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/all.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- <script type="text/javascript" src="js/all.min.js"></script> -->

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="favicon.ico" rel="icon" type="image/x-icon">
    <script>
        /* if (location.protocol !== 'https:') {
            location.replace(`https:${location.href.substring(location.protocol.length)}`);
        }*/
    </script>
</head>

<body>
    <header>


        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-md-12 small-size welcome-message-wrap">
				<span>Welcome to our online store!</span>
			</div>-->
                <div class="col-md-12 header-toolbar-wrapper raisin-black">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3 my-auto">
                            <a href="shopping.php"><img src="images/logo.png" alt="Storm Shield Roof Paint Systems Logo"></a>
                        </div>
                        <div class="col-md-6 my-auto">
                            <!--	<form>
							<div class="header-search-wrap">
								<div class="header-input-prepend my-auto text-center">
						          <i class="fas fa-search"  aria-hidden="true"></i>
						        </div>
								<input type="text" class="header-Searchinput" placeholder="Search Products...">
								 <button type="submit" class="header-search-button">Search</button> 
							</div>
						</form>-->
                        </div>
                        <div class="col-md-3 mr-auto text-right my-auto toolList">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                            <!--						<a href="#" class="font-white signInOut"><i class="far fa-user" aria-hidden="true"></i></a>
						<a href="#" class="font-white whishList"><i class="far fa-heart" aria-hidden="true"></i><span class="bg-red notification">0</span></a>
--> <a href="cartDetail.php" class="font-white cartList"><i class="fas fa-shopping-basket" aria-hidden="true"></i>
                                <span class="bg-red notification">
                                    <?php
                                    if(!isset($_SESSION)) {
                                        session_start();
                                    }
                                    //              print_r($_SESSION);
                                    if(isset($_SESSION['cart'])){
                                        //                 print_r(unserialize($_SESSION['cart']));
                                        echo count(unserialize($_SESSION['cart']));
                                    }else{
                                        echo "0";
                                    }
                                ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 header-navigationbar-wrapper bg-white">
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
                            <ul class="navbar-nav custom-navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="shopping.php">Products</a>
                                </li>
                                <!--					  <li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					      Products
					    </a>
					    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
/*                            $db =new db_connect();
                            $sql = "Select * from products";
                            $product = $db->fetch($sql);
                            for($i=0;$i<count($product);$i++){
                            */?>
					      <a class="dropdown-item" href="productDetails.php?name=<?php /*echo $product[$i]['name'];*/?>&id=<?php /* echo $product[$i]['id']; */?>"><?php /*echo $product[$i]['name'];*/?></a>
                            <?php /*}*/?>
					    </div>
					  </li>-->
                                <li class="nav-item">
                                    <a href="FAQ.php" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <?php //session_destroy()?>
    <?php include_once 'dbconnection/dbConnection.php'?>

    <!--End Header -->
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
                            <h2>Our Products Start Paying For Themselves</h2><br>
                            <p>THE MOMENT THEY ARE INSTALLED</p><br>
                            <!--            <a class="btn btn-sm btn-warning" href="#" role="button">Sign up today</a>-->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/image3.jpg">
                    <div class="container">
                        <div class="carousel-caption">
                            <h2>We Designed Three Main Coating Systems</h2><br>
                            <p>With Unlimited Colors Even Clear!</p><br>
                            <!--            <a class="btn btn-sm btn-warning" href="#" role="button">Learn more</a>-->
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
        <!--End Carousel-->
        <div class="col-md-12 bg-white">
            <div class="row justify-content-md-center">
                <div class="col-md-6 quote-wrap">
                    <i class="fas fa-quote-left my-auto" aria-hidden="true"></i>
                    <div class="quote-text-wrap">
                        <p class="font-semibold">THE ORIGINAL LIQUID APPLIED RUBBER ROOF SHIELD SYSTEM</p>
                        <p class="font-lightgray">CALL - NOW 954 210-9614 OPTION 1</p>
                    </div>
                </div>
                <div class="col-md-3 card-wrap">
                    <i class="far fa-credit-card my-auto" aria-hidden="true"></i>
                    <div class="quote-text-wrap">
                        <p class="font-semibold">SECURE PAYMENT</p>
                        <p class="font-lightgray">100% secure payment</p>
                    </div>
                </div>
                <div class="col-md-3 support-wrap">
                    <i class="far fa-comments my-auto" aria-hidden="true"></i>
                    <div class="quote-text-wrap">
                        <p class="font-semibold">24/7 SUPPORT</p>
                        <p class="font-lightgray">Dedicated support</p>
                    </div>
                </div>
            </div>
        </div>
        <!--Start Product list-->
        <div class="col-md-12 section-sapce text-center">
            <h1 class="font-semibold">Our Most Advanced</h1>
            <p>Products that Restore, Preserve & Protect!</p>
            <p>[<i class="fas fa-paint-roller" aria-hidden="true"> Click on roller icon for more information.</i>][ <i class="far fa-heart" aria-hidden="true"> Click on Heart icon to share on social media.</i>]</p>
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
                            <?php if($i==1 || $i==2){?>
                            <a href="#" class="colorlist" data-toggle="modal" data-target="#myModal<?php echo $i;?>" title="Product Information">
                                <i class="fas fa-paint-roller" aria-hidden="true"></i>
                            </a>
                            <?php } ?>
                            <?php if($i==2){?>
                            <a style="margin-top: 40px;" href="#" class="colorlist" data-toggle="modal" data-target="#myModalmyModalUplifTest<?php echo $i;?>" title="uplift test">
                                <i class="fas fa-paint-roller" aria-hidden="true"></i>
                            </a>
                            <a style="margin-top: 80px;" href="#" class="colorlist" data-toggle="modal" data-target="#myModalPerformanceDataSheet<?php echo $i;?>" title="Performance Rating Material Data">
                                <i class="fas fa-paint-roller" aria-hidden="true"></i>
                            </a>
                            <a style="margin-top: 120px;" href="#" class="colorlist" data-toggle="modal" data-target="#MaterialSafetyDataSheet<?php echo $i;?>" title="Material Safety Data Sheet (MSDS)">
                                <i class="fas fa-paint-roller" aria-hidden="true"></i>
                            </a>
                            <?php } ?>
                            <a href="#" class="wishlist" data-toggle="modal" data-target="#socialMedia" title="uplift test">
                                <i class="far fa-heart" aria-hidden="true"></i>
                            </a>
                            <div class="imgBx">
                                <img src="images/product-img.png" alt="">
                                </a>
                            </div>
                            <div class="contentBx">
                                <h3><?php echo $product[$i]['name'];?></h3>
                                <h2 class="price">&#36;<?php echo $product[$i]['price'];?></h2>
                                <a href="productDetails.php?name=<?php echo $product[$i]['name'];?>&id=<?php echo $product[$i]['id'];?>" class="buy buy-blue font-semibold">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!--
            <div class="col-md-3">
              <div class="card card-gray">
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
                    <h3>RP.40 RUBBER <br>(Advanced)</h3>
                    <h2 class="price">$399<small>.99</small></h2>
                    <a href="#" class="buy buy-gray font-semibold">Add To Cart</a>
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-red">
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
                    <h3>RP.4 RUBBER <br>MINI FIBER, FILLER</h3>
                    <h2 class="price">$399<small>.99</small></h2>
                    <a href="#" class="buy buy-red font-semibold">Add To Cart</a>
                  </div>
              </div>
            </div>
        -->
                </div>
            </div>
        </div>
        <!--End Product list-->
        <!--Start Factory Images Gallery--->
        <!--<div class="col-md-12 bg-white section-sapce">
    <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
          <div class="row  d-flex">
          <div class="col-md-6 text-center">
            <div class="van-image">
              <img src="images/van.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <video controls="" class="video-thumbnail">
                <source src="https://theroofstore.net/video/install-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
          </div>
        </div>
        <div class="col-md-12">
          <div class="image-carousel d-flex">
            <ul id="rcbrand2">
              <li><img src="images/Spanish-tile-roof-painting.jpg" /></li>
              <li><img src="images/Spanish-tile-roof-waterproofing.jpg" /></li>
              <li><img src="images/Shingle-roof-waterproofing.jpg" /></li>
              <li><img src="images/Shingle-Roof-Painting.jpg" /></li>
              <li><img src="images/Flat-cement-tile-roof-waterproofing.jpg" /></li>
              <li><img src="images/flat-roof-waterproofing.jpg" /></li>              
              <li><img src="images/barrel-roof-tile.jpg" /></li>
              <li><img src="images/barrel-tile-roof-sealant.jpg" /></li>
              <li><img src="images/cement-tile-waterproofing.jpg" /></li>
              <li><img src="images/water-proof-roof.jpg" /></li>
          </ul>
        </div>
        </div>
      </div>
    </div>
    </div>
    <div class="col-md-4 factory-img">
      <img src="images/factory-img1.jpg" alt="">
    </div>
  </div>
</div>-->
        <!--Start Factory Images Gallery--->
        <div class="col-md-12 section-sapce">
            <div class="row justify-content-md-center">
                <div class="col-md-8 product-image-wrap">
                    <img src="images/banner-commercial-flat-roof.jpg" alt="Commercial Flat Roof" style="height: 100%;">
                </div>
                <div class="col-md-4 product-image-wrap">
                    <img src="images/product-image.jpg" alt="">
                </div>
            </div>
        </div>
    </main>
    <!--Start Footer -->
    <?php include "footer.php"; ?>
    <!--End Footer -->
    <div id="socialMedia" class="modal" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Social Media Share</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="shareBlock"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal0" class="modal fade-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Informational</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="https://theroofstore.net/Roof_Painting_Service_Broward_County_for_Smart_Shield.pdf" width="100%" height="500px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal1" class="modal fade-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Informational</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="https://theroofstore.net/Roof_Painting_Service_Broward_County_for_Smart_Shield.pdf" width="100%" height="500px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal fade-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Informational</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="https://theroofstore.net/pdf/pdf-images/Brochure/Brochure_2006_Revised_2018.pdf" width="100%" height="500px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModalmyModalUplifTest2" class="modal fade-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Uplift Test</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="https://theroofstore.net/pdf/TEST.pdf" width="100%" height="500px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModalPerformanceDataSheet2" class="modal fade-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Performance Data Sheet</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="https://theroofstore.net/pdf/pdf-images/roof-protect/roof%20protect.pdf" width="100%" height="500px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="MaterialSafetyDataSheet2" class="modal fade-lg" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Material Safety Data Sheet (MSDS)</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="https://theroofstore.net/pdf/pdf-images/roof-protect/roof%20protect.pdf" width="100%" height="500px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.c-share.js"></script>
    <script>
        $('#shareBlock').cShare({
            data: {
                fb: {
                    fa: 'fab fa-facebook-f',
                    name: 'Fb',
                    href: (url) => {
                        return `https://www.facebook.com/sharer.php?u=${url}`
                    },
                    show: true
                },

                twitter: {
                    fa: 'fab fa-twitter',
                    name: 'Twitter',
                    href: (url, description) => {
                        return `https://twitter.com/intent/tweet?original_referer=${url}&url=${url}&text=${description}`
                    },
                    show: false
                },

                email: {
                    fa: 'fas fa-envelope',
                    name: 'E-mail',
                    href: (url, description) => {
                        return `mailto:?subject=${description}&body=${description} ${url}`
                    },
                    show: false
                }
            },
        });
    </script>