<!--Start Header -->
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us - The Roof Store</title>
	<meta charset="utf-8">
    <meta name="description" content="Whether you want to shop for metal roof coating materials or roof sealing products, reach out to the Roof Store for their advanced roofing solutions. Call now! " />
    <meta name="keywords" rating="" content="Metal roof coating,roof sealing products" />
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
-->						<a href="cartDetail.php" class="font-white cartList"><i class="fas fa-shopping-basket" aria-hidden="true"></i>
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
					  	<a href="#"  class="nav-link">Contact Us</a>
					  </li>
					</ul>
					</div>
                </nav>
			</div>
		</div>
	</div>
</header>
<!--End Header -->

<main class="main-wrapper">
  <div class="banner-wrap banner-contact-image-wrap"></div>
    <div class="wrapper"><div class="bread-crumb"><a href="index.php"> Home </a> <i class="fas fa-angle-right"></i> Contact Us</div></div>
    <div class="col-md-12 section-sapce bg-white text-center contact-wrap">
		<h1 class="font-semibold">Contact Us</h1>
    	<p>We are always happy to help, get in touch with us today!</p>

    	<div class="col-md-12 text-left">
			<div class="row justify-content-md-center">
				<div class="col-md-3">
					<div class="alert alert-danger">
						<p>"There is never a charge for a price quote" <strong>Call Now Office (954)-210-9614 option 1</strong></p>
	  					<p>After  sending your form information below to us <strong>you will receive an auto respond email  which includes the factory products price sheet</strong> <strong>and other valuable information,</strong> also we do not spam or share your information with anyone unless otherwise authorized by you since all your information is considered confidential.</p>
	  					<p><strong>Our in house licensed contracting service</strong> is <strong>BBB A+ Rated &amp;</strong> <strong>celebrating its 25th year in 2019."</strong></p>
	         			<p><strong> Call now for our free over the phone evaluation</strong> @<strong> 954-210-9614 option 1  </strong><br><br>Thank you </p>
	         		</div>
				</div>
				<div class="col-md-9">
					<form>
					  <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="name">Name <span class="text-danger">*</span></label>
					      <input type="text" class="form-control" id="name">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="saddress">Street Address</label>
					      <input type="text" class="form-control" id="saddress">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="city">City <span class="text-danger">*</span></label>
					      <input type="text" class="form-control" id="city">
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="state">State <span class="text-danger">*</span></label>
					      <input type="text" class="form-control" id="state">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="zipcode">Zip Code <span class="text-danger">*</span></label>
					      <input type="text" class="form-control" id="zipcode">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="email">Email <span class="text-danger">*</span></label>
					      <input type="email" class="form-control" id="email">
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="dayphone">Day Phone <span class="text-danger">*</span></label>
					      <input type="text" class="form-control" id="dayphone">
					    </div>
					    <div class="form-group col-md-4">
					      <label for="eveningphone">Evening Phone</label>
					      <input type="text" class="form-control" id="eveningphone">
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="email">How did you find us?</label>
					      	<select id="findus" name="findus" class="custom-select">
				                <option value="Google">Google</option>
				                <option value="Yahoo">Yahoo</option>
				                <option value="Press Release">Press release</option>
				                <option value="Refer Friend">Referred by friend</option>
				                <option value="Returning Client or Partner">Returning Client/Business Partner</option>
				                <option value="Newspaper">Newspaper</option>
				                <option value="Mailer Flyer">Mailer/Flyer</option>
				                <option value="Yellow Pages">Yellowpages</option>
				                <option value="Other">Other</option>
				            </select>
					    </div>
					  </div>
					  <div class="form-group">
					      <label for="structure">How old is the roof, wall or structure?</label>
					      <input type="text" class="form-control" id="structure">
					    </div>
					  <div class="form-row">
					    <div class="form-group col-md-4">
					      	<label for="dayphone">Is there any damage?</label>
					      	<div class="col-md-12 row">
						      	<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="yes" name="damage_roof" class="custom-control-input">
								  <label class="custom-control-label" for="yes">Yes</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="no" name="damage_roof" class="custom-control-input" checked="checked">
								  <label class="custom-control-label" for="no" >No</label>
								</div>
							</div>
					    </div>
					    <div class="form-group col-md-4">
					      	<label for="dayphone">Are you the owner?</label>
					      	<div class="col-md-12 row">
						      	<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="yes" name="owner" class="custom-control-input">
								  <label class="custom-control-label" for="yes">Yes</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="no" name="owner" class="custom-control-input" checked="checked">
								  <label class="custom-control-label" for="no" >No</label>
								</div>
							</div>
					    </div>

					    <div class="form-group col-md-4">
					      <label for="dayphone">Commercial or Residential ?</label>
					      	<div class="col-md-12 row">
						      	<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="commercial" name="cr" class="custom-control-input">
								  <label class="custom-control-label" for="commercial">Commercial</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="residential" name="cr" class="custom-control-input" checked="checked">
								  <label class="custom-control-label" for="residential" >Residential</label>
								</div>
							</div>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="message">Message for theroofstore.net <span class="text-danger">*</span></label>
					    <textarea class="form-control" id="message" rows="3"></textarea>
					  </div>
					  <button type="submit" class="btn btn-danger">Send</button>
					</form>
				</div>
			</div>
		</div>

    </div>
</main>


<!--Start Footer -->
<?php include "footer.php"; ?>
<!--End Footer -->