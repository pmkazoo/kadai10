<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/main.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <title>ログイン</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">ログイン</nav>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="register.php">アカウント登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->


    <form name="form" action="login_act.php" method="post">
        ID:<input type="text" name="lid" />
        PW:<input type="password" name="lpw" />
        <input type="submit" value="LOGIN" />
    </form>

</body>

</html>
