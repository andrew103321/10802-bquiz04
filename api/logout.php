<?php

    include_once "../base.php";

    unset($_SESSION["mem"]);
    unset($_SESSION["cart"]);
    to("../index.php");
?>