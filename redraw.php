<?php

$update_creature_name = $_GET['update_creature_name'];
$aquarium_name = $_GET['aquarium_name'];


//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError' . $e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM aquarium where creature_name = :update_creature_name");
$stmt->bindValue('update_creature_name', $update_creature_name, PDO::PARAM_STR);

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
        $canvas = $result['canvas'];
    }
}

$json_canvas = json_encode($canvas);

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
    <script type="text/javascript">
        let json_canvas = JSON.parse('<?php echo $json_canvas; ?>');
    </script>
    <script type="text/javascript" src="js/redraw.js"></script>
    <link rel="stylesheet" href="css/colorjoe.css">
    <link rel="stylesheet" href="css/style.css">
    <nav class="navbar navbar-default">
        <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </nav>
</head>

<body>
    <div class="drawing-wrapper">
        <h2><?php echo $aquarium_name ?>の「<?php echo $update_creature_name ?>」を描きなおしてね</h2>

        <div>
            <canvas id="draw-area" width="400px" height="400px" style="border: 1px solid #000000;"></canvas>
            <span id="color-palette"></span>
        </div>

        <!-- <dl class="creature-name">
            <dt>生き物の名前</dt>
            <dd><input type="text" id="name"></dd>
        </dl> -->

        <div>
            <!-- <button id="eraser-button">消しゴム</button> -->
            <button id="clear-button">書き直し</button>

            <form action="update.php" method="POST">
                <input type="hidden" id="aquarium_name" name="aquarium_name" value="<?php echo $aquarium_name ?>">
                <input type="hidden" id="name" name="creature_name" value="<?php echo $update_creature_name ?>">
                <input type="hidden" id="canvas" name="canvas">
                <input type="submit" value="更新" id="update-button">
            </form>

            <form action="show.php" method="GET">
                <input type="hidden" id="aquarium_name" name="show_aquarium_name" value="<?php echo $aquarium_name ?>">
                <input type="submit" value="戻る">
            </form>

        </div>
    </div>

</body>

</html>