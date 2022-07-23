
<h1>お申し込み内容確認</h1>
  <!-- メール確認用 -->
<?php
// session_start();

//クリックジャッキングへの対策
// header('X-Frame-Options: DENY');

//フォームを経ずにこのページに直接アクセスした場合は拒否する
if(!isset($_POST['token'])) {
  echo '不正なアクセスの可能性があります';
  exit;
}

//フォームに入力された値のエスケープ処理
function e($str) {
  return htmlspecialchars($str, ENT_QUOTES|ENT_HTML5, 'UTF-8');
}

  // フォームから送信されたデータを各変数に格納
  $name = e($_POST["username"]);
  $mail = e($_POST["email"]);
  $message  = e($_POST["message"]);
?>

<form class="contact" action="/form" method="post">
  <input type="hidden" name="username" value="<?php echo $name; ?>">
  <input type="hidden" name="email" value="<?php echo $mail; ?>">
  <input type="hidden" name="message" value="<?php echo $message; ?>">
  <input type="hidden" name="flag" value="confirmFlag">

  <h2>Contact Us<span id="close"></span></h2>
  <div class="group"><input type="text" id="name" value="Name: <?php echo $name; ?>" readonly><!-- <label for="name">Name</label> --></div>
  <div class="group"><input type="text" id="email" value="Email: <?php echo $mail; ?>" readonly><!-- <label for="email">Email</label> --></div>
  <div class="group"><textarea id="message" readonly>Message: <?php echo $message; ?></textarea><!-- <label for="message">Your Message</label> --></div>

  <button value="submit" type="button" onclick="history.back(-1)">修正</button>
  <button value="submit" type="submit">送信</button>
</form>


 