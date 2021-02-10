<?php 

include_once('Config/Config.php');
include_once('Helpers/PayPalHelper.php');


$paypalHelper = new PayPalHelper;
$randNo= (string)rand(10000,20000);
$orderData = '{
            "id" = "'.$randNo.'",
            "intent" : "CAPTURE",
            "application_context" : {
                "return_url" : "cart.php",
                "cancel_url" : "cancel.php"
            },
            "purchase_units" : [ 
                {
                    "reference_id" : "PU1",
                    "description" : "Camera Shop",
                    "invoice_id" : "INV-CameraShop-'.$randNo.'",
                    "custom_id" : "CUST-CameraShop",
                    "amount" : {
                        "currency_code" : "USD",
                        "value" : "600",
                        "breakdown" : {
                            "item_total" : {
                                "currency_code" : "USD",
                                "value" : "100"
                            },
                            "shipping" : {
                                "currency_code" : "USD",
                                "value" : "100"
                            },
                            "tax_total" : {
                                "currency_code" : "USD",
                                "value" : "100"
                            },
                            "handling" : {
                                "currency_code" : "USD",
                                "value" : "100"
                            },
                            "shipping_discount" : {
                                 "currency_code" : "USD",
                                "value" : "100"
                            },
                            "insurance" : {
                               "currency_code" : "USD",
                                "value" : "100"
                            }
                        }
                    },
                    "items" : [{
                        "name" : "DSLR Camera",
                        "description" : "Black Camera - Digital SLR",
                        "sku" : "sku01",
                        "unit_amount" : {
                            "currency_code" : "USD",
                            "value" : "600"
                        },
                        "quantity" : "1",
                        "category" : "PHYSICAL_GOODS"
                    }]
                }
            ]
        }';

  if(array_key_exists('shipping_country_code', $_POST)) {

$orderDataArr = json_decode($orderData, true);
$orderDataArr['application_context']['shipping_preference'] = "SET_PROVIDED_ADDRESS";
$orderDataArr['application_context']['user_action'] = "PAY_NOW";

$orderDataArr['purchase_units'][0]['shipping']['address']['address_line_1']= "Pune";
$orderDataArr['purchase_units'][0]['shipping']['address']['address_line_2']= "Pune";
$orderDataArr['purchase_units'][0]['shipping']['address']['admin_area_2']="Pune";
$orderDataArr['purchase_units'][0]['shipping']['address']['admin_area_1']= "Pune";
$orderDataArr['purchase_units'][0]['shipping']['address']['postal_code']= "361221";
$orderDataArr['purchase_units'][0]['shipping']['address']['country_code']= "IND";

$orderData = json_encode($orderDataArr);
}
echo $orderData;
header('Content-Type: application/json');
echo json_encode($paypalHelper->orderCreate($orderData));