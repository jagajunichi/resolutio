<!-- ブログに投稿した記事を出力 -->

<?php get_header(); ?>

<img class="l-top__img" alt="画像1" src="<?php echo get_template_directory_uri() ?>/images/img/01.jpeg" />

<div class="f-mainWrap">
  <main class="f-main">
    <!-- 流れ星 -->
    <p class="c-awes__star shootingstar1"></p>
    <p class="c-awes__star shootingstar2"></p>
    
    <!-- パンくず -->
    <?php custom_breadcrumb(); ?>

    <h1> <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></h1>
    <?php if(have_posts()): while(have_posts()): the_post(); ?> 
      <section class="c-contMd js-scroll-fadedown">
        <img class="c-contMd__img" src="<?php the_post_thumbnail_url(); ?>">
        <div class="c-descMd">
          <h2 class="c-descMd__title"><?php the_title(); ?></h2>
          <p class="c-descMd__text"><?php the_content(); ?></p>
        </div>
      </section>
    <?php endwhile; endif; ?>

    <?php the_post_navigation( array(
      'prev_text' => '前のページへ',
      'next_text' => '次のページへ'
      ));
    ?>
  </main>

    <aside class="f-sidebar">
        <?php include("sidebar.php"); ?>
    </aside>
  </div><!-- f-mainWrap -->

<?php get_footer(); ?>