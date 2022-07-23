<!-- archive は 一覧の出力 -->
<!-- デフォルトではブログに投稿した記事の一覧を出力 -->
<?php get_header(); ?>

<img class="l-top__img" alt="画像1" src="<?php the_post_thumbnail_url(); ?>" />


<div class="f-mainWrap">
  <main class="f-main">
  <?php custom_breadcrumb(); ?>

  <h1><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?> </h1>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="c-contMd js-scroll-faderight">
        <img class="c-contMd__img" src="<?php the_post_thumbnail_url(); ?>">
        <div class="c-descMd">
          <h2 class="c-descMd__title c-heading--leftline"><?php the_title(); ?></h2>
          <p class="c-descMd__text">
              <?php the_content(); ?>
          </p>
        </div>
      </section>

  <?php endwhile; ?>
  <?php else: ?>
      <p>記事がありません</p>
  <?php endif; ?>

  <?php the_posts_pagination( array(
      'mid_size' => 1,
      'prev_text' => '前へ',
      'next_text' => '次へ',
      'screen_reader_text' => ' '
  ) ); ?>

  </main>

    <aside class="f-sidebar">
        <?php include("sidebar.php"); ?>
    </aside>
  </div><!-- f-mainWrap -->

<?php get_footer(); ?>