<?php

include_once "../base.php";

$id=$_POST['id'];

$type=find("type",$id);

$type['text']=$_POST['type'];

save("type",$type);


?>