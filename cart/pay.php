<?php
require 'app/start.php';
if(!isset($_GET['success'],$_GET['paymentId'],$_GET['PayerID'])){
    die();
}
if((bool)$_GET['success'] === false){
    die();
}
$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];
$payment = \PayPal\Api\Payment::get($paymentId,$paypal);
$execute = new \PayPal\Api\PaymentExecution();
$execute->setPayerId($payerId);
try{
    $resull = $payment->execute($execute);
} catch (Exception $exception){
    die($execute);
}
echo "Payment Made. Thanks!";