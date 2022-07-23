<?php

if($_SESSION['key'] !== $_POST['token']) {
  echo "アクセスキーが異なります";
  return ;
}

// メール送信用

// foreach($_POST as $key => $value){
//   echo $key."\n";
//   echo $value."\n";
// }

$headers = "From: info@resolution.secret.jp";
$to = "jaga.junichi.894@gmail.com";
$title = "ホームページからのお問い合わせ";
$message ="お問い合わせ内容";
$message .= "お名前:".$_POST['username']."\n";
$message .= "メール:".$_POST['email']."\n";
$message .= "お問い合わせ:".$_POST['message'];

if(wp_mail($to, $title, $message, $headers)){
  echo "お問い合わせありがとうございます！お返事しばらくお待ち下さい。";
}
else{ 
  echo "失敗しました。何度も失敗する場合はお電話にてお知らせください。";
}