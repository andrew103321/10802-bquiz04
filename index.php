<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-3.4.1.min.js"></script>
<script src="./js/js.js"></script>

</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?">
            	<img src="./icon/0416.jpg">
            </a>
                        <div style="padding:10px;">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycar">購物車</a> |
                <?php
              
                        if(empty($_SESSION['mem'])){
                ?>
                                <a href="?do=login">會員登入</a> 
                <?php
                        }else{
                ?>
                                <a href="./api/logout.php">登出</a>
                <?php
                }
                ?>
                |
                 <a href="?do=login">會員登入</a> 
           </div>
           <marquee>
		年終特賣會開跑了　　情人節特惠活動
		</marquee></div>
        <div id="left" class="ct">
                <div style="min-height:400px;">
                <div class="ww"><a href="index.php">全部商品(<?=nums("goods",["sh"=>1]);?>)</a></div>
                <?php

                        $row = all("type",["parent"=>0]);
                        foreach($row as $r ){
                            ;
                
                ?>
                        <div class="ww"><a href="index.php?type=<?=$r['id'];?>"><?=$r['text'];?>(<?=nums("goods",["main"=>$r['id']]);?>)</a>
                                 <?php
                              
                                 $row = all("type",["parent"=>$r["id"]]);
                                 foreach($row as $r ){
                ?>      
                        <div class="s"><a href="index.php?type=<?=$r['id'];?>"><?=$r['text'];?>(<?= nums("goods",["sub"=>$r["id"]]);?>)</a></div>
                <?php
                        }
                ?>
                        
                        </div>
                <?php
                        }
                ?>
               
                        <span>
            	<div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                	00005                </div>
            </span>
                    </div>
                    </div>
        <div id="right">
        <?php

        $do=(!empty($_GET["do"]))?$_GET["do"]:"home";
        $file="./front/" . $do .".php";
        if(file_exists($file)){
                include $file;
        }else{
                include "./front/home.php";
        }


        ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
        <?=find("bottom",1)['bottom'];?>        </div>
    </div>

</body></html>