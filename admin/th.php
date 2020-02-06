<h1 class="ct">商品分類</h1>

<form action="./api/add_type.php" method="post" class="ct">
新增大分類
<input type="text" name="text">
<input type="submit" value="新增">
</form>

<form action="./api/add_type.php" method="post" class="ct">
新增中分類<select name="parent">
<?php
    $bigs=all("type",['parent'=>0]);
    foreach($bigs as $b){
        echo "<option value='".$b['id']."'>".$b['text']."</option>";
    }

?>
</select>
<input type="text" name="text" >
<input type="submit" value="新增">
</form>
<table class="all">
<?php
foreach($bigs as $b){
?>
    <tr class='tt'>
        <td><?=$b['text'];?></td>
        <td>
            <button onclick="editType(this,<?=$b['id'];?>)">修改</button>
            <button onclick="del('type',<?=$b['id'];?>)">刪除</button>     
        </td>
    </tr>
<?php
    if(nums("type",["parent"=>$b['id']])>0){
        $subs=all("type",["parent"=>$b['id']]);
        foreach($subs as $s){
            ?>
            <tr class='pp'>
                <td class="ct"><?=$s['text'];?></td>
                <td>
                    <button onclick="editType(this,<?=$s['id'];?>)">修改</button>
                    <button onclick="del('type',<?=$s['id'];?>)">刪除</button>     
                </td>
            </tr>
            <?php
        }
    }

}
?>
</table>

<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="lof('admin.php?do=add_goods')">新增商品</button></div>

<table class="all">
    <tr class="tt">
        <td class="ct">編號</td>
        <td class="ct">商品名稱</td>
        <td class="ct">庫存量</td>
        <td class="ct">狀態</td>
        <td class="ct">操作</td>
    </tr>
    <?php
    $rows=all("goods");
    foreach($rows as $r){
    ?>
    <tr class="pp">
        <td class="ct"><?=$r['no'];?></td>
        <td class="ct"><?=$r['name'];?></td>
        <td class="ct"><?=$r['qt'];?></td>
        <td class="ct" id="sh<?=$r['id'];?>"><?=($r['sh']==1)?"販售中":"已下架"?></td>
        <td class="ct">
          <button onclick="lof('admin.php?do=edit_goods&id=<?=$r['id'];?>')">修改</button>
          <button onclick="del('goods',<?=$r['id'];?>)">刪除</button><br>        
          <button onclick="shGoods(<?=$r['id'];?>,1)">上架</button>        
          <button onclick="shGoods(<?=$r['id'];?>,0)">下架</button>        
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
function editType(dom,id){
    let text=$(dom).parent("td").prev().html();
    console.log(text)
    let type=prompt("請輸入要修改的分類名稱",text);
    if(type!==null){
        $.post("./api/edit_type.php",{id,type},function(){
            //$(dom).parent("td").prev().html(type)
            location.reload()
        })
    }
}
    function shGoods(id,type){
        $.post("./api/shgoods.php",{id,type},function(res){
          
        //   法1
            location.reload()

        //   法2
            // switch(type){
            //     case 1:
            //         $("shid"+id).html("販售中")
            //     break;
            //     case 0:
            //         $("shid"+id).html("以下架")
            //     break;

        })

        }
    

</script>



