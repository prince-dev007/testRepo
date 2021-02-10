<?php 
class Item{
    var $approved = 0;
    var $rejected = 1;
    var $pending  = 2;
    var $success  = 3;
    var $cancel   = 4;
    var $save     = 5;
    
    function intsertItemHistory($workflowId,$itemId,$userId,$exitValue,$comment,$db){
       // $db = new db_connect();
        $sql = "insert into itemhistory(workflow_id,item_id,user_id,exit_value,comment) values (".$workflowId.",".$itemId.",".$userId.",".$exitValue.",'".$comment."')";
        echo $sql;
        $db->save($sql);
    }
    
    function updateWorkflow($status,$workflowId,$userId,$db){
       // $db = new db_connect();
        $sql = "update workflow set status =".$status.",user_id=".$userId.",exit_date=now() where id=".$workflowId;
        $db->save($sql);
    }
}
?>