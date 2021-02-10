<?php ob_start();?><!--Start Header -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>The Roof Store - Frequently Asked Questions</title>
	<meta charset="utf-8">
    <meta name="description" content="Got some questions regarding our roofing coating materials, roof paints, or anything else? Go to our FAQ section and find all your answers there." />
    <meta name="keywords" rating="" content="Roofing coating materials, roof paint" />
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
<?php //session_destroy()?>
<?php include_once 'dbconnection/dbConnection.php'?>
<head>
	
	<style>
.accordion {

  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}



.accordion:after {
  content: '\002B';
  color: #000;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.accordion .active:after {
  content: "\2212";
}
.panel-title span{
  font-size:17px;
  font-weight:500; 
  color:#000;
}



	</style>
</head>
<main class="main-wrapper" style="background-color:#fff;">

<div class="container">
<div class="row">
<div class="col-md-12 section-sapce text-justify" style=" margin:auto;">
<!--- first section --->
        <h1 class="font-semibold">FAQ</h1>
		<hr style=" width:80px;   border-top: 3px solid #e19028;">
		
		

			
			
			
			<div class="panel-group p-3 " id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				  <span><b>1.</b> Is this process offered in stores, just a coating that any other high performance 
				  roof paint system is comparable too?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
				 &#x279C; No not even close, Our Trademarked "Original Liquid Applied Rubber Roof & wall" liquid rubber products are not available 
				  in stores like Home Depot, it is only available through our store and authorized distribution network.
				</div>
			  </div>
			</div></div>
			
<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true" style="background-color:#fff;">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingTwo">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				  <span><b>2.</b> Can these products be applied to all types of roofs?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body">
				 &#x279C; Yes, Barrel, Flat, or S - Tile, Metal, Gravel, and Foam. From Roofs, Walls, Decks and much more.. 
				</div>
			  </div>
			</div></div>
			
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingThree">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
				  <span><b>3.</b> Can a color be applied to provide decorative enhancement?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
				<div class="panel-body">
				 &#x279C; Virtually any color may be added through our computer match iron oxides colorant system.

				</div>
			  </div>
			</div></div>
			
			
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingFour">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
				  <span><b>4.</b> Is every roof coated with just one process?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
				<div class="panel-body">
				 &#x279C; Our company installs 3 main systems on residential or commercial properties, we provide the manufactures
				  onsite inspection, specifications, details and drawing which differ slightly depending on each projects needs.
				</div>
			  </div>
			</div></div>
				
			
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingFive">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
				  <span><b>5.</b> Do you offer exterior painting or waterproofing, besides roof coating?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
				<div class="panel-body">
			&#x279C; Yes, we do commercial and residential painting up to three stories with our rubber protective wall coating which is warranted for up to 25 years. 
				</div>
			  </div>
			</div>
				</div>
				
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingSix">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
				  <span><b>6.</b> How long have you been doing this application and how strong is it?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
				<div class="panel-body" >
			&#x279C; We have been successfully protecting roofs and exterior wall structures for over 20 years and climbing, we are the only company to
			have the Dade County TAS-106 Pull uplift test on a tile sealed roof which demonstrated its extreme
			uplift pressure resistance of apx 5 x's stronger than the code requirement for a cement tile roof.
				</div>
			  </div>
			</div>
			</div>
				
			
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingSeven">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
				  <span><b>7.</b> How much does the complete Roof Shield System cost?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
				<div class="panel-body">
			&#x279C; Depending on how large your roof is, how many broken tile or general rework areas need to be restored, 
			typically an average home runs about 1/3 to 1/2 the cost of a replacement cement tile or flat roof.
 
				</div>
			  </div>
			</div>
			</div>
				
			
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingEight">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
				  <span><b>8.</b> How many systems do you offer and how long is the warranty?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseEight" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEight">
				<div class="panel-body">
			&#x279C; We have 3 main systems available, Fungal Shield clear liquid rubber for anti mildew treatment and tile uv 
			protection for up to 5 years, Smart Shield for Darker colors with nanotechnology that reflect heat and Roof 
			Shield for a permanent retrofit and complete weatherproofing. Our Products are utilized on substantial commercial 
			projects and residential roof decks as well which can provide up to 20 years of additional protection. Conversley, 
			Labor and Material warranty's for new roofs in the state of Florida are required to provide up to a 2 year warranty 
			for leaks, however unusual wind conditions of 65 miles per hour will void all guaranties against leaks.
 
				</div>
			  </div>
			</div>
			</div>
				
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingNine">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
				  <span><b>9.</b> What colors do you have?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseNine" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingNine">
				<div class="panel-body">
			&#x279C; We have over 3000 colors or custom match
 
				</div>
			  </div>
			</div>
			</div>
				
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingTen">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
				  <span><b>10.</b> Does your exterior wall and roof coating once applied need cleaning?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseTen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTen">
				<div class="panel-body" >
			&#x279C; No, We have two products for our tropical climate our clear environmentally safe FungalShield mildew retardant
			available to make your roof, walls, walkways and just about virtually any unpainted surface free from green fungi
			growth and mildew for up to 5 years.When applying paint or coatings with color we can add TropicalClimacoat with 
			Biqeul to the paint which does not allow mildew growth, period.
 
				</div>
			  </div>
			</div>
			</div>
				
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingEleven">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
				  <span><b>11.</b> How thick is your coating?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseEleven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingEleven">
				<div class="panel-body">
			&#x279C; 1/8 to 1/25 of an inch.. we install a hard coat, primer, fiber coat touch up, 2 coats of liquid rubber which is a total of 5 coats.

 
				</div>
			  </div>
			</div>
			</div>
			
				
			
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingTwelve">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
				  <span><b>12.</b> Do you recommend doing repairs prior to installing of your system?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseTwelve" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwelve">
				<div class="panel-body" >
			&#x279C; Yes, you must repair or replace any and all broken tiles, rotten wood in the fields or roof edges. 
			To see if your roof qualifies the manufacturer undertakes a complete detailed inspection including looking
			in your attic for bad wood, some minor restoration work is generally included in the price.


 
				</div>
			  </div>
			</div>
			</div>
			
			
			
			<div class="panel-group p-3" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			  <div class="panel-heading" role="tab" id="headingThirteen">
				<h4 class="panel-title accordion">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">
				  <span ><b>13.</b> Do I need a building permit?</span>
				</a>
			  </h4>
			  </div>
			  <div id="collapseThirteen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThirteen">
				<div class="panel-body" style="background-color:#fff; padding:10px">
			&#x279C; No although a few cities do require them.
				</div>
			  </div>
			</div>
			</div>
</div>
</div>
</div>
</main>



<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<?php include "footer.php"; ?>