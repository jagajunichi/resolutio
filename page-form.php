<?php get_header(); ?>


  <img class="l-top__img" alt="画像1" src="<?php echo get_template_directory_uri() ?>/images/img/01.jpeg" />



  <div class="f-mainWrap">
    <main class="f-main">
      <!-- 流れ星 -->
      <p class="star shootingstar1"></p>
      <p class="star shootingstar2"></p>

      <!-- パンくず -->
      <?php custom_breadcrumb(); ?>


      <!-- 表示内容振り分け POSTが有りフラグがある場合は送信 POSTが有りフラグがない場合は確認 何もなければ記入フォーム -->
      <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['flag'])){// 送信
        include("form-post.php");}
        elseif ($_SERVER["REQUEST_METHOD"] == "POST") {// 記入内容確認用
          include("form-confirm.php");} 
        else{// 記入フォーム
          include("form-input.php");
        }
      ?>

    </main>

    <aside class="f-sidebar">
        <?php include("sidebar.php"); ?>
    </aside>
  </div><!-- f-mainWrap -->
  
<?php get_footer(); ?>