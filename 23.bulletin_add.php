<?php
    //禁用錯誤報告，也就是不顯示錯誤
    error_reporting(0);
    //啟用 session
    session_start();
    //if(如果) SESSION(獲取/設定) 不等於當前會話 id
    if (!$_SESSION["id"]) {
        //印出   please login first
        echo "please login first";
        //echo(印出,顯示) <meta> refresh 可以用來設定幾秒鐘後跳轉 (redirect) 到某一個URL  ，  網頁在載入 3 秒後，自動跳轉到url=login.html
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
    }
    //否則
    else{
         #mysqli_connect() 建立資料庫鏈接  conn 為 connection 的簡寫，第一個參數是 localhost，第二個是root，第三個空白，第四個是mydb
        $conn=mysqli_connect("localhost","root","", "mydb");
        //sql 為 插入公告  title, content, type, time
        $sql="insert into bulletin(title, content, type, time)
        //values  POST(接收)title , 接收content , 接收type , 接收time
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        //如果  mysqli_query() 從資料庫查詢資料 不是conn和sql
        if (!mysqli_query($conn, $sql)){
            //顯示    新增命令錯誤
            echo "新增命令錯誤";
        }
        //否則
        else{
            //顯示   新增佈告成功，三秒鐘後回到網頁
            echo "新增佈告成功，三秒鐘後回到網頁";
            //顯示  <meta> refresh 可以用來設定幾秒鐘後跳轉 (redirect) 到某一個URL  ，  網頁在載入 3 秒後，自動跳轉到url=bulletin.php
            echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";
        }
    }
?>