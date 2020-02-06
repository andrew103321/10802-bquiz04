<?php
    include_once "../base.php";

        $good = find("goods",$_POST['id']);
        $good['sh'] = $_POST['type'];

       save("goods",$good);



?>