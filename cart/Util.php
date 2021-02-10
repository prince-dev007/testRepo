<?php
include_once 'pojo/User.php';

class Util{
    function __construct(){

    }
    public static function getDomainURL(){
        if(!$_SERVER['HTTP_HOST']=='localhost'){
            return "http://localhost/dropbox/dashboard/";
        } else {
            return "http://localhost/dropbox/dashboard/";
        }
    }

    public static function escape($value) {
        $return = '';
        for($i = 0; $i < strlen($value); ++$i) {
            $char = $value[$i];
            $ord = ord($char);
            if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126)
                $return .= $char;
            else
                $return .= '\\x' . dechex($ord);
        }
        return $return;
    }

    public static function getClientIP() {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
           $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    public static  function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    public static function getToken($length=32){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        for($i=0;$i<$length;$i++){
            $token .= $codeAlphabet[Util::crypto_rand_secure(0,strlen($codeAlphabet))];
        }
        return $token;
    }

    public static function getProvide(){
        if(!isset($_SESSION)) {
            session_start();
        }
        $user = $_SESSION['user'];
        $user = $_SESSION['user'];
        $db = new db_connect();
        $sql = " Select distinct paymentmode from income_taxes ";

        if($user->getUserType() == $user->ADMIN) {
            $sql.= " where customer_id = ".$user->getAdminId() ." and paymentmode is not null" ;
        }else if($user->getUserType() == $user->STAFF){
            $sql.= " where customer_id = ".$user->getAdminId() ." and paymentmode is not null" ;
        }
        $sql.= " order by paymentmode  ";
        //     echo $sql;
        $region = $db->fetch($sql);
        $options="";
        for($i=0;$i<count($region);$i++){
            $options.="<option value='".$region[$i]['paymentmode']."'>".$region[$i]['paymentmode']."</options>";
        }
        return $options;
    }

    public static function getRegion(){
        if(!isset($_SESSION)) {
            session_start();
        }
        $user = $_SESSION['user'];
        $db = new db_connect();
        $sql = " Select distinct city from income_taxes ";

        if($user->getUserType() == $user->ADMIN) {
            $sql.= " where customer_id = ".$user->getAdminId(). " and city is not null";
        }else if($user->getUserType() == $user->STAFF){
            $sql.= " where customer_id = ".$user->getAdminId(). " and city is not null";
        }
        $sql.= " order by city  ";
   //     echo $sql;
        $region = $db->fetch($sql);
        $options="";
        for($i=0;$i<count($region);$i++){
            $options.="<option value='".$region[$i]['city']."'>".$region[$i]['city']."</options>";
        }
        return $options;
    }
    public static function getStatus(){
        return "<option value='PENDING'>PENDING</option><option value='CONFIRMED'>CONFIRMED</option>";
    }
}