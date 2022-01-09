<html>
    //網頁標題:新增使用者
    <head><title>新增使用者</title></head>
    //內容 開始
    <body>
<?php        
//禁用錯誤報告，也就是不顯示錯誤
    error_reporting(0);
    //啟用 session
    session_start();
     //if(如果) SESSION不等於id
    if (!$_SESSION["id"]) {
        //印出  請登入帳號
        echo "請登入帳號";
        //echo(印出,顯示) <meta> refresh 可以用來設定幾秒鐘後跳轉 (redirect) 到某一個URL  ，  網頁在載入 3 秒後，自動跳轉到url=login.html
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";
    }
    //否則
    else{    
        //印出
        echo "
            //寫一個可以輸入帳密的表單，抓取方法是post  html會和user_add.php做溝通
            <form action=user_add.php method=post>
                //輸入  type : text 文字方塊  name : 儲存資料的變數名稱  <br /> 換行
                帳號：<input type=text name=id><br> 
                //輸入  type : text*字回應的文字方塊   name : 儲存資料的變數名稱
                密碼：<input type=text name=pwd><p></p>
                //type : submit 命令鈕  value : 命令鈕上的文字  //type : reset 重置  value : 文字方塊內的預設值
                <input type=submit value=新增> <input type=reset value=清除>
            </form>  //表單
        ";
    }
?>
    //內容 結束
    </body>
</html>