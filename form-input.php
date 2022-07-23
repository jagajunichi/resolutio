<?php
// session_start();

//クリックジャッキングへの対策
// header('X-Frame-Options: DENY');

//トークンの生成
$token = sha1(uniqid(rand(), true));

//トークンを$_SESSIONに格納し、それをキーとする
$_SESSION['key'] = $token;
?>

<h1>申込みフォーム</h1>
<div class="btn c-awes__star c-awes__star--Lg ak-rotateo"></div>
  <div class="overlay"></div>
  <form class="contact" action="/form" method="post">
        <h2>Contact Us<span class="c-awes__xmark js-close"></span></h2>
        <div class="group"><input type="text" id="name" name="username" required="required" /><label for="name">Name</label></div>
        <div class="group"><input type="email" id="email" name="email" required="required" /><label for="email">Email</label></div>
        <div class="group"><textarea id="message" name="message" required="required"></textarea><label for="message">Your Message</label></div>

        <input type="hidden" name="token" value="<?= $token ?>">
    <button value="submit" type="submit">確認</button>
  </form>

      


