<?php
require 'UPSRestAPI/vendor/autoload.php';
require 'Cart.php';
use Ups\Entity\RateResponse;

class UPSWrapper{
    var $accessKey = "DD8D73467CEF1D12";
    var $userId    = "Startoveragain1";
    var $password  = "Getmyworkdone1";

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
        $this->shipperNumber= $data[0]['shipper_number'];
        $this->addressLine= $data[0]['addressline'];
        $this->zipCode= $data[0]['zipcode'];
        $this->city= $data[0]['city'];
        $this->state= $data[0]['state'];
        $this->country= $data[0]['country'];
        $this->phone= $data[0]['phone'];

    }
    function getShippingRate($cart){
        $shippingCost = 0;
        $rate = new Ups\Rate(
            $this->accessKey,
            $this->userId,
            $this->password
        );
        try  {
            $shipment = new \Ups\Entity\Shipment();
            $shipperAddress = $shipment->getShipper()->getAddress();
            $shipperAddress->setPostalCode( $this->zipCode);
            $address = new \Ups\Entity\Address();
            $address->setPostalCode( $this->zipCode);
            $shipFrom = new \Ups\Entity\ShipFrom();
            $shipFrom->setAddress($address);
            $shipment->setShipFrom($shipFrom);
            $shipTo = $shipment->getShipTo();
            $shipTo->setCompanyName($cart[0]->getFirstName()." ".$cart[0]->getLastName());
            $shipToAddress = $shipTo->getAddress();
            $shipToAddress->setPostalCode($cart[0]->getZip());
            $service = new \Ups\Entity\Service;
            $service->setCode(\Ups\Entity\Service::S_GROUND);
            $service->setDescription($service->getName());
            $shipment->setService($service);
            $package = new \Ups\Entity\Package();
            foreach($cart as $productItem){
                $package->getPackagingType()->setCode(\Ups\Entity\PackagingType::PT_PACKAGE);
                $package->getPackageWeight()->setWeight($productItem->getWeight());

                // if you need this (depends of the shipper country)
                $weightUnit = new \Ups\Entity\UnitOfMeasurement;
                $weightUnit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_LBS);
                $package->getPackageWeight()->setUnitOfMeasurement($weightUnit);

                $dimensions = new \Ups\Entity\Dimensions();
                $dimensions->setHeight($productItem->getHeight());
                $dimensions->setWidth( $productItem->getWidth());
                $dimensions->setLength($productItem->getWidth());

                $unit = new \Ups\Entity\UnitOfMeasurement;
                $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_IN);
                $dimensions->setUnitOfMeasurement($unit);
                $package->setDimensions($dimensions);
                $shipment->addPackage($package);
            }
           // echo "<pre>";
          //  print_r($rate->getRate($shipment));
            $shippingCost = $rate->getRate($shipment)->RatedShipment[0]->TotalCharges->MonetaryValue;
        } catch (Exception $e) {
            $shippingCost = 0;
            return $shippingCost;
            var_dump($e);
        }
        return $shippingCost ;
    }
    function shippingRequest($cart){
        $shipment = new Ups\Entity\Shipment;
// Set shipper
        $shipper = $shipment->getShipper();
        $shipper->setShipperNumber($this->shipperNumber);
        $shipper->setName($this->name);
        $shipper->setAttentionName($this->name);
        $shipperAddress = $shipper->getAddress();
        $shipperAddress->setAddressLine1($this->addressLine);
        $shipperAddress->setPostalCode($this->zipCode);
        $shipperAddress->setCity($this->city);
        $shipperAddress->setStateProvinceCode($this->state); // required in US
        $shipperAddress->setCountryCode($this->country);
        $shipper->setAddress($shipperAddress);
        $shipper->setEmailAddress('principalmedia@bellsouth.net');
        $shipper->setPhoneNumber('9542109614');
        $shipment->setShipper($shipper);

// To address
      //  $cart[0] = new Cart();
        $address = new \Ups\Entity\Address();
        $address->setAddressLine1($cart[0]->getFirstName()." ".$cart[0]->getLastName());
        $address->setPostalCode($cart[0]->getZip());
        $address->setCity($cart[0]->getCity());
        $address->setStateProvinceCode($cart[0]->getState());  // Required in US
        $address->setCountryCode($cart[0]->getCountry());
        $shipTo = new \Ups\Entity\ShipTo();
        $shipTo->setAddress($address);
        $shipTo->setCompanyName($cart[0]->getFirstName()." ".$cart[0]->getLastName());
        $shipTo->setAttentionName($cart[0]->getFirstName()." ".$cart[0]->getLastName());
        $shipTo->setEmailAddress($cart[0]->getEmail());
        $shipTo->setPhoneNumber($cart[0]->getPhone());
        $shipment->setShipTo($shipTo);

// From address
        $address = new \Ups\Entity\Address();
        $address->setAddressLine1($this->addressLine);
        $address->setPostalCode($this->zipCode);
        $address->setCity($this->city);
        $address->setStateProvinceCode($this->state);
        $address->setCountryCode($this->country);
        $shipFrom = new \Ups\Entity\ShipFrom();
        $shipFrom->setAddress($address);
        $shipFrom->setName($this->name);
        $shipFrom->setAttentionName($shipFrom->getName());
        $shipFrom->setCompanyName($shipFrom->getName());
        $shipFrom->setEmailAddress('principalmedia@bellsouth.net');
        $shipFrom->setPhoneNumber('9542109614');
        $shipment->setShipFrom($shipFrom);

// Sold to
        $address = new \Ups\Entity\Address();
        $address->setAddressLine1($cart[0]->getAddress());
        $address->setPostalCode($cart[0]->getZip());
        $address->setCity($cart[0]->getCity());
        $address->setCountryCode($cart[0]->getCountry());
        $address->setStateProvinceCode($cart[0]->getState());
        $soldTo = new \Ups\Entity\SoldTo;
        $soldTo->setAddress($address);
        $soldTo->setAttentionName($cart[0]->getFirstName()." ".$cart[0]->getLastName());
        $soldTo->setCompanyName($soldTo->getAttentionName());
        $soldTo->setEmailAddress($cart[0]->getEmail());
        $soldTo->setPhoneNumber($cart[0]->getPhone());
        $shipment->setSoldTo($soldTo);

// Set service
        $service = new \Ups\Entity\Service;
        $service->setCode(\Ups\Entity\Service::S_GROUND);
        $service->setDescription($service->getName());
        $shipment->setService($service);

// Mark as a return (if return)
        /*if ($return) {
            $returnService = new \Ups\Entity\ReturnService;
            $returnService->setCode(\Ups\Entity\ReturnService::PRINT_RETURN_LABEL_PRL);
            $shipment->setReturnService($returnService);
        }*/

// Set description
        $shipment->setDescription('XX');

// Add Package
        $package = new \Ups\Entity\Package();
        foreach($cart as $productItem) {
            $package->getPackagingType()->setCode(\Ups\Entity\PackagingType::PT_PACKAGE);
            $package->getPackageWeight()->setWeight($productItem->getWeight());
            $unit = new \Ups\Entity\UnitOfMeasurement;
            $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_LBS);
            $package->getPackageWeight()->setUnitOfMeasurement($unit);
            $packageServiceOptions = new \Ups\Entity\PackageServiceOptions();
            $packageServiceOptions->setShipperReleaseIndicator(true);
            $package->setPackageServiceOptions($packageServiceOptions);
            $dimensions = new \Ups\Entity\Dimensions();
            $dimensions->setHeight($productItem->getHeight());
            $dimensions->setWidth($productItem->getWidth());
            $dimensions->setLength($productItem->getWidth());
            $unit = new \Ups\Entity\UnitOfMeasurement;
            $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_IN);
            $dimensions->setUnitOfMeasurement($unit);
            $package->setDimensions($dimensions);
            $package->setDescription('XX');
            $shipment->addPackage($package);
        }
// Set Reference Number
        /*$referenceNumber = new \Ups\Entity\ReferenceNumber;
        if ($return) {
            $referenceNumber->setCode(\Ups\Entity\ReferenceNumber::CODE_RETURN_AUTHORIZATION_NUMBER);
            $referenceNumber->setValue($return_id);
        } else {
            $referenceNumber->setCode(\Ups\Entity\ReferenceNumber::CODE_INVOICE_NUMBER);
            $referenceNumber->setValue($order_id);
        }
        $shipment->setReferenceNumber($referenceNumber);
        */
// Set payment information
        $shipment->setPaymentInformation(new \Ups\Entity\PaymentInformation('prepaid', (object)array('AccountNumber' => '9438FW')));

// Ask for negotiated rates (optional)
        $rateInformation = new \Ups\Entity\RateInformation;
        $rateInformation->setNegotiatedRatesIndicator(1);
        $shipment->setRateInformation($rateInformation);
// Get shipment info
        $shippingInformation = array();
        try {
            $accessKey = "DD8D73467CEF1D12";
            $userId    = "Startoveragain1";
            $password  = "Getmyworkdone1";
            $api = new Ups\Shipping($accessKey, $userId, $password);
            $confirm = $api->confirm(\Ups\Shipping::REQ_VALIDATE, $shipment);
       /*     echo "<pre>";
            print_r($confirm);*/ // Confirm holds the digest you need to accept the result
            if ($confirm) {
                $accept = $api->accept($confirm->ShipmentDigest);
  //              echo             $accept->ShipmentIdentificationNumber;
                $shippingInformation['ShipmentIdentificationNumber'] = $accept->ShipmentIdentificationNumber;
            //    echo $accept->PackageResults->LabelImage->GraphicImage;
                $shippingInformation['GraphicImage'] =  $accept->PackageResults->LabelImage->GraphicImage;
          //      var_dump($accept); // Accept holds the label and additional information
                return $shippingInformation;
            }
        } catch (\Exception $e) {
         //   return $shippingInformation;
            var_dump($e);
        }
    }
}