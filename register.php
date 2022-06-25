<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="register_act.php" method="POST">
        <dl>
            <dt>ログイン名</dt>
            <dl><input type="text" name="name"></dl>
            <dt>ID</dt>
            <dl><input type="text" name="lid"></dl>
            <dt>PW</dt>
            <dl><input type="text" name="lpw"></dl>
        </dl>
        <input type="submit" value="登録" id="register-button">
    </form>

    <form action="login.php" method="GET">
        <input type="submit" value="戻る">
    </form>
</body>
</html>