<?php
include_once 'Configuration.php';
include_once '../cart/Cart.php';

class EmailUtil
{
    private $fromAddress;
    private $toAddress;
    private $host;
    private $port;
    private $user;
    private $password;
    private $emailBody;
    private $subject;
    private $fromName;
    private $logo;
    private $title;
    private $compyName;
    private $address;
    private $attachment;

    private $facebook;
    private $twitter;
    private $linkedin;
    private $url;
    private $debugMode;
    public function __construct()
    {
        $conf = new Configuration();
        $this->fromAddress = $conf->getFromAddress();
        $this->toAddress = $conf->getToAddress();
        $this->host = $conf->getHost();
        $this->port = $conf->getPort();
        $this->user = $conf->getUser();
        $this->password = $conf->getPassword();
        $this->fromName = $conf->getFromName();
        $this->url      = $conf->getUrl();
        $this->logo     = $conf->getLogo();
        $this->title    = $conf->getTitle();
        $this->compyName = $conf->getCompanyName();
        $this->address   = $conf->getAddress();
        $this->facebook = $conf->getFacebook();
        $this->twitter = $conf->getTwitter();
        $this->linkedin = $conf->getLinkedin();
        $this->debugMode = 0;
    }

    /**
     * @return int
     */
    public function getDebugMode()
    {
        return $this->debugMode;
    }

    /**
     * @param int $debugMode
     */
    public function setDebugMode($debugMode)
    {
        $this->debugMode = $debugMode;
    }

    /**
     * @return mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param mixed $attachment
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * @return mixed
     */
    public function getFromAddress()
    {
        return $this->fromAddress;
    }

    /**
     * @param mixed $fromAddress
     */
    public function setFromAddress($fromAddress)
    {
        $this->fromAddress = $fromAddress;
    }

    /**
     * @return mixed
     */
    public function getToAddress()
    {
        return $this->toAddress;
    }

    /**
     * @param mixed $toAddress
     */
    public function setToAddress($toAddress)
    {
        $this->toAddress = $toAddress;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmailBody()
    {
        return $this->emailBody;
    }

    /**
     * @param mixed $emailBody
     */
    public function setEmailBody($emailBody)
    {
        $this->emailBody = $emailBody;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * @param mixed $fromName
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getCompyName()
    {
        return $this->compyName;
    }

    /**
     * @param string $compyName
     */
    public function setCompyName($compyName)
    {
        $this->compyName = $compyName;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param mixed $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return mixed
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param mixed $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return mixed
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @param mixed $linkedin
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }

    public function send($cart, $isInvoice){
        require_once 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug =0;
        $mail->Debugoutput = 'html';
        $mail->Host = $this->getHost();
        $mail->Port = $this->getPort();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->IsHTML(true);
        $mail->Username = $this->getUser();
        $mail->Password = $this->getPassword();
        $mail->setFrom($this->getFromAddress(), $this->getFromName());
        $to = $this->getToAddress();
        if (is_array($to)) {
            for ($i = 0; $i < count($to); $i++) {
                $mail->addAddress($to[$i], "");
            }
        } else {
            $mail->addAddress($this->getToAddress(), "");
        }
        $mail->Subject = $this->getSubject();
        $currentBody = "Please find attached label for invoice : ".$cart[0]->getInvoice();
        if($isInvoice == true) {
            $mail->Body = $this->generateInvoice($cart);
        }else{
            $mail->Body = $currentBody;
        }
        if(!empty($this->getAttachment())){
/*
            $imageData = base64_decode($a);
            $source = imagecreatefromstring($imageData);
            $rotate = imagerotate($source, 270, 0); // if want to rotate the image
            $imageSave = imagejpeg($rotate ,"aa.jpeg",100);*/
            $contact_image_data="data:image/png;base64,".$this->getAttachment();
            $data = substr($contact_image_data, strpos($contact_image_data, ","));
            $filename="label.png";
            $encoding = "base64";
            $type = "image/gif";
            $mail->AddStringAttachment(base64_decode($data), $filename, $encoding, $type);
        }
    //    echo $this->generateInvoice($cart);
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
    private function generateInvoice($cart){
     //   print_r($cart);
        $fp = fopen("mail/invoice.html", 'rb');
        $template = fread($fp, 99999999  );
        fclose($fp);
        $template = str_replace("{__CUSTOMER_NAME__}",$cart[0]->getFirstName(). " ".$cart[0]->getLastName(),$template);
        $template = str_replace("{__ADDRESS__}",$cart[0]->getAddress(),$template);
        $template = str_replace("{__EMAIL__}",$cart[0]->getEmail(),$template);
        $template = str_replace("{__INVOICE__}",$cart[0]->getInvoice(),$template);
        $template = str_replace("{__DATE__}",date("m/d/Y"),$template,$template);
        $template = str_replace("{__PRODUCTLIST__}",$this->getProductList($cart),$template);
 //       $template = str_replace("{__NOTICE__}",$this->getUrl(),$template);
        $template = str_replace("{__URL__}",$this->getUrl(),$template);

        //$template = str_replace("__TITLE__",$this->getTitle(),$template);
        //$template = str_replace("__LOGO__",$this->getLogo(),$template);
        //$template = str_replace("__COMPANY_NAME__",$this->getCompyName(),$template);
        //$template = str_replace("__ADDRESS__",$this->getAddress(),$template);
        // $template = str_replace("__images__","http://www.thinqtanklearning.com/images",$template);
        //$template = str_replace("__BODY__",$this->getEmailBody(),$template);
        return $template;
    }
    private function getProductList($cart){
        $item="<tbody>";
        $i=1;
        $subTotal      = 0;
        $shippingTotal = 0;
        $total         = 0;
        foreach($cart as $product){
            $item.="<tr>";
            $item.="    <td class='no'>".$i++."</td>";
            $item.="    <td class='desc'><h3>".$product->getProductName()."</h3></td>";
            $item.="    <td class='unit'>$".$product->getPrice()."</td>";
            $item.="    <td class='qty'>".$product->getQty()."</td>";
            $item.="    <td class='total'>$".($product->getPrice()*$product->getQty())."</td>";
            $item.="</tr>";
            $shippingTotal =  $cart[0]->getShippingCost() ;
            $subTotal = $subTotal + ($product->getPrice() * $product->getQty());
        }
        $total = $subTotal + $shippingTotal;
        $item.="</tbody>";
        $item.="<tfoot>";
        $item.="    <tr>";
        $item.="        <td colspan='2'></td>";
        $item.="        <td colspan='2'>SUBTOTAL</td>";
        $item.="        <td>$".$subTotal."</td>";
        $item.="    </tr>";
       $item.="    <tr>";
        $item.="         <td colspan='2'></td>";
        $item.="         <td colspan='2'>Shipping</td>";
        $item.="         <td>$".$shippingTotal."</td>";
        $item.="    </tr>";
        $item.="    <tr>";
        $item.="        <td colspan='2'></td>";
        $item.="        <td colspan='2'>GRAND TOTAL</td>";
        $item.="        <td>$".$total."</td>";
        $item.="    </tr>";
        $item.="</tfoot>";
        return $item;
    }
}