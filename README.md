# 課題10 -PHP5 - CRUDを用いたアプリ[なんでも自由!!-

## ①課題内容（どんな作品か）
### お絵描き水族館（PHP編）
- 前回までの内容に、個別で削除したい生き物を指定して削除できる機能を追加しました（今までは、まとめて削除のみ）

#### ログイン画面(login.php)　※最初はこの画面でお願いします
- （ユーザー登録済みの場合）IDとPWを入力　※admin, adminで入れます
- （ユーザー未登録の場合）「アカウント登録」ボタン押下し、ユーザー登録画面に遷移

#### ユーザー登録画面
- 「ログイン名」「ID」「PW」を入力して「登録」ボタン押下して登録

#### トップ画面
- お絵描き部分において、「水族館の名前」「生き物の名前」を入力して「登録」を押すと、PHPを経由してDBに情報を登録
- お絵描きの「書き直し」も可能
- 「のぞきたい水族館の名前」を入力して「水族館をのぞいてみる」を押すと、DBの中から水族館名が一致したレコードの生き物を表示（「gs」を入れると、すでに作成した生き物をみれます）
- DBに存在している水族館の一覧をDISTINCTで表示

#### 水族館鑑賞画面
- 選択した水族館の生き物のみ表示（F5で更新かけると、生き物が動く）
- 該当の水族館に存在する生き物の名前一覧を表示
- 「お絵描きに戻る」押下で、トップ画面へ遷移
- 「書き直したい生き物」を入れて「書き直す」押下すると、生き物更新画面へ遷移
- 「海に戻したい生き物」を入れて、「指定した生き物を海に戻す（二度と元に戻れません）」を押下すると、指定した生き物のみDBから削除
- 「全ての生き物を海に戻す（二度と元に戻れません）」を押下すると、該当の水族館の生き物を全てDBから削除

#### 生き物更新画面
- 選択した生き物を再度お絵描きでき、「更新」押下するとDBで生き物の絵が更新される
- お絵描きの「書き直し」も可能
- 「戻る」押下で、元の水族館鑑賞画面へ遷移


## ②工夫した点・こだわった点
- 生き物個別に削除できる機能を追加
- 削除後、元々表示していた水族館の「水族館鑑賞画面」を表示することが可能（前回までは、削除後に水族館名がnullになってしまっていた）

## ③質問・疑問（あれば）
- 特になし

## ④その他（感想、シェアしたいことなんでも）
- 特になし
