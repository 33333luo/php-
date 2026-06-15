<html>
<head>
    <!-- 網頁標題 -->
    <title>明新科技大學資訊管理系</title>

    <!-- UTF-8 編碼 -->
    <meta charset="utf-8">

    <!-- FlexSlider 輪播 CSS -->
    <link href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css" rel="stylesheet">

    <!-- jQuery 函式庫 -->
    <script src="https://cdn.bootcss.com/jquery/2.2.2/jquery.min.js"></script>

    <!-- FlexSlider 輪播套件 -->
    <script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>

    <script>
        // 網頁載入完成後啟動圖片輪播
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",  // 滑動效果
                rtl: true            // 由右向左輪播
            });
        });
    </script>

    <style>
        /* ===== 全域設定 ===== */
        *{
            margin:0;
            color:gray;
            text-align:center;
        }

        /* ===== 上方區塊（LOGO + 登入） ===== */
        .top{
            background-color: white;
        }
        .top .container{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding:10px;
        }
        .top .logo{
            font-size: 35px;
            font-weight: bold;
        }
        .top .logo img{
            width: 100px;
            vertical-align: middle;
        }
        .top .top-nav{
            font-size: 25px;
            font-weight: bold;
        }

        /* ===== 主選單 ===== */
        .nav {
            background-color:#333;
            display: flex;
            justify-content: center;
        }
        .nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
        .nav li {
            float: left;
        }
        .nav li a {
            display: block;
            color: white;
            padding: 14px 16px;
            text-decoration: none;
        }
        .nav li a:hover {
            background-color: #111;
        }

        /* ===== 下拉式選單 ===== */
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
        }

        /* ===== 輪播區 ===== */
        .slider{
            background-color: black;
        }

        /* ===== 系所簡介 ===== */
        .banner{
            background-image: linear-gradient(#ABDCFF,#0396FF);
            padding:30px;
        }

        /* ===== 師資介紹 ===== */
        .faculty {
            display: block;
            background-color:white;
            padding:40px;
        }

        /* ===== 聯絡資訊 ===== */
        .contact {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* ===== 頁尾 ===== */
        .footer{
            display: flex;
            justify-content: center;
            background-color: rgb(25,26,30);
            padding: 30px 0;
        }

        /* ===== 登入視窗 ===== */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            right: 50px;
            top: 50px;
            width: 20%;
            height: 20%;
            background-color: rgba(255,255,255,0.9);
            padding-top: 50px;
        }

        /* ===== 佈告欄 ===== */
        .bulletin{
            background-color: rgb(255,204,153);
            padding: 30px 0;
        }
        .bulletin table{
            border-collapse:collapse;
            font-size:16px;
            border:1px solid #000;
        }
        .bulletin table th{
            background-color: #abdcff;
            color: #ffffff;
        }
        .bulletin table td{
            background-color: #ffffff;
            color: #0396ff;
        }
    </style>
</head>

<body>

<!-- ===================== 上方 LOGO + 登入 ===================== -->
<div class="top">
    <div class="container">

        <!-- LOGO -->
        <div class="logo">
            <img src="https://github.com/shhuangmust/html/raw/111-1/IMMUST_LOGO.JPG">
            明新科技大學資訊管理系
        </div>

        <!-- 登入與外部連結 -->
        <div class="top-nav">
            <a href="">明新科大</a>
            <a href="">明新管理學院</a>

            <!-- 點擊顯示登入視窗 -->
            <label onclick="document.getElementById('login').style.display='block'">登入</label>

            <!-- 登入視窗 -->
            <div id="login" class="modal">
                <span onclick="document.getElementById('login').style.display='none'">
                    &times; 管理系統登入
                </span>

                <!-- 登入表單 -->
                <form method="post" action="10.login.php">
                    帳號：<input type="text" name="id"><br />
                    密碼：<input type="password" name="pwd"><p></p>
                    <input type="submit" value="登入">
                    <input type="reset" value="清除">
                </form>
            </div>
        </div>

    </div>
</div>

<!-- ===================== 主選單 ===================== -->
<div class="nav">
    <ul>
        <li><a href="#home">首頁</a></li>
        <li><a href="#introduction">系所簡介</a></li>

        <!-- 下拉選單 -->
        <li class="dropdown">
            <a href="#faculty">成員簡介</a>
            <div class="dropdown-content">
                <a href="#faculty">黃老師</a>
                <a href="#faculty">李老師</a>
                <a href="#faculty">應老師</a>
            </div>
        </li>

        <li><a href="#about">相關資訊</a></li>
    </ul>
</div>

<!-- ===================== 輪播圖片 ===================== -->
<div class="slider">
    <div class="flexslider">
        <ul class="slides">
            <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider1.JPG"></li>
            <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider2.JPG"></li>
            <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider3.JPG"></li>
        </ul>
    </div>
</div>

<!-- ===================== 佈告欄（PHP + MySQL） ===================== -->
<div class="bulletin">
    <h1>最新公告</h1>

<?php
    // 連接資料庫
    $conn=mysqli_connect(
        "120.105.96.90",
        "immust",
        "immustimmust",
        "immust"
    );

    // 讀取 bulletin 資料表
    $result=mysqli_query($conn,"select * from bulletin");

    echo "<table border=2>
          <tr>
            <th>佈告編號</th>
            <th>佈告類別</th>
            <th>標題</th>
            <th>佈告內容</th>
            <th>發佈時間</th>
          </tr>";

    // 逐筆顯示公告
    while ($row=mysqli_fetch_array($result)){

        echo "<tr><td>";
        echo $row["bid"];
        echo "</td><td>";

        // 類別判斷
        if ($row["type"]==1) echo "系上公告";
        if ($row["type"]==2) echo "獲獎資訊";
        if ($row["type"]==3) echo "徵才資訊";

        echo "</td><td>";
        echo $row["title"];
        echo "</td><td>";
        echo $row["content"];
        echo "</td><td>";
        echo $row["time"];
        echo "</td></tr>";
    }

    echo "</table>";
?>
</div>

<!-- ===================== 系所簡介 ===================== -->
<div class="banner" id="introduction">
    <h1>系所簡介</h1>
    <h1>歷年教育部評鑑皆榮獲一等</h1>
    <h1>明新科技大學資訊管理系</h1>
    <h1>全國私立科大第一資管系</h1>
</div>

<!-- ===================== 師資介紹 ===================== -->
<div class="faculty" id="faculty">
    <h2>師資介紹</h2>

    <div class="container">
        <a class="teacher">
            <img src="https://github.com/shhuangmust/html/raw/111-1/faculty1.jpg">
            <h3>黃老師</h3>
        </a>

        <a class="teacher">
            <img src="https://github.com/shhuangmust/html/raw/111-1/faculty2.jpg">
            <h3>李老師</h3>
        </a>

        <a class="teacher">
            <img src="https://github.com/shhuangmust/html/raw/111-1/faculty3.jpg">
            <h3>應老師</h3>
        </a>
    </div>
</div>

<!-- ===================== 聯絡資訊 ===================== -->
<div class="contact" id="about">
    <h2>相關資訊</h2>

    <div class="infos">
        <div class="left">
            <b>明新科技大學管理學院大樓二樓</b>
            <span>304新竹縣新豐鄉新興路1號</span>
            <b>電話:03-5593142</b>
            <span>分機:3431、3432、3433</span>
            <b>傳真:03-5593142</b>
            <span>分機:3440</span>
        </div>

        <div class="right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18..."
                    frameborder="0" allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

<!-- ===================== 頁尾 ===================== -->
<div class="footer">
    &copy;Copyright 2022 Department of Information Management, MUST.
</div>

</body>
</html>