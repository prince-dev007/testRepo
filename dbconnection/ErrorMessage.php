<?php
class ErrorMessage{
    var $success = "success";
    var $info    = "info";
    var $warning = "warning ";
    var $danger  = "danger";
    public $message;
    public $messageType;
    
    public function getMessage(){
        if($this->getMessageType()!=null){
            return "<div class='alert alert-".$this->getMessageType()."'>".$this->message."<strong></strong></div>";
        }
        return "";
    }
    public function getMessageType(){
        return $this->messageType;
    }

    public function setMessage($message){
        $this->message = $message;
   }

    public function setMessageType($messageType){
        $this->messageType = $messageType;
    }
    public function setMessageSession(){
        $_SESSION['message'] =$this;
    }

}