<?php
include "base.php";

$data["acc"]="admin";
$data["pw"]="1234";
$data["pr"]=serialize([1,2,3,4,5]);
$data2["acc"]="test";
$data2["pw"]="5678";
$data2["pr"]=serialize([1,3,5]);
save("admin",$data);
save("admin",$data2);

?>