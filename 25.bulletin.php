<?php
    //禁用錯誤報告，也就是不顯示錯誤
    error_reporting(0);
    //啟用 session
    session_start();
    //if(如果) SESSION不等於id
    if (!$_SESSION["id"]) {
        //印出   please login first
        echo "please login first";
        //echo(印出,顯示) <meta> refresh 可以用來設定幾秒鐘後跳轉 (redirect) 到某一個URL  ，  網頁在載入 3 秒後，自動跳轉到url=login.html
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
    }
    //否則
    else{
        //顯示 Welcome,  獲取/設定 當前會話 id 點選“logout”,則進行登出 , a href(點選)“user”,則轉到管理使用者 , 點選“bulletin_add_form”,則轉到進行新增佈告    
        echo "Welcome, ".$_SESSION["id"]."[<a href=logout.php>登出</a>][<a href=user.php>管理使用者</a>][<a href=bulletin_add_form.php>新增佈告</a>]<br>";
        #mysqli_connect() 建立資料庫鏈接  conn 為 connection 的簡寫，第一個參數是 localhost，第二個是root，第三個空白，第四個是mydb
        $conn=mysqli_connect("localhost","root","", "mydb");
        #mysqli_query() 從資料庫查詢資料  result ，前面的三個參數等於conn分別是localhost , root , mydb 第四個是selsct * from bulletin
        $result=mysqli_query($conn, "select * from bulletin");
        //表格的html，第一個欄位叫佈告編號，第二個欄位叫佈告類別，第三個欄位叫標題，第四個欄位叫佈告內容，第五個欄位叫發布時間
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";

        #mysqli_fetch_array() 從查詢出來的資料一筆一筆出來   ，  還有資料就執行裡面的程式，還有東西抓時就印出來
        while ($row=mysqli_fetch_array($result)){
            //點選“bulletin_edit.php”,則轉到bulletin_edit頁面 獲取bid 進行修改
            echo "<tr><td><a href=bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            //點選“bulletin_delete.php”,則轉到bulletin_delete頁面 獲取bid 進行刪除  
            <a href=bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            //第一筆資料叫bid
            echo $row["bid"];
            //列  結束 , 列  開始
            echo "</td><td>";
            //第二筆資料叫type
            echo $row["type"];
            //列  結束 , 列  開始
            echo "</td><td>"; 
            //第三筆資料叫title
            echo $row["title"];
            //列  結束 , 列  開始
            echo "</td><td>";
            //第四筆資料叫content
            echo $row["content"]; 
            //列  結束 , 列  開始
            echo "</td><td>";
            //第五筆資料叫time
            echo $row["time"];
            //列  結束 , 行  開始
            echo "</td></tr>";
        }
        //印出 </table>
        echo "</table>";
    
    }

?>