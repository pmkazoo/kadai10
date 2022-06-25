<?php
session_start();
require_once('funcs.php');
loginCheck();

//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError' . $e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT DISTINCT aquarium_name FROM aquarium");
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        $view .= $result['aquarium_name'];
        $view .= '</p>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/colorjoe.min.js"></script>
    <script src="js/draw.js"></script>
    <link rel="stylesheet" href="css/colorjoe.css">
    <link rel="stylesheet" href="css/style.css">
    <nav class="navbar navbar-default">
        <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </nav>    
</head>

<body>
    <header>
        <h1>お絵描き水族館へようこそ！</h1>
    </header>

    <div class="drawing-wrapper">
        <h2>好きな生き物を描いてね</h2>
        <div>
            <canvas id="draw-area" width="400px" height="400px" style="border: 1px solid #000000;"></canvas>
            <span id="color-palette"></span>
        </div>

        <!-- <dl class="creature-name">
            <dt>生き物の名前</dt>
            <dd><input type="text" id="name"></dd>
        </dl> -->

        <div>
            <!-- <button id="register-button">登録</button>
            <button id="clear-button">書き直し</button> -->

            <form action="insert.php" method="POST">
                <dl class="draw-name">
                    <dt>水族館の名前</dt>
                    <dd><input type="text" id="aquarium_name" name="aquarium_name"></dd>
                    <dt>生き物の名前</dt>
                    <dd><input type="text" id="name" name="creature_name"></dd>
                </dl>
                <input type="hidden" id="canvas" name="canvas">
                <input type="submit" value="登録" id="register-button">
            </form>
            <button id="clear-button">書き直し</button>
        </div>
    </div>

    <div class="aquarium-wrapper">
        <h2>みんなの水族館をのぞいてみよう！</h2>
        <form action="show.php" method="GET">
            <dl class="view-name">
                <dt>のぞきたい水族館の名前</dt>
                <dd><input type="text" id="show_aquarium_name" name="show_aquarium_name"></dd>
            </dl>
            <input type="submit" value="水族館をのぞいてみる" id="show-area-button">
            <!-- <button id="new-area-button">新しい水槽にする</button> -->
        </form>

        <h3>水族館の一覧</h3>
        <?= $view ?>

        <!-- <canvas id="aquarium-area"
        width="1030px"
        height="490px"></canvas> -->
    </div>

</body>

</html>