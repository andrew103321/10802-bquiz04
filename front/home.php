<?php

    $nav = "全部商品";

    if(!empty($_GET['type'])){
        $type = find("type",$_GET["type"]);
        if($type['parent']==0){
            $nav = $type['text'];
             // 取大分類;
            $items = all("goods",["main"=>$type['id'],"sh"=>1]);
        }else{

            $big = find("type",$type["parent"]);
            $nav = $big['text']. ">".$type["text"];
            // 取中分類
            $items = all("goods",["sub"=>$type['id'],"sh"=>1]);
        }
    }else{
            $items = all("goods",["sh"=>1]);
    }

    echo "<h2>". $nav. "<h2>";

    foreach($items as $i){
?>

    <table>
        <tr>
            <td rowspan="5" class="tt ct" width="40%">
                <a href="./index.php?do=detail&id=<?=$i['id'];?>"><img   src="./img/<?=$i['file'];?>" alt=""style="width:150px; height:100px;" ></a>
            </td>
        </tr>
        <tr class="ct tt">
            <td><?=$i['name'];?></td>
        </tr>  
        <tr class="ct pp">
            <td>
                價錢:<?=$i['price'];?>
                <a href="./index.php?do=buycar&id=<?=$i['id'];?>&qt=1">
                    <img src="./icon/0402.jpg" alt="" style="float:right">
                 </a>
            </td>
        </tr>  
        <tr class="ct pp">
            <td>規格:<?=$i['spec'];?></td>
        </tr>  
        <tr class="ct pp">
            <td>簡介:<?=mb_substr($i['intro'],0,20,"utf8") ;?></td>
        </tr>    
    </table>
<?php
    }
?>