<?php
include_once "../base.php";
$table=$_GET['table'];
$acc=$_GET['acc'];
$pw=$_GET['pw'];
$chk=nums($table,["acc"=>$acc,"pw"=>$pw]);
if($chk>0){
    // 法1
  // $_SESSION[$table]=$acc;
    // 法2
  switch($table){
      case "admin":
            $_SESSION["admin"] = $acc;
      break;
      case "member":
             $_SESSION["mem"] = $acc;
      break;
  }
    echo 1;

}else{
    echo 0;
}
?>