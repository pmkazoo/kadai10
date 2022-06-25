<?php

$aquarium_name = $_GET['aquarium_name'];
$delete_creature_name = $_GET['delete_creature_name'];

//2. DB接続します
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("DELETE FROM aquarium where aquarium_name = :delete_aquarium_name AND creature_name = :delete_creature_name");
$stmt->bindValue(':delete_aquarium_name', $aquarium_name, PDO::PARAM_STR);
$stmt->bindValue(':delete_creature_name', $delete_creature_name, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．index.phpへリダイレクト
  $redirect_url = "show.php?show_aquarium_name=" . $aquarium_name;
  header("Location: $redirect_url");
}
?>
