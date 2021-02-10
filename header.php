<?php ob_start() ?>
<?php include_once 'dbconnection/dbConnection.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>The Roof Store</title>
	<meta charset="utf-8">
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