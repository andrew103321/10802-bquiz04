<h1 class="ct">編輯會員資料</h1>
<?php
$row=find("member",$_GET['id']);

?>
<form action="./api/edit_mem.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><?=$row['acc'];?></td>
        </tr>

        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><?=$row['pw'];?></td>
        </tr>
        
        <tr>
            <td class="tt ct">累積交易額</td>
            <td class="pp"><?=$row['total'];?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="number" name="tel" value="<?=$row['tel'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$row['email'];?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="lof('admin.php?do=mem')">
    </div>
</form>

<script>
