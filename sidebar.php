
<h2 class="l-sidebarTitle">最近の投稿</h2>

<section class="l-articleWrap">
  <?php
    $my_posts = array(
      'post_type' => 'post', //カテゴリは特定せず
      'posts_per_page'=> '100', //とりあえず100件
      'category_name'=> 'blog' 
    );
    $wp_query = new WP_Query($my_posts);

    if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post(); 
  ?>
  <article class="c-contSm">
    <img class="c-contSm__img" src="<?php the_post_thumbnail_url(); ?>">
    <div class="c-descSm">
      <a href="<?php the_permalink(); ?>">
      <h4 class="c-descSm__title"><?php the_title(); ?></h4></a>
      <p class="c-descSm__text"><?php the_content("全文を読む"); ?></p>
    </div>
  </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
</section>


