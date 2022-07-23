<?php get_header(); ?>
<!-- 表示ページがない場合に表示されるページ -->

  <div class="silckWrap f-sticky">
    <ul class="js-slick">
      <li><img alt="画像1" src="<?php echo get_template_directory_uri() ?>/images/img/01.jpeg" /></li>
      <li><img alt="画像2" src="<?php echo get_template_directory_uri() ?>/images/img/02.jpeg" /></li>
      <li><img alt="画像3" src="<?php echo get_template_directory_uri() ?>/images/img/03.jpeg" /></li>
    </ul>
  </div>
  
  <?php include("vivus.php"); ?>

  <div class="f-mainsidebarWrap f-sticky">
    <div class="f-left"></div>
    <main class="f-main">
      <!-- 流れ星 -->
      <p class="c-awes__star shootingstar1"></p>
      <p class="c-awes__star shootingstar2"></p>

      <!-- パンくず -->
      <?php custom_breadcrumb(); ?>

      <h1>RESOLUTIO</h1>
         <p><?php echo get_post_custom(14)['hoge']; ?></p>


      <section class="c-contMd js-scroll-faderight">
        <img class="c-contMd__img" src="<?php echo get_template_directory_uri() ?>/images/img/01.jpeg">
        <div class="c-descMd">
          <h2 class="c-descMd__title c-heading--leftline">Wordpress講習</h2>
          <p class="c-descMd__text">
              ホームページの作成を依頼すると経費がかさんでしまいます。
              その点ワードプレスでホームページを作成すると無料で作成することが出来ます。
              ワードプレスでのホームページの作成の一連の流れを講習させていただきます。
          </p>
        </div>
      </section>
      
      <section class="c-contMd c-contMd--reverse js-scroll-fadeleft">
        <img class="c-contMd__img" src="<?php echo get_template_directory_uri() ?>/images/img/04.jpeg">
        <div class="c-descMd">
          <h2 class="c-descMd__title c-heading--leftline">ホームページ分析</h2>
          <p class="c-descMd__text">
              ホームページからの集客を考えている方はもっとも大切と言っていいほどのgoogleアナリティクス。
              これがあることで、ユーザー数やクリックしている箇所、集中して読まれている部分など、
              たくさんの分析が可能です。
              しかし、実際に分析できている企業はかなり少ないです。
              まずは、分析を始めるための準備から無料でさせていただ来ますので、ご一考ください。
          </p>
        </div>
      </section>
      
      <section class="c-contMd  c-contMd--reverse js-scroll-fadeleft">
        <img class="c-contMd__img" src="<?php echo get_template_directory_uri() ?>/images/img/03.jpeg">
        <div class="c-descMd">
          <h2 class="c-descMd__title c-heading--leftline">就職仲介</h2>
          <p class="c-descMd__text">
              私達がこれまでに培ってきた人脈を使い、就職したい方、フリーランスになりたい方の就職支援を行っております。
              
            </p>
        </div>
      </section>

      <section class="c-contMd js-scroll-faderight">
        <img class="c-contMd__img" src="<?php echo get_template_directory_uri() ?>/images/img/02.jpeg">
        <div class="c-descMd">
          <h2 class="c-descMd__title c-heading--leftline">Web作成</h2>
          <p class="c-descMd__text">
              お客様の要望に合わせたホームページの作成をさせていただきます。
              簡単な修正から、ホームページの一新までなんでも対応いたします！
              お気軽にご相談ください！

          </p>
        </div>
      </section>
      

      <section class="c-contMd  c-contMd--reverse js-scroll-fadeleft">
        <img class="c-contMd__img" src="<?php echo get_template_directory_uri() ?>/images/img/03.jpeg">
        <div class="c-descMd">
          <h2 class="c-descMd__title c-heading--leftline">動画作成</h2>
          <p class="c-descMd__text">
              近年Youtubeやtiktokに始まる動画の重要性が増してきております。
              ロゴアニメーションから動画撮影までご相談ください。</p>
        </div>
      </section>

      <section class="c-contMd js-scroll-faderight">
        <img class="c-contMd__img" src="<?php echo get_template_directory_uri() ?>/images/img/04.jpeg">
        <div class="c-descMd">
          <h2 class="c-descMd__title c-heading--leftline">PCお悩み相談</h2>
          <p class="c-descMd__text">
            パソコンが重い、フリーズする、プリンタと接続できないなど、パソコン周りで問題が起こることがあるかと思います。
            そんな時に気軽に相談できる場所を提供したいと考えております。</p>
        </div>
      </section>


    </main>

    <aside class="f-sidebar">
        <?php include("sidebar.php"); ?>
    </aside>
    <div class="f-right"></div>
  </div><!-- f-mainsidebarWrap -->


<?php get_footer(); ?>
