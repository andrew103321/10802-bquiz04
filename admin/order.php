<h1 class="ct">訂單管理</h1>
<table class="all">
    <tr class="tt">
        <td class="ct">訂單編號</td>
        <td class="ct">金額</td>
        <td class="ct">會員帳號</td>
        <td class="ct">姓名</td>
        <td class="ct">下單時間</td>
        <td class="ct">操作</td>
    </tr>
    <?php
    $rows=all("ord");
    foreach($rows as $r){
    ?>
    <tr class="pp">
        <td class="ct"><?=$r['no'];?></td>
        <td class="ct"><?=$r['total'];?></td>
        <td class="ct"><?=$r['acc'];?></td>
        <td class="ct"><?=$r['name'];?></td>
        <td class="ct"><?=$r['orddate'];?></td>
        <td class="ct">
          <button onclick="lof('admin.php?do=edit_ord&id=<?=$r['id'];?>')">修改</button>
          <button onclick="del('ord',<?=$r['id'];?>)">刪除</button>        
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="lof('index.php')">返回</button></div>
