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
        $conn=mysqli_connect("localhost","root","","mydb");
        //sql  DELETE FROM 是用來刪除資料表中的資料  當  符合條件 : bid=抓取的bid
        $sql="delete from bulletin where bid='{$_GET[bid]}'";
        #echo $sql;
        
        //如果  mysqli_query() 從資料庫查詢資料 不是conn和sql
        if (!mysqli_query($conn,$sql)){
            //顯示   佈告刪除錯誤
            echo "佈告刪除錯誤";
        //否則
        }else{
            //顯示   佈告刪除成功
            echo "佈告刪除成功";
        }
    }
    //顯示 <meta> refresh 可以用來設定幾秒鐘後跳轉 (redirect) 到某一個URL  ，  網頁在載入 3 秒後，自動跳轉到url=bulletin.php'>"
        echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";
    }
?>