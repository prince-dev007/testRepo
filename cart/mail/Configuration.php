<?php
class Configuration
{
    private $apiKey      = "";
    private $secretKey   = "";
    private $fromAddress = "dgodhani@chronextechnologies.com";
    private $toAddress   = "dgodhani@chronextechnologies.com";
    private $host        = "mail.chronextechnologies.com";
    private $port        = "587";
    private $user        = "dgodhani@chronextechnologies.com";
    private $password    = "aC_X=w_3SVn.";
    private $fromFirstName;
    private $fromLastName;
    private $fromName;

    private $title = "The Roof Store";
    private $companyName="The Roof Store";
    private $address = "";
    private $footer;
    private $url = "http://chronextechnologies.com/theroofstore-online";
    private $logo = "new/logo.png";

    private $facebook = "a";
    private $twitter  = "a";
    private $linkedin = "a";
     /* @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @return string
     */
    public function getFromAddress()
    {
        return $this->fromAddress;
    }

    /**
     * @return string
     */
    public function getToAddress()
    {
        return $this->toAddress;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getFromName()
    {
      //  $this->fromName = $this-> fromFirstName +" "+$this->fromLastName;
        return $this->fromName;
    }

    /**
     * @return mixed
     */
    public function getFromFirstName()
    {
        return $this->fromFirstName;
    }

    /**
     * @return mixed
     */
    public function getFromLastName()
    {
        return $this->fromLastName;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        if(!$_SERVER['HTTP_HOST']=='localhost'){
            return "http://localhost/dropbox/mothership/images";
        } else {
            return $this->url;
        }
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

 }