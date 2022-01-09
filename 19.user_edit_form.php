<html>
    //標題  修改使用者
    <head><title>修改使用者</title></head>
    //內容 
    <body>
    <?php
    //禁用錯誤報告，也就是不顯示錯誤
    error_reporting(0);
    //啟用 session
    session_start();
    //if(如果) SESSION不等於id
    if (!$_SESSION["id"]) {
        //印出   請登入帳號
        echo "請登入帳號";
        //echo(印出,顯示) <meta> refresh 可以用來設定幾秒鐘後跳轉 (redirect) 到某一個URL  ，  網頁在載入 3 秒後，自動跳轉到url=login.html
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
    }
    //否則
    else{   
        #mysqli_connect() 建立資料庫鏈接  conn 為 connection 的簡寫，第一個參數是 localhost，第二個是root，第三個空白，第四個是mydb
        $conn=mysqli_connect("localhost", "root","","mydb");
        //mysqli_query() 從資料庫查詢資料  result 等於 conn  ,  sql (等於 使用者輸入的id  抓取id)
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        #mysqli_fetch_array() 從查詢出來的資料一筆一筆出來   ，  還有資料就執行裡面的程式，還有東西抓時就印出來
        $row=mysqli_fetch_array($result);
        //顯示
        echo "
        //使用post方式抓取 ,  html會和user_add.php做溝通
        <form method=post action=user_edit.php>
            //輸入的hidden nam=id  變數為獲取的id
            <input type=hidden name=id value={$row['id']}>
            //帳號: 抓取的id
            帳號：{$row['id']}<br> 
            //密碼: 抓取輸入的pwd數
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            //type : submit 命令鈕  value : 命令鈕上的文字 (修改)
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    //內容  結束
    </body>
</html>