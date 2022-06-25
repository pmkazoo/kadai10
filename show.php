<?php

$show_aquarium_name = $_GET['show_aquarium_name'];


//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DBConnectError' . $e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM aquarium where aquarium_name = :show_aquarium_name");
$stmt->bindValue(':show_aquarium_name', $show_aquarium_name, PDO::PARAM_STR);

$status = $stmt->execute();

//３．データ表示
$view = "";
$array = [];
if ($status == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:" . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($array, $result['canvas']);
    $view .= '<p>';
    $view .= $result['creature_name'];
    $view .= '</p>';
  }
}

$js_array = json_encode($array);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    let js_array = JSON.parse('<?php echo $js_array; ?>');
  </script>
  <script type="text/javascript" src="js/show.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <nav class="navbar navbar-default">
        <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </nav>
</head>

<body>
  <div class="aquarium-wrapper">
    <h2>水族館名：<?php echo $show_aquarium_name ?></h2>
    <canvas id="aquarium-area" width="1030px" height="490px"></canvas>
    <h3>生き物たち</h3>
    <?= $view ?>
    <form action="index.php" method="GET">
      <input type="submit" value="お絵描きに戻る">
    </form>
    <form action="redraw.php" method="GET">
      <dl class="view-name">
        <dt>書き直したい生き物</dt>
        <dd><input type="text" id="update_creature_name" name="update_creature_name"></dd>
        <input type="hidden" id="aquarium_name" name="aquarium_name" value="<?php echo $show_aquarium_name ?>">
      </dl>
      <input type="submit" value="書き直す" id="update-area-button">
      <!-- <button id="new-area-button">新しい水槽にする</button> -->
    </form>

    <form action="deleteOne.php" method="GET">
      <dl>
        <dt>海に戻したい生き物</dt>
        <dd><input type="text" id="delete_creature_name" name="delete_creature_name"></dd>
        <input type="hidden" id="aquarium_name" name="aquarium_name" value="<?php echo $show_aquarium_name ?>">
      </dl>
      <input type="submit" value="指定した生き物を海に戻す（二度と元に戻れません）">
    </form>

    <form action="deleteAll.php" method="GET">
      <input type="hidden" id="aquarium_name" name="aquarium_name" value="<?php echo $show_aquarium_name ?>">
      <input type="submit" value="全ての生き物を海に戻す（二度と元に戻れません）">
    </form>
  </div>

</body>

</html>