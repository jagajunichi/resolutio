<?php get_header(); ?>


  <img class="l-top__img" alt="画像1" src="<?php echo get_template_directory_uri() ?>/images/img/01.jpeg" />

  
  <div class="f-mainWrap">
    <main class="f-main">
      <!-- 流れ星 -->
      <p class="c-awes__star shootingstar1"></p>
      <p class="c-awes__star shootingstar2"></p>

      <!-- パンくず -->
      <?php custom_breadcrumb(); ?>
      
      <h1>会社概要</h1>
      工事中

    </main>

    <aside class="f-sidebar">
        <?php include("sidebar.php"); ?>
    </aside>
  </div><!-- f-mainWrap -->

<?php get_footer(); ?>