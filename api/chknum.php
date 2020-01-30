<?php

include_once "../base.php";

$num=$_GET["num"];
if($_SESSION['num']==$num){
    echo 1;
}else{
    echo 0;
}
?>