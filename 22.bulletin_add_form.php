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
        //顯示
        echo "
        <html>
            //標題抬頭: 新增佈告
            <head><title>新增佈告</title></head>  
            //內容
            <body>
                //抓取方式為post  ,  html會和bulletin_add.php做溝通
                <form method=post action=bulletin_add.php>
                    //輸入的名字為標題名
                    標    題：<input type=text name=title><br>
                    //內容為一個20行20列的文本域
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br>
                    //以單選選項輸入選擇 系上公告,獲獎資訊或徵才資訊 , 以 type 為變數名稱傳回程式
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    //發布時間為輸入的type
                    發布時間：<input type=date name=time><p></p>
                    //type : submit 命令鈕  value : 命令鈕上的文字 (新增佈告)  reset value 為 清除按鈕
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                //表單 結束
                </form>
            //內容 結束
            </body>
        </html>
        ";
    }
?>