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
         #mysqli_connect() 建立資料庫鏈接  conn 為 connection 的簡寫，第一個參數是 localhost，第二個是root，第三個空白，第四個是mydb
        $conn=mysqli_connect("localhost","root","","mydb");
        #mysqli_query() 從資料庫查詢資料  result ，前面的三個參數等於conn分別是localhost , root , mydb 第四個是selsct * from bulletin where bid (抓取bid)
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET[bid]}");
        #mysqli_fetch_array() 從查詢出來的資料一筆一筆出來   ，  還有資料就執行裡面的程式，還有東西抓時就印出來
        $row=mysqli_fetch_array($result);
        //$(建立)checked1=空白
        $checked1="";
        //checked2=空白
        $checked2="";
        //checked3=空白
        $checked3="";
        //如果 row為type等於1
        if ($row['type']==1)
            //checked1=checked(檢查)
            $checked1="checked";
        //如果 row為type等於1
        if ($row['type']==2)
            //checked2=checked(檢查)
            $checked2="checked";
        //如果 row為type等於3
        if ($row['type']==3)
            //checked3=checked(檢查)
            $checked3="checked";
        //顯示
        echo "
        <html>
            //標題抬頭為: 新增佈告
            <head><title>新增佈告</title></head>
            //內容
            <body>
                //抓取方式為post  ,  html會和bulletin_edit.php做溝通
                <form method=post action=bulletin_edit.php>
                    //佈告編號為所設的bid名
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    //標題為所設的title名
                    標    題：<input type=text name=title value={$row['title']}><br>
                    //內容為一個20行20列的文本域
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    //以單選選項輸入選擇 系上公告,獲獎資訊或徵才資訊 , 以 type 為變數名稱傳回程式
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    //發布時間為輸入的time(時間)
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    //type : submit 命令鈕  value : 命令鈕上的文字 (修改佈告)  reset value 為 清除按鈕
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                //表單 結束
                </form>
            //內容 結束
            </body>
        </html>
        ";
    }
?>