<?php

$ord=find("ord",$_GET['id']);

?>

<h2 class="ct">訂單編號<span style="color:red"><?=$ord['no'];?></span>的詳細資料</h2>



    <table class="all">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp"><?=$ord['acc'];?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><?=$ord['name'];?></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><?=$ord['email'];?></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><?=$ord['addr'];?></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡電話</td>
            <td class="pp"><?=$ord['tel'];?></td>
        </tr>
    </table>
    <table class="all">
        <tr class="tt">
            <td class="ct">商品名稱</td>
            <td class="ct">編號</td>
            <td class="ct">數量</td>
            <td class="ct">單價</td>
            <td class="ct">小計</td>
        </tr>
        <?php
      
        $cart = unserialize($ord['goods']);
        foreach($cart as $id => $qt){
            $goods=find("goods",$id); 
        ?>
        <tr class="pp">
            <td><?=$goods['name'];?></td>
            <td class="ct"><?=$goods['no'];?></td>
            <td class="ct"><?=$qt;?></td>
            <td class="ct"><?=$goods['price'];?></td>
            <td class="ct"><?=$goods['price']*$qt;?></td>
        </tr>
        <?php
   
    
        }
        ?>
    </table>
    <div class="all tt ct">總價:<?=$ord['total'];?></div>
    <div class="ct">
            <input type="button" value="返回修改訂單" onclick="lof('admin.php?do=order')">
    </div>

<script>
function billing(){
    let name=$("#name").val()
    let addr=$("#addr").val()
    let email=$("#email").val()
    let tel=$("#tel").val()
    let total=$("#total").val()
    $.post("./api/billing.php",{name,addr,email,tel,total},function(){
        alert("訂購成功\n感謝您的訂購")
        location.href="index.php";
    })
}
</script>