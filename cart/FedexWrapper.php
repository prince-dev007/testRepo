<?php

class FedexWrapper{
    var $accessKey = '6c72a421-023a-461b-acb6-318cc8187570';
    var $name1;
    var $shipperNumber;
    var $addressLine;
    var $zipCode;
    var $city;
    var $state;
    var $country;
    var $phone;
    function __construct(){
        $db =new  db_connect();
        $sql = "Select * from address";
        $data = $db->fetch($sql);
        $this->name = $data[0]['name'];
        $this->shipperNumber = $data[0]['shipper_number'];
        $this->addressLine= $data[0]['addressline'];
        $this->zipCode= $data[0]['zipcode'];
        $this->city= $data[0]['city'];
        $this->state= $data[0]['state'];
        $this->country= $data[0]['country'];
        $this->phone= $data[0]['phone'];
    }
    public function getShippingRate($cart){
        $shippingCost = 0;
        try { 
            $url = 'https://sandbox-api.postmen.com/v3/rates';
            $method = 'POST';
            $headers = array(
                "content-type: application/json",
                "postmen-api-key: ".$this->accessKey,
            );
            $body = '{
                "async": false,
                "shipper_accounts": [
                {
                    "id": "6f43fe77-b056-45c3-bce4-9fec4040da0c"
                }
                ],
                "is_document": false,
                "shipment": {
                "ship_from": {
                    "contact_name": "'. $this->name.'",
                    "company_name": "[FedEx] Testing Company",
                    "street1": "'. $this->addressLine.'",
                    "country": "'. $this->country.'",
                    "type": "business",
                    "postal_code": "'. $this->zipCode.'",
                    "city": "'. $this->city.'",
                    "phone": "'. $this->phone.'",
                    "street2": "Hull",
                    "tax_id": null,
                    "street3": null,
                    "state": "'. $this->state.'",
                    "email": "fedex@test.com",
                    "fax": null
                },
                "ship_to": {
                    "contact_name": "'.$cart[0]->getFirstName()." ".$cart[0]->getLastName().'",
                    "phone": "'.$cart[0]->getPhone().'",
                    "email": "'.$cart[0]->getEmail().'",
                    "street1": "'.$cart[0]->getAddress().'",
                    "city": "'.$cart[0]->getCity().'",
                    "postal_code": "'.$cart[0]->getZip().'",
                    "state": "'.$cart[0]->getState().'",
                    "country": "USA",
                    "type": "residential"
                },
                "parcels": [';
                foreach($cart as $productItem) {
                    $body .= '{
                        "description": "'.$productItem->getProductName().'",
                        "box_type": "custom",
                        "weight": {
                        "value": '.$productItem->getWeight().',
                        "unit": "kg"
                        },
                        "dimension": {
                        "width": '.$productItem->getWidth().',
                        "height": '.$productItem->getHeight().',
                        "depth": '.$productItem->getHeight().',
                        "unit": "cm"
                        },
                        "items": [
                        {
                            "description": "'.$productItem->getProductName().'",
                            "origin_country": "USA",
                            "quantity": '.$productItem->getQty().',
                            "price": {
                            "amount": '.$productItem->getPrice().',
                            "currency": "USD"
                            },
                            "weight": {
                            "value": '.$productItem->getWeight().',
                            "unit": "kg"
                            },
                            "sku": "imac2014"
                        }
                        ]
                    }';
                }
                $body .='
                ]
                }
            }';
        
            $curl = curl_init();
        
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_URL => $url,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POSTFIELDS => $body
            ));
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                // echo $response;
            }
            $resObj = json_decode($response);
            $ratesArr = $resObj->data->rates;
            if(count($ratesArr) > 0) {
                $shippingCost = $ratesArr[0]->total_charge->amount;
            }
        } catch(\Throwable $e) {
            echo $e->getMessage();
            
        }
        return $shippingCost;
    }
}


?>