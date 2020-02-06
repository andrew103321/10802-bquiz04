<?php
if(empty($_SESSION['mem'])){
    echo "<script>location.href='index.php?do=login'</script>";
    //to("index.php?do=login");
    exit();
}

if(!empty($_GET['id'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

if(empty($_SESSION['cart'])){
    // 改變$_session['cart'][x]=[y] 陣列 ， 可以增加或少
    echo "<h2 class='ct'>購物車中目前無商品</h2>";
   
}else{

//print_r($_SESSION['cart']);
?>
<h2 class="ct"><?=$_SESSION['mem'];?></h2>
<table class="all">
    <tr class="tt">
        <td class="ct">編號</td>
        <td class="ct">商品名稱</td>
        <td class="ct">數量</td>
        <td class="ct">庫存量</td>
        <td class="ct">單價</td>
        <td class="ct">小計</td>
        <td class="ct">刪除</td>
    </tr>
    <?php
    foreach($_SESSION['cart'] as $id => $qt){
        $goods=find("goods",$id); 
    ?>
    <tr class="pp">
        <td class="ct"><?=$goods['no'];?></td>
        <td><?=$goods['name'];?></td>
        <td class="ct"><?=$qt;?></td>
        <td class="ct"><?=$goods['qt'];?></td>
        <td class="ct"><?=$goods['price'];?></td>
        <td class="ct"><?=$goods['price']*$qt;?></td>
        <td class="ct"><img src="./icon/0415.jpg" onclick="delCart(<?=$id;?>)"></td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <img src="./icon/0411.jpg" alt="" onclick="lof('index.php')">
    <img src="./icon/0412.jpg" alt="" onclick="lof('index.php?do=billing')">
</div>
<script>

function delCart(id){
    $.post("./api/delcart.php",{id},function(){
        location.href='index.php?do=buycart';
  
    })
}

</script>
<?php
}
?>
