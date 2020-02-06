<?php
    $row = find("goods",$_GET['id']);
           
?>
<table>
    <tr>
        <td rowspan="5" width="60%" class="pp ct">
            <img src="./img/<?=$row["file"];?>" alt="" style="width:90%;">
        </td>
    </tr>
    <tr class="pp">
        <?php
          $big = find("type",$row["main"])['text'] ;   
          $big2 = find("type",$row["sub"])['text']  ;   
        ?>
        <td>分類:<?=$big;?>><?=$big2;?></td>

    </tr>
    <tr class="pp">
        <td>編號:<?=$row["no"];?></td>
    </tr>
    <tr class="pp">
        <td>詳細:<?=$row["intro"];?></td>
    </tr>
    <tr class="pp">
        <td>庫存量:<?=$row["qt"];?></td>
    </tr>
</table>
<form action="index.php" method="get">
        <div class="tt ct">
            購買數量:<input type="number" name="qt" id="qt" value="1">
            <input type="hidden" name="do" value="buycar">
            <input type="hidden" name="id" value="<?=$row["id"];?>">
            <button style="padding:0;"><img src="./icon/0402.jpg" alt="" ></button>
            <!-- <input type="submit" value="" style="background:url('./icon/0402.jpg') no-repeat center; padding:0 ;margin:0; width:57px;height:18px;"> -->
        </div>
        </td>
 </form>  
<div class="ct"><button onclick="lof('index.php')">返回</button></div>      