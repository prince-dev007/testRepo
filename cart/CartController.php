<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
include_once '../dbconnection/dbConnection.php';
require 'vendor/autoload.php';
// Require the main ups class and upsRate
include_once 'UPSWrapper.php';
include_once 'FedexWrapper.php';
include_once 'Cart.php';
include_once 'Util.php';
include_once 'app/start.php';
include_once 'mail/EmailUtil.php';
$action = Util::escape($_REQUEST['action']);
switch ($action){
    case 'AddToCart':
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['action'] = 'checkout';
        $cart = new Cart();
        $db = new db_connect();
        $cart->setSesstionId(session_id());
        $id  = Util::escape($_REQUEST['id']);
        $qty =  Util::escape($_REQUEST['qty']);
        if(!empty($id)){
            $sql = "Select * from products where id=".$id;
            $priceData = $db->fetch($sql);
            //     session_destroy();
            if(count($priceData)>0){
                $cart->setId($priceData[0]['id']);
                $cart->setPrice($priceData[0]['price']);
                $cart->setProductName($priceData[0]['name']);
                $cart->setQty($qty);
            //    $cart->setShippingCost($priceData[0]['scost']);
                $cart->setHeight($priceData[0]['height']);
                $cart->setWidth($priceData[0]['width']);
                $cart->setWeight($priceData[0]['weight']);
                if(empty($cart->getInvoice())){
                    $invoice   = rand();
                    $cart->setInvoice($invoice);
                }
                if(isset( $_SESSION['cart'] )){
                    $cartTemp = unserialize($_SESSION['cart']);
                    $count = count($cartTemp);
                    $isAdded = "false";
                    foreach ($cartTemp as $item) {
                        if ($item->getId() === $cart->getId()) {
                            $isAdded = "true";
                        }
                    }
                    if($isAdded == "false") {
                        $cartTemp[$count++] = $cart;
                        $_SESSION['cart'] = serialize($cartTemp);
                    }
                    //      print_r($cartTemp);
                } else {
                    $cartTemp = array();
                    $cartTemp[0] = $cart;
                    //    print_r($cartTemp);
                    $_SESSION['cart'] = serialize($cartTemp);
                }
                header('Location:../shopping.php');
            }else{
                header('Location:../shopping.php');
            }
        }else {
            header('Location:../shopping.php');
        }
        break;
    case 'Buynow':
        if(!isset($_SESSION)){
            session_start();
        }
        $cart =  new Cart();
        $db = new db_connect();
        $cart->setSesstionId(session_id());
        $id = Util::escape($_REQUEST['id']);
        if(!empty($id)){
            $sql = "Select id,price,name from products where id=".$id;
            $priceData = $db->fetch($sql);
            if(count($priceData)>0){
                session_start();
                $cart->setId($priceData[0]['id']);
                $cart->setPrice($priceData[0]['price']);
                $cart->setProductName($priceData[0]['name']);
                $_SESSION['cart'] = $cart;
                header('Location:../cartDetail.php');
            }else{
                header('Location:../shopping.php');
            }
        }else {
            header('Location:../shopping.php');
        }
        break;
    case 'payment':
        if(!isset($_SESSION)){
            session_start();
        }
        $cart = new Cart();
        $cart = unserialize($_SESSION['cart']);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $paypal = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ATG6W9AXka1Y_Mp28qFGwAfwGwMztYqMioiqUtXDkfOCqKHxiV5IvW98pfsZq-vo7lO43zZvku8xSXj0',
                'EFJPGG8bJgzsnb4xhoil9dq77t53At7FdKcBWBnzsbFEWtODHyMkknwVBLQhy_KnNbwyS7l9LsWe69sr'
            )
        );
        $item          = 0;
        $subTotal      = 0;
        $shippingTotal = 0;
        $total         = 0;
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $itemList = new ItemList();
        $items    = array();
        $invoice  = rand(0,100).rand(0,80).rand(10,500);
        $sessionGen ="";
        foreach($cart as $productItem){
            $item = new Item();
            $item->setName($productItem->getProductName())
                ->setCurrency('USD')
                ->setQuantity($productItem->getQty())
                ->setPrice($productItem->getPrice());
            $itemList->setItems([$item]);
            $items[] = $item;
            $invoice = $productItem->getInvoice();
            if(empty($sessionGen)) {
                $sessionGen = $productItem->getSesstionId();
            }
           // $shippingTotal = $shippingTotal + ($productItem->getShippingCost() * $productItem->getQty());
            $shippingTotal = $cart[0]->getShippingCost();
            $subTotal = $subTotal + ($productItem->getPrice() * $productItem->getQty());
        }
        $itemList->setItems($items);
        $total = $subTotal + $shippingTotal;
        $details = new Details();
        $details->setShipping($shippingTotal)
            ->setSubtotal($subTotal);
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total)
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('The Roof Store Payment')
            ->setInvoiceNumber($invoice);
        $redirectUrsl = new \PayPal\Api\RedirectUrls();
        $redirectUrsl->setReturnUrl(SITE_URL.'/cart/CartController.php?action=true&invoice='.$invoice.'&session='.$sessionGen)
            ->setCancelUrl(SITE_URL.'/cart/CartController.php?action=false&invoice='.$invoice.'&session='.$sessionGen);
        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrsl)
            ->setTransactions([$transaction]);
        try{
            $db = new db_connect();
            $sql = "insert into cart (session,firstname,lastname,phone,email,address,state,city,zip,status,totalamount,totalitem,invoice,object) values(";
            $sql.= "'".$sessionGen."',";
            $sql.= "'".$cart[0]->getFirstName()."',";
            $sql.= "'".$cart[0]->getLastName()."',";
            $sql.= "'".$cart[0]->getPhone()."',";
            $sql.= "'".$cart[0]->getEmail()."',";
            $sql.= "'".$cart[0]->getAddress()."',";
            $sql.= "'".$cart[0]->getState()."',";
            $sql.= "'".$cart[0]->getCity()."',";
            $sql.= "'".$cart[0]->getZip()."',";
            $sql.= "'Inprogres',";
            $sql.= "'".$total."',";
            $sql.= "'".count($cart)."',";
            $sql.= "'".$invoice."',";
            $sql.= "'".serialize($cart)."')";
            $db->save($sql);
            $ups = new UPSWrapper();
            $shippingInformation = $ups->shippingRequest($cart);
            $payment->create($paypal);
        }catch (Exception $e){
            die($e);
        }


        $approvalUrl = $payment->getApprovalLink();
        header("Location: {$approvalUrl}");
        break;
    case 'city':
        $q =  $_REQUEST['q'];
        $db = new db_connect();
        $sql = "SELECT DISTINCT city FROM `us` where state_abbr = '".$q."'";
        //$sql = "SELECT * FROM `us_cities` where ID_STATE = (select id from us_states where state_code = '".$q."')";
        $city =  $db->fetch($sql);
        $option="";
        for($i=0;$i<count($city);$i++){
            $option .= "<option value='".$city[$i]['city']."'>".$city[$i]['city']."</option>";
        }
        echo $option;
        break;
    case 'true':
        if(!isset($_SESSION)){
            session_start();
        }
        $db = new db_connect();
        if(!isset($_GET['action'],$_GET['paymentId'],$_GET['PayerID'])){
            $paymentId = $_GET['paymentId'];
            $payerId   = $_GET['PayerID'];
            $invoice   = $_GET['invoice'];
            $session   = $_GET['session'];
            $token     = $_GET['token'];
            $sql = "update cart set status='payment failed',paymentId='".$paymentId."',payer_id='".$payerId."', token='".$token."' where invoice='".$invoice."' and session='".$session."'";
            $db->save($sql);
            foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
            session_regenerate_id(true);
            $_SESSION['payerId'] = $invoice;
            header("Location: ../error.php?error=Something went wrong. please try again.");
        }
        if( $_GET['action'] === "false"){
            $paymentId = $_GET['paymentId'];
            $payerId   = $_GET['PayerID'];
            $invoice   = $_GET['invoice'];
            $session   = $_GET['session'];
            $token     = $_GET['token'];
            $sql = "update cart set status='payment failed',paymentId='".$paymentId."',payer_id='".$payerId."', token='".$token."' where invoice='".$invoice."' and session='".$session."'";
            $db->save($sql);
            foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
            session_regenerate_id(true);
            $_SESSION['payer'] = $invoice;
            header("Location:  ../error.php?error=Something went wrong. please  try again.");
        }
        $paymentId = $_GET['paymentId'];
        $payerId   = $_GET['PayerID'];
        $invoice   = $_GET['invoice'];
        $session   = $_GET['session'];
        $token     = $_GET['token'];
        $payment = \PayPal\Api\Payment::get($paymentId,$paypal);
        $execute = new \PayPal\Api\PaymentExecution();
        $execute->setPayerId($payerId);
        $result =null;
        try{
            $result = $payment->execute($execute,$paypal);
            //json_encode($result);
        
            if($result->getState() == "approved"){
				  
                $cart = new Cart();	echo "test123<br>";
                $cart = unserialize($_SESSION['cart']);	
				echo "test124<br>";
                $ups = new UPSWrapper();echo "test125<br>";
                $shippingInformation = $ups->shippingRequest($cart);
				echo "test126<br>";
				echo "test127<br>";
                if($shippingInformation!=null && count($shippingInformation)>0){
                    $sql = "update cart set ShipmentIdentificationNumber='".$shippingInformation['ShipmentIdentificationNumber']."',GraphicImage='".$shippingInformation['GraphicImage']."', status='approved',paymentId='".$paymentId."',payer_id='".$payerId."', response_object='".serialize($result)."', token='".$token."'   where invoice='".$invoice."' and session='".$session."'";
                }else{
                    $sql = "update cart set ShipmentIdentificationNumber='',GraphicImage='' status='approvedWithoutShippingRequest',paymentId='".$paymentId."',payer_id='".$payerId."', response_object='".serialize($result)."', token='".$token."'   where invoice='".$invoice."' and session='".$session."'";
                }
                $db->save($sql);
                $email = new EmailUtil();
                $email->setToAddress($cart[0]->getEmail());
                $email->setSubject("Your Shopping order #".$invoice);
                $email->send($cart, true);

                $sql = "Select *  from systemconfig where id=1";
                $data = $db->fetch($sql);
                $factoryEmail = $data[0]['value'];
                $factory = new EmailUtil();
                $factory->setToAddress($factoryEmail);
                $factory->setSubject("Label for #".$invoice);
                $factory->setAttachment($shippingInformation['GraphicImage']);
                $factory->send($cart,false);
                $sql = "Select *  from systemconfig where id=2";
                $data = $db->fetch($sql);
                $middle = new EmailUtil();
                $middle->setToAddress($cart[0]->getEmail());
                $middle->setSubject("Your Shopping order #".$invoice);
                $middle->setAttachment($shippingInformation['GraphicImage']);
                $middle->send($cart, true);
               
				foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
                session_regenerate_id(true);
				 
                $_SESSION['payer'] = $invoice;
                header("Location:  ../success.php");
            }else{
                $sql = "update cart set status='payment failed',paymentId='".$paymentId."',payer_id='".$payerId."' , response_object='".serialize($result)."', token='".$token."'   where invoice='".$invoice."' and session='".$session."'";
                $db->save($sql);
                foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
                session_regenerate_id(true);
                $_SESSION['payer'] = $invoice;
                header("Location:  ../error.php?error=Something went wrong. please  try again.");
            }
        }catch (\PayPal\Exception\PayPalConnectionException $ex) {
            $sql = "update cart set status='payment failed',paymentId='".$paymentId."',payer_id='".$payerId."', response_object='".serialize($result)."' , token='".$token."'  where invoice='".$invoice."' and session='".$session."'";
            $db->save($sql);
            foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
            session_regenerate_id(true);
            $_SESSION['payer'] = $invoice;
            header("Location:  ../error.php?error=Something went wrong. please  try again.");
        }  catch (Exception $exception) {
            $sql = "update cart set status='payment failed',paymentId='".$paymentId."',payer_id='".$payerId."', response_object='".serialize($result)."' , token='".$token."'   where invoice='".$invoice."' and session='".$session."'";
            $db->save($sql);
            foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
            session_regenerate_id(true);
            $_SESSION['payer'] = $invoice;
            header("Location:  ../error.php?error=Something went wrong. please  try again.");
        }
        break;
    case 'false':
        if(!isset($_SESSION)){
            session_start();
        }
        $db = new db_connect();
        if(isset($_GET['action'],$_GET['paymentId'],$_GET['PayerID'])){
            $invoice   = $_GET['invoice'];
            $session   = $_GET['session'];
            $token     = $_GET['token'];
            $sql = "update cart set status='payment failed', token='".$token."'  where invoice='".$invoice."' and session='".$session."'";
            $db->save($sql);
            foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
            session_regenerate_id(true);
            $_SESSION['payerId'] = $invoice;
                 header("Location: ../error.php?error=Something went wrong. please try again.");
        }
        if( $_GET['action'] === "false"){
            $invoice   = $_GET['invoice'];
            $session   = $_GET['session'];
            $token     = $_GET['token'];
            $sql = "update cart set status='payment failed', token='".$token."'  where invoice='".$invoice."' and session='".$session."'";
            $db->save($sql);
            foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
            session_regenerate_id(true);
            $_SESSION['payer'] = $invoice;
            header("Location:  ../error.php?error=Something went wrong. please  try again.");
        }
        break;
    case 'checkZip':
        if(isset($_REQUEST['q'])){
            $q = $_REQUEST['q'];
            $city = $_REQUEST['city'];
            $db = new db_connect();
            $sql = "Select * from us where zipcode=".$q." and city='".$city."'";
            $zipCode = $db->fetch($sql);
            if(count($zipCode)>0){
               echo "true";
            }else{
                echo "false";
            }
        }
        break;
    case 'checkout':
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['action'] = 'payment';
        $cart = new Cart();
        $cart = unserialize($_SESSION['cart']);
        $firstName = Util::escape($_REQUEST['firstname']);
        $lastname  = Util::escape($_REQUEST['lastname']);
        $phone     = Util::escape($_REQUEST['phone']);
        $email     = Util::escape($_REQUEST['email']);
        $address   = Util::escape($_REQUEST['address']);
        $state     = Util::escape($_REQUEST['state']);
        $city      = Util::escape($_REQUEST['city']);
        $zip       = Util::escape($_REQUEST['zip']);
        $action    = Util::escape($_REQUEST['action']);
        $cart[0]->setFirstName($firstName);
        $cart[0]->setLastName($lastname);
        $cart[0]->setPhone($phone);
        $cart[0]->setEmail($email);
        $cart[0]->setAddress($address);
        $cart[0]->setState($state);
        $cart[0]->setCity($city);
        $cart[0]->setZip($zip);
        //$fedex = new FedexWrapper();
         $ups = new UPSWrapper();
         $shippingTotal =  $ups->getShippingRate($cart);
        if($shippingTotal !=0){
            $cart[0]->setShippingCost($shippingTotal);
        }
    // ups call start
        // $ups = new UPSWrapper();
        // $shippingTotal =  $ups->getShippingRate($cart);
    // ups call end
        $_SESSION['cart'] = serialize($cart);
        header("Location: ../cartDetail.php");
        break;
    default:
        break;
}
?>