
<h2 class="ct">管理登入</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
        <?php
            $a=rand(10,99);
            $b=rand(10,99);
            $_SESSION['num']=$a+$b;
            echo $a . " + " . $b ." = ";
        ?>
        <input type="number" name="num" id="num"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('admin')">確認</button>
</div>
<script>

function login(table){
    let num=$("#num").val();

    $.get("./api/chknum.php",{num},function(res){
        if(res=='1'){
            let acc=$("#acc").val();
            let pw=$("#pw").val();
            $.get("./api/chkpw.php",{table,acc,pw},function(res){
                if(res=='1'){
                    location.href="admin.php";
                }else{
                    alert("帳號或密碼錯誤")
                }
            })
        }else{
            alert("對不起，您輸入的驗證碼有誤請您重新登入");
        }
    })
}
</script>