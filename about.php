<?php ob_start();?>
<!--Start Header -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Roof Store - About Us</title>
    <meta charset="utf-8">
    <meta name="description" content="The Roof Store is here to help people find out what's best for their roof. We offer them roof coating paint, commercial roof coating products, and a lot more." />
    <meta name="keywords" rating="" content="Commercial roof coating products, roof coating paint" />
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

    <main class="main-wrapper" style="background-color:#fff;">

        <!--Start Carousel-->

        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">

                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

                <li data-target="#myCarousel" data-slide-to="1"></li>

            </ol>

            <div class="carousel-inner">

                <div class="carousel-item active">

                    <img src="images/banner-metal-roofing.jpg" style="width:100%;">

                    <div class="container">

                        <div class="carousel-caption text-left">

                            <h2>Our Products Start Paying For Themselves</h2><br>

                            <p>THE MOMENT THEY ARE INSTALLED</p><br>

                            <!--            <a class="btn btn-sm btn-warning" href="#" role="button">Sign up today</a>-->

                        </div>

                    </div>

                </div>

                <div class="carousel-item">

                    <img src="images/bn2.jpg" style="width:100%;">

                    <div class="container">

                        <div class="carousel-caption">

                            <h2>Home of the Original Rubber Roof Shield</h2><br>

                            <p>VIRTUALLY MAINTENANCE FREE • 20 YEAR WARRANTY</p><br>

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

        <div class="col-md-12 section-sapce text-justify" style="background-color:#fff; margin:auto; width:70%; ">

            <!--- first section --->

            <h1 class="font-semibold hhh">Welcome to the Roof Store</h1>

            <hr style=" width:550px;   border-top: 3px solid #e19028;">

            <p>Systems that Restore, Preserve & Protect!

                Our site is dedicated to providing information the property owner should be made aware of before

                they make the decision to do specific roof repairs, re-roof, or any kind of roof installation.

                Roof Protect seamless coating products have been the proven re-roof replacement roof repair solution

                to stop roof leaks and protect your Florida roof against hurricane-force winds and water damage which is the ever-present

                severe weathering known to consistently damage and destroy the typical Roof Systems in our area.</p>



            <p>Our Rubber Roof Coating System was tested by Dade County's Tas-106 Uplift Exam in 2007 and to date is the only

                tile roof coating system pull tested by Dade County on an exiting old roof tile system treated with a specialized

                coating process that proves it as substantial uplift pressures. After this test was completed we received our

                completed trademark in 2009. Don't Re-Roof Weatherproof @1/2 The Cost, "Original Liquid Applied Rubber Roof Sealants, Restores Protects & Preserves".</p>

            <div class="col-md-12 bg-white section-sapce">

                <div class="row">

                    <div class="col-md-7">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="row  d-flex">

                                    <div class="col-md-7 text-center">

                                        <div class="van-image">

                                            <a href="https://theroofstore.net/distributorships/distributorships.php">

                                                <img src="images/van.jpg" alt="Reroof Weatherroof">

                                            </a>

                                            <span>Distributor Opportunities</span>

                                        </div>

                                    </div>

                                    <div class="col-md-5">

                                        <video controls="" class="video-thumbnail">

                                            <source src="https://theroofstore.net/video/install-video.mp4" type="video/mp4">

                                            Your browser does not support the video tag.

                                        </video>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="image-carousel d-flex">

                                        <ul id="rcbrand2">

                                            <li><img src="images/Spanish-tile-roof-painting.jpg" alt="Spanish Tile Roof Painting"/></li>

                                            <li><img src="images/Spanish-tile-roof-waterproofing.jpg" alt="Spanish Tile Roof Waterproofing"/></li>

                                            <li><img src="images/Shingle-roof-waterproofing.jpg" alt="Shingle Roof Waterproofing"/></li>

                                            <li><img src="images/Shingle-Roof-Painting.jpg" alt="Shingle Roof Painting"/></li>

                                            <li><img src="images/Flat-cement-tile-roof-waterproofing.jpg" alt="Flat Cement Tile Roof Waterproofing"/></li>

                                            <li><img src="images/flat-roof-waterproofing.jpg" alt="Flat Roof Waterproofing"/></li>

                                            <li><img src="images/barrel-roof-tile.jpg" alt="Barrel Roof Tile"/></li>

                                            <li><img src="images/barrel-tile-roof-sealant.jpg" alt="Barrel Tile Roof Sealant"/></li>

                                            <li><img src="images/cement-tile-waterproofing.jpg" alt="Cement Tile Waterproofing"/></li>

                                            <li><img src="images/water-proof-roof.jpg" alt="Water Proof Roof"/></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-5 factory-img">

                        <img src="images/factory-img1.jpg" title="Reroof Waterproof">

                    </div>

                </div>

            </div>

            <p>Our company presented its roof coating process with Home Depot, after the rash of named storms passed through our

                area in the 2004 2005 Hurricane season, speaking with their roofing and siding division for expansion of our brand recognition,

                they told us, "they had to see if there was a market for this kind of process." It's funny ever since then they started offering

                our basic concept in all kinds of different inferior paint products. There are simply no comparables or short cuts to our roof

                replacement restoration retrofit solution. Remember there are several paints and coating products, competitors, in the market place,

                Nu-Tech comes to mind as one of our recent additions to our local market place area in Palm Beach County, now the distributor claims

                their product is a seamless membrane, it stops leaks and all sorts of wonderful things, unfortunately, if you’re not applying a

                monolithic system, for example, it is not going to stop active leaks, furthermore they claim some of their other products are

                super great elastomeric paint however its only 300 psi tinsel strength which is designed to be applied to walls and should not

                be used on roofs especially flat roofs that tend to hold water.</p>



            <p>If you have already had a tile roof repaired or your roof replaced to stop roof leaks or received estimates from several roofing

                contractors in Florida, Ft Lauderdale Broward County, before spending more than you have to and destroy all those expensive tiles

                seriously consider putting our proven roof coating sealant system on it and save thousands of dollars. Do you have an old cement

                barrel or shingle roof that needs a roof restoration service, need roof painting to add color or roof waterproofing to stop roof

                leaks, install our roof weatherproofing system, you will save time, money, make it stronger than a new roof, look like a new roof

                replacement and in just a few days.</p>



            <p>It is in our opinion the strength of new roof construction at its first line of defense is inadequate at the exterior tiles,

                a new cement tile roof is simply not worth it unless an inordinate amount of rotten wood is found during an inspection,

                (there are many ways to verify those sections or suspect spots in your roof whether there is room to look in the attic or not),

                we understand that upgrading is important and sometimes warranted with respect to the challenging demographics, nevertheless,

                if you have a new roof you would still want to seriously consider adding our system to it.</p>



            <p>The owner of Theroofstore.net began his restoration business in the Fire and Flood Industry in the 1980s on a part-time basis

                while working with Atlantic Ambulance Service. He is the recipient of The Original Liquid Applied Rubber Roof Shield System, Former

                State of Florida certified Firefighter, current licensed State of Florida and National Registry Emt-b, Licensed Merchant Marine Officer,

                licensed Coating Contractor, and Manufacturer.</p>



            <br>

            <!--  second section--->

            <h2 class="font-semibold">The Facts</h2>

            <hr style=" width:200px;   border-top: 3px solid #e19028;">

            <ul style="margin-left:27px; list-style-image: url(images/blt.png);">

                <li>Our Products stop exiting leaks and permanently prevent future leaks from developing.</li><br>

                <li>Replaces missing and broken tiles.</li><br>

                <li>Surpasses state code requirements (as it should be stronger anyway on newer roofs).</li><br>

                <li>Florida roof testing standards prove our system on old roof tiles has extreme wind resistance.</li><br>

                <li>Reduces insurance claims and premiums by eliminating them!</li><br>

                <li>It Completely insulates and saves 22% on energy bills per year.</li><br>

                <li>Proven several times more wind resistant than new roof standards, and at a fraction of the cost.</li><br>

                <li>Restores, strengthens, seals & protects older roofs better than new and still looks like new.</li><br>

            </ul>

            <p>The present state code is equal to approximately 100 to 130 max wind, that's a cat 1.5 to 2 and if anything hits your roof

                tiles it will take much less wind pressure to expose and lift off the rest of them. The attachment methods are at too few points

                underneath and are not seamless or all points monolithic as it should be in this High-Velocity wind Zone Area.</p>



            <p>Studies were undertaken by the National Oceanic and Atmospheric Administration forecast increasing windstorm activity and annual

                hurricane-force winds which threaten the unprotected new cement tile roof systems and old cement tile roof systems. History continues

                to repeat the cycle of costly time consuming messy roof replacements, resealing and repair of broken or missing roof tiles, and flat

                roof leaks that encourage the guessing game while it expands exposing the inside of your home to further damage....

            </p>



            <p>Do you know what the 2007/2008 state of Florida roof replacement wind-resistant code requirements is regarding roof uplift wind storm

                resistance standards revised 2004, revamped from 1994, 2 years after Andrew then again after hurricane Wilma?</p>



            <p>What has the state of Florida's new legislation provisions put into law for your overall roof windstorm protection, What roof inspections

                and affidavits are available to you that reflect the insurance industry's new position on deductions for premiums? (If you have an older roof

                and you're considering a roof rip off or roof replacement in Broward County now)

            </p>



            <p>Since the most recent legislation was made into law, as part of the new deal now it's too few insurance companies have been granted

                increased reach and control, Surprised. </p>



            <p>There is no premium relief deduction for new, old, or any roof type, and in the event of a claim they can raise your rate, they can

                drop you and if you're not already with certain insurers by now you're locked out for 3 more years. In Conclusion (especially if yourself

                insured or insured but hesitant to put in a claim) </p>



            <p class="font-semibold">Roof Shield Systems were originally developed in Broward County-Ft Lauderdale Florida to permanently stop roof leaks on all types of roofs by

                completely waterproofing flat cement tile roofs, barrel tile roofs, shingle tile roofs, exiting leaky traditional built-up commercial flat roofs,

                residential flat roof replacements and foam waterproofed metal roofs and generally improve on roof repair maintenance service techniques.</p>



            <p>The original trademarked liquid applied rubber roof coating once installed has proven that it provides permanent traditional roof repair,

                roof replacement service solutions in Broward, Dade, Palm Beach County, and throughout South Florida, Completely Shield your roof from hurricane-force

                winds and water damage and protect your home today".</p><br>







    </main>

    <?php include "footer.php"; ?>