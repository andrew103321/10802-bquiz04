<?php
    include_once "../base.php";

  

    if(!empty($_FILES['file']['tmp_name'])){
        $_POST['file']=$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$_POST['file']);
    }
    $_POST['no'] = rand(100000,999999);
    save("goods",$_POST);
    to("../admin.php?do=th");

?>