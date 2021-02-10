<?php
    include_once "../cart/pojo/User.php";
    include_once "../cart/Util.php";
    $action  = $_REQUEST['action'];
    switch ($action){
        case 'checkUser':
            $user = new User();
            $userName = Util::escape( $_POST['username']);
            $user->setUsername($userName);
            $error = $user ->checkUserName();
            if($error !=null) {
                echo json_encode($error);
            }
        break;
        case 'register':
            $user = new User();
            $user->setFirstname(Util::escape($_POST['firstname']));
            $user->setLastname(Util::escape($_POST['lastname']));
            $user->setUsername(Util::escape($_POST['email']));
            $user->setPhone(Util::escape($_POST['phone']));
            $user->setIp(Util::getClientIP());
            $user->setStatus($user->notVerified);
            $user->setToken(Util::getToken());
            $error = $user->validateUser();
            if($error!=null){
                echo  json_encode($error);
            }else{
                echo json_encode($user->save());
            }
        break;
        case 'login':
        break;
        case 'verification':
            $user = new User();
            $token = Util::escape($_GET['token']);
            $user->setToken($token);
            $error = $user->verified();
            if($error=="true"){
                $error['message'] = "Your email verified successfully, please login with your credential";
            }else {
                $error['message']="Something went wrong. please drop us email with registered email id.";
            }
        default:
        break;
    }
?>