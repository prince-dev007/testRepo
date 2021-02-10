<?php
include_once '../dbconnection/dbConnection.php';
include_once 'mail/EmailUtil.php';
class User{
    var $username; //username or email
    var $firstname;
    var $lastname;
    var $phone;
    var $ip;
    var $ctimestamp;
    var $status;  //0 In Active , 1 Active,  2
    var $token;
    var $password;
    var $active = 1;
    var $inActive = 0;
    var $notVerified = 2;
    var $bloocked = 3;

    function __construct(){

    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getCtimestamp()
    {
        return $this->ctimestamp;
    }

    /**
     * @param mixed $ctimestamp
     */
    public function setCtimestamp($ctimestamp)
    {
        $this->ctimestamp = $ctimestamp;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    public function validateUser(){
        $error = null;
        if(empty($this->firstname)){
            $error['firstname'] = "First Name can not be blank";
        }
        if(empty($this->lastname)){
            $error['lastname'] = "Last Name can not be blank";
        }
        if(empty($this->username)){
            $error['username'] = "Email can not be blank";
        }
        if(!empty($this->username)){
            if (!filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
                $error['username'] = "Invalid email format";
            }else{
                if($this->checkUserName()!=null){
                    $error =  array_merge($error,$this->checkUserName());
                }
            }
        }
        if(empty($this->phone)){
            $error['phone'] = "phone can not be blank";
        }
        return $error;
    }

    public function save(){
        $error = null;
        $sql = "insert into users(username,firstname,lastname,phone,ip,status,token) values(";
        $sql .="'".$this->getUsername()."',";
        $sql .="'".$this->getFirstname()."',";
        $sql .="'".$this->getLastname()."',";
        $sql .="'".$this->getPhone()."',";
        $sql .="'".$this->getIp()."',";
        $sql .="'".$this->getStatus()."',";
        $sql .="'".$this->getToken()."')";
        $db = new db_connect();
        $db->save($sql);
        $verificationLink = Util::getDomainURL()."cart/UserController.php?action=verification&token=".$this->getToken();
        $email = new EmailUtil();
        $email->setToAddress($this->getUsername());
        $email->setSubject("The Roof Store Account - Verify Your Email")    ;
        $body = "Dear ".$this->getFirstname().",<br><br>";
        $body.= "Thank you for registering on ".$email->getCompyName(). "Please verify your email on click on below button to start shopping with us.<br><br><br>";
        $body.= "<a href='".$verificationLink."' style='background-color: #ff5e56;color: #FFFFFF; padding: 10px 10px 10px 10px;'>Verify Email</a>";
        $email->setEmailBody($body);
        $email->send();
        $error['message']="please check your email - we have sent a confirmation message";
        return $error;
    }
    public function forgotPassword(){

    }
    public function verified(){
        $error = null;
        $db = new  db_connect();
        $sql = "Select * from users where token='".$this->getToken()."' and status=".$this->notVerified;
        $user = $db->fetch($sql);
        if(count($user)==1){
            $sql = "update users set status=".$this->active." where token='".$this->getToken()."'";
            $db->save($sql);
            return "true";

            //$error['message'] = "Your email verified successfully, please login with your credential";
        }else{
            return "false";
           // $error['message']="Something went wrong. please drop us email with registered email id.";
        }
    }
    public function login(){

    }
    public function checkUserName(){
        $error = null;
        $db = new db_connect();
        $sql = "Select * from users where username='".$this->getUsername()."'";
       // echo $sql;
        $user = $db->fetch($sql);
        if(count($user)>0){
            $error['message'] = "Your email id is already registered with us.";
        }
        return $error;
    }
}