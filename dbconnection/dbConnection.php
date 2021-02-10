<?php include_once 'ErrorMessage.php';?>
<?php include_once 'Item.php';?>
<?php
class db_connect {
	var $db;

	function __construct() {
	   if($_SERVER["SERVER_NAME"]=='127.0.0.1' || $_SERVER["SERVER_NAME"] == 'localhost'){
		   $this->db = mysqli_connect ('localhost', 'root', 'root','rlyjwjov_shopping') or die ("unable to connect to database server");
           ////    $this->db = mysqli_connect ('localhost', 'hacinfot_dashboa', 'c@.J&BM}os(4','hacinfot_dashboard') or die ("unable to connect to database server");
// db hacinfot_theroofstore
// pass S+dwd7xNDnF;
// user hacinfot_theroof

       }else{
   $this->db = mysqli_connect ('localhost', 'rlyjwjov_shopping', 'SumPqWUz8W*x','rlyjwjov_shopping') or die ("unable to connect to database server");
    //       $this->db = mysqli_connect ('localhost', 'hacinfot_theroof', 'S+dwd7xNDnF;','hacinfot_theroofstore') or die ("unable to connect to database server");
	       //hacinfot_dashboard   // c@.J&BM}os(4  ////hacinfot_dashboa
		//    $this->db = mysqli_connect ('localhost', 'hacinfot_dashboa', 'c@.J&BM}os(4','hacinfot_dashboard') or die ("unable to connect to database server");
		}
	}

    function query($sql) {

          $result = mysqli_query($this->db,$sql) or die ("invalid query: ");
          return $result;
    }
    function fetch($sql) {

        $data = array();
        $result = $this->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function fetch_array($sql) {
        return mysql_fetch_array($this->query($sql));
    }

    function getone($sql) {
        $result = $this->query($sql);
        if (mysql_num_rows($result) == 0)
            $value = false;
        else
            $value = mysql_result($result, 0);
        return $value;
    }
    
    function getOneRow($sql){ // need change here
        $data = array();
        $result = $this->query($sql);
        $row = mysql_fetch_array($result);
        $data[] = $row[0];
        return $data;
    }

    function save($sql) {
    	if(!empty($sql)){
    		mysqli_query($this->db,$sql) or die("invalid query: ");
    		return mysqli_insert_id($this->db);
    	}
    }
    
    function getCount($sql){
        $data;
        $result = $this->query($sql);
        $row = mysql_fetch_array($result);
        $data =   $row[0];
        return $data;
    }
    
    function mmddyyyy($dateOld) {
        $explode=explode("-",$dateOld);
        $new_date=$explode[1]."/".$explode[2]."/".$explode[0];
        return $new_date;
    }
    
    function yyyymmdd($dateOld) {
    	$explode=explode("/",$dateOld);
    	$new_date=$explode[2]."-".$explode[0]."-".$explode[1];
        return $new_date;
    }
        
    function ddmmyyyy($dateOld) {
    	if(!empty($dateOld)){
    		return date("d/m/Y", strtotime($dateOld));
    	} else {
    		return ;
    	}
    }
    
    function verifyEmail($email){
    	$email = $this->fetch("Select count(id) AS cnt from users where username='".$email."'");
    //	$result;
    	if(intval($email[0]['cnt'])>0){
    		return true;
    	}else{
    		return false;
    	}
    }
    
	function close(){
		if(isset($this->db)){
			mysql_close($this->db);
		}
	}
    /***
     * 
     * for display limited string
     */
    function limit_words($string, $word_limit){
    	$words = explode(" ",$string);
    	return implode(" ", array_splice($words, 0, $word_limit));
    }
    
	function create_slug($string, $ext='.html'){
		$string = strtolower($string);//convert the string to lowercase
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);//strip non alpha-numeric characters
		$string = preg_replace("/[\s-]+/", " ", $string);//remove multiple dashes or whitespaces
		$string = preg_replace("/[\s_]/", "-", $string);//transform whitespaces and underscore to dash
		return $string.$ext;
	}
	
	function select($sql){
		$data = $this->fetch($sql);
		$select = htmlentities('<option value="0">no record found</option>');
		if(count($data)>0){
			for($i=0;$i<count($data);$i++){
				$select.= htmlentities("<option value='".$data[$i]['id']."'>".$data[$i]['name']."</option>");
			}
		}
		return $select;
	}
	
	function selectWithId($sql,$selectedId){
		$data = $this->fetch($sql);
		$select = "<option value='0'>Select</option>";
		if(count($data)>0){
			for($i=0;$i<count($data);$i++){
				$selelected ="";
				if($selectedId == $data[$i]['id']){
					$selelected = "selected ='selected'";
				}
				$select.= "<option ".$selelected." value='".$data[$i]['id']."'>".$data[$i]['name']."</option>";
			}
		}else{
            $select = "<option value='0'>no record found</option>";
        }
		return $select ;
	}

    function isExist($sql){
        $data = $this->fetch($sql);
        if(count($data) > 0){
            return true;
        }else {
            return false;
        }
    }

	function selectBox($tableName,$selectedId,$selectBoxName){
		$selectBox = "";
		$selectBox = "<select  class='form-control' id=".$selectBoxName." name=".$selectBoxName.">";			
		$selectBox .= "<option value='-1'>Select ".$tableName."</option>";
		$data = $this->fetch("Select * from ".$tableName);
		for($i=0;$i<count($data);$i++){
			if($selectedId==$data[$i]['id']){
				$selectBox .= "<option  selected='selected' value=".$data[$i]['id'].">".$data[$i]['name']."</option>";
			}else{
				$selectBox .= "<option value=".$data[$i]['id'].">".$data[$i]['name']."</option>";
			}
		}
		
		return  $selectBox."</select>";
	}
	
	function selectBoxByQuery($name,$query,$selectedId,$selectBoxName){
		$selectBox = "";
		$selectBox = "<select  class='form-control' id=".$selectBoxName." name=".$selectBoxName.">";
		$selectBox .= "<option value='-1'>Select ".$name."</option>";
		$data = $this->fetch($query);
		for($i=0;$i<count($data);$i++){
			if($selectedId==$data[$i]['id']){
				$selectBox .= "<option  selected='selected' value=".$data[$i]['id'].">".$data[$i]['name']."</option>";
			}else{
				$selectBox .= "<option value=".$data[$i]['id'].">".$data[$i]['name']."</option>";
			}
		}
		return  $selectBox."</select>";
	}
	
	function sendEmail(){
		date_default_timezone_set('Etc/UTC');
		require 'libray/mail/PHPMailerAutoload.php';
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = "smtp.mail.yahoo.com";
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = 587;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication
		$mail->SMTPSecure = 'tls';
		$mail->Username = "skottieboyy2k@yahoo.com";
		//Password to use for SMTP authentication
		$mail->Password = "2004lmottp";
		//Set who the message is to be sent from
		$mail->setFrom('skottieboyy2k@yahoo.com', 'First Last');
		//Set an alternative reply-to address
		$mail->addReplyTo('dilip.godhani@gmail.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress('dilip.godhani@gmail.com', 'John Doe');
		//Set the subject line
		$mail->Subject = 'PHPMailer SMTP test';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		//Replace the plain text body with one created manually
		$mail->Body = "This is test email";
		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
	}
	function itemStatus($statusCode){
	    $item = new Item();
	    if($statusCode == $item->approved){
	        return "Approved";
	    } else if($statusCode == $item->pending){
	        return "Pending";
	    } else if($statusCode == $item->rejected){
	        return "Rejected";
	    } else if($statusCode == $item->success){
	        return "Success";
	    } else if($statusCode == $item->save){
	        return "Saved";
	    }else{
	        return "Invalid Item code.";
	    }
	}
	
	function getUserTypeList(){
	    return $this->userTypeList;
	}
	function getUserType($userType){
	    return $this->userTypeList[$userType];
	}
	function getTypeOfLeaveList(){
	    return $this->typeOfLeave;
	}
	function getTypeOfLeave($leaveType){
	    return $this->typeOfLeave[$leaveType];
	}
	
	function count_workdays($date1,$date2){
	    $firstdate = strtotime($date1);
	    $lastdate = strtotime($date2);
	    $firstday = date("w",$firstdate);
	    $lastday = date("w",$lastdate);
	    $totaldays = intval(($lastdate-$firstdate)/86400)+1;
	    
	    //check for one week only
	    if ($totaldays<=7 && $firstday<=$lastday){
	        $workdays = $lastday-$firstday+1;
	        //check for weekend
	        if ($firstday==0){
	            $workdays = $workdays-1;
	        }
	        if ($lastday==6){
	            $workdays = $workdays-1;
	        }
	        
	    }else { //more than one week
	        
	        //workdays of first week
	        if ($firstday==0){
	            //so we don't count weekend
	            $firstweek = 5;
	        }else {
	            $firstweek = 6-$firstday;
	        }
	        $totalfw = 7-$firstday;
	        
	        //workdays of last week
	        if ($lastday==6){
	            //so we don't count sat, sun=0 so it won't be counted anyway
	            $lastweek = 5;
	        }else {
	            $lastweek = $lastday;
	        }
	        $totallw = $lastday+1;
	        
	        //check for any mid-weeks
	        if (($totalfw+$totallw)>=$totaldays){
	            $midweeks = 0;
	        } else { //count midweeks
	            $midweeks = (($totaldays-$totalfw-$totallw)/7)*5;
	        }
	        
	        //total num of workdays
	        $workdays = $firstweek+$midweeks+$lastweek;

	        return ($workdays);
	    }
	}

	function getWorkingDays($startDate,$endDate,$holidays){
	    // do strtotime calculations just once
	    $endDate = strtotime($endDate);
	    $startDate = strtotime($startDate);
	    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
	    //We add one to inlude both dates in the interval.
	    $days = ($endDate - $startDate) / 86400 + 1;
	    
	    $no_full_weeks = floor($days / 7);
	    $no_remaining_days = fmod($days, 7);
	    
	    //It will return 1 if it's Monday,.. ,7 for Sunday
	    $the_first_day_of_week = date("N", $startDate);
	    $the_last_day_of_week = date("N", $endDate);
	    
	    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
	    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
	    if ($the_first_day_of_week <= $the_last_day_of_week) {
	        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
	        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
	    }
	    else {
	        // (edit by Tokes to fix an edge case where the start day was a Sunday
	        // and the end day was NOT a Saturday)
	        
	        // the day of the week for start is later than the day of the week for end
	        if ($the_first_day_of_week == 7) {
	            // if the start date is a Sunday, then we definitely subtract 1 day
	            $no_remaining_days--;
	            
	            if ($the_last_day_of_week == 6) {
	                // if the end date is a Saturday, then we subtract another day
	                $no_remaining_days--;
	            }
	        }
	        else {
	            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
	            // so we skip an entire weekend and subtract 2 days
	            $no_remaining_days -= 2;
	        }
	    }
	    
	    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
	    //---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
	    $workingDays = $no_full_weeks * 5;
	    if ($no_remaining_days > 0 )
	    {
	        $workingDays += $no_remaining_days;
	    }
	    
	    //We subtract the holidays
	    foreach($holidays as $holiday){
	        $time_stamp=strtotime($holiday);
	        //If the holiday doesn't fall in weekend
	        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
	            $workingDays--;
	    }
	    
	    return $workingDays;
	}


	function generateSQL($tableName,$post){
   //     print_r($post);
        $sql = "insert into ".$tableName ." ( ";
        $tableColumn = "";
        $columnValue = "";
        foreach($post as $column => $value){
            if($column == "loss_date"){
                $tableColumn .= $column.",";
                $columnValue .= "'".$this->yyyymmdd($value)."',";
            }else{
                $tableColumn .= $column.",";
                $columnValue .= "'".$value."',";
            }
        }
        $tableColumn = rtrim($tableColumn, ", ");
        $columnValue = rtrim($columnValue, ", ");
        return $sql. $tableColumn." ) values ( ".$columnValue. ")";
    }

    function getState(){
        $sql = "Select DISTINCT state_abbr, state from us where state is not null ";
        $states = $this->fetch($sql);
        $option="";
        for($i=0;$i<count($states);$i++){
            $option .="<option value='".$states[$i]['state_abbr']."'>".$states[$i]['state']."</option>";
        }
        return $option;
    }




}
?>