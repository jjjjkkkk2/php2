<html>
    <head><title>使用者管理</title></head>  //標題抬頭:  使用者管理
    <body>  //內容
    <?php
        //禁用錯誤報告，也就是不顯示錯誤
        error_reporting(0);
        //啟用 session
        session_start();
        //if(如果) SESSION(獲取/設定) 不等於當前會話 id
        if (!$_SESSION["id"]) {
            //印出   請登入帳號
            echo "請登入帳號";
            //echo(印出,顯示) <meta> refresh 可以用來設定幾秒鐘後跳轉 (redirect) 到某一個URL  ，  網頁在載入 3 秒後，自動跳轉到url=login.html
            echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
        }
        //否則
        else{   
            //顯示  使用者管理
            echo "<h1>使用者管理</h1>
            //點選“user_add_form.php”,則轉到user_add_form頁面 進行新增使用者  ，  點選“bulletin.php”,則轉到bulletin頁面進行 回佈告欄列表
            [<a href=user_add_form.php>新增使用者</a>][<a href=bulletin.php>回佈告欄列表</a>]<br>
                <table border=1> 
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            #mysqli_connect() 建立資料庫鏈接  conn 為 connection 的簡寫，第一個參數是 localhost，第二個是root，第三個空白，第四個是mydb
            $conn=mysqli_connect("localhost","root","","mydb");
            #mysqli_query() 從資料庫查詢資料  result ，前面的三個參數等於conn分別是localhost , root , mydb 第四個是selsct * from user
            $result=mysqli_query($conn, "select * from user");
            #mysqli_fetch_array() 從查詢出來的資料一筆一筆出來   ，  還有資料就執行裡面的程式，還有東西抓時就印出來
            while ($row=mysqli_fetch_array($result)){
                //點選“user_edit_form.php”,則轉到user_edit_form.php頁面 進行id修改  ，  點選“user_delete.php”,則轉到user_delete.php頁面 進行id,pwd刪除
                echo "<tr><td><a href=user_edit_form.php?id={$row['id']}>修改</a>||<a href=user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            //印出 </table>
            echo "</table>";
        }
    ?> 
