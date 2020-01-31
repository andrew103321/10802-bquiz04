<?php

include_once "../base.php";

$id=$_GET['main'];
$sub=all("type",['parent'=>$id]);
foreach($sub as $s){
    echo "<option value='".$s['id']."'>".$s['text']."</option>";
}

?>