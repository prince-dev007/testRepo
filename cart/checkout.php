<?php

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
require 'app/start.php';

if(!isset($_POST['product'],$_POST['price'])){
    die();
}
$product = $_POST['product'];
$price = (float) $_POST['price'];
$shipping = 2;
$total = $price + $shipping;
$payer = new Payer();
$payer->setPaymentMethod('paypal');
$item = new Item();
$item->setName($product)
    ->setCurrency('INR')
    ->setQuantity(1)
    ->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]);
$details = new Details();
$details->setShipping($shipping)
        ->setSubtotal($price);
$amount = new Amount();
$amount->setCurrency('INR')
        ->setTotal($total)
        ->setDetails($details);
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('The Roof Store Payment')
    ->setInvoiceNumber(uniqid());
$redirectUrsl = new \PayPal\Api\RedirectUrls();
$redirectUrsl->setReturnUrl(SITE_URL.'/pay.php?success=true')
    ->setCancelUrl(SITE_URL.'/pay.php?success=false');

$payment = new \PayPal\Api\Payment();
$payment->setIntent('Sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrsl)
    ->setTransactions([$transaction]);

try{
    $payment->create($paypal);
}catch (Exception $e){
    die($e);
}
$approvalUrl = $payment->getApprovalLink();
header("Location: {$approvalUrl}");




