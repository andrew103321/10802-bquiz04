<?php

include_once "../base.php";

$acc=$_GET['acc'];
$chk=nums("member",["acc"=>$acc]);
if($chk>0){
    echo 1;
}else{
    echo 0;
}

?>