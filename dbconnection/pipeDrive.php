<?php
    function getPipeDrive($api){
        $api_token = 'd0cace5b73600aaf0309a64ac837e72e74a4827a';
        $url = 'https://companydomain.pipedrive.com/v1/'.$api.'?api_token=' . $api_token;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $output = curl_exec($ch);
        if($errno = curl_errno($ch)) {
            $error_message = curl_strerror($errno);
            echo "cURL error ({$errno}):\n {$error_message}";
        }
        curl_close($ch);
        $result = json_decode($output, true);
        return  $result ;
    }
?>