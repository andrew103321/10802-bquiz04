<?php

include_once "../base.php";

$main=all("type",['parent'=>0]);
foreach($main as $m){
    echo "<option value='".$m['id']."'>".$m['text']."</option>";
}

?>