<!DOCTYPE html>
<html lang="ja" class="html">
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WBG6D35');</script>
  <!-- End Google Tag Manager -->

  <meta charset="UTF-8" />
  <title>RESOLTIO<?php if ( is_home() || is_front_page() ){
  }else{
    echo "-";
    echo the_title_attribute();
    echo "-";
  }?></title>

  <meta name="description" content="RESOLTIO-ホームページ解析、システム開発、就職・転職支援||resoltioは、大阪を中心に活動をしており、ホームページ解析、ホームページ作成、wordpress講習、動画編集、google系のシステム作成など幅広く業務を行っております。">

  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- awesome -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

  <!-- picture使えるように -->
  <script src="https://polyfill.io/v3/polyfill.min.js?features=HTMLPictureElement"></script>

  <!-- slick -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/slick.css">
  
  <!-- 自作CSS -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/main.css">


  <?php wp_head(); ?>



  
</head>


  <body class="f-body">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBG6D35"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <header class="f-header">
    <!-- ハンバーガー -->
    <div id="hamburger">
      <button class="menu-trigger">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

    <!--ナビ -->
    <nav class="p-nav js-scroll-show">
      <ul class="p-navList">
        <li class="p-navItem"><a href="/">HOME</a></li>
        <li class="p-navItem"><a href="/service">SERVICE</a></li>
        <li class="p-navItem"><a href="/category/blog/">BLOG</a></li>
        <li class="p-navItem"><a href="/about">ABOUT</a></li>
        <li class="p-navItem"><a href="/form">CONTACT</a></li>
        <li class="p-navItem"><a href="/private">PRIVATE</a></li>
      </ul>
    </nav>

  </header>