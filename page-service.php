<?php get_header(); ?>


  <img class="l-top__img" alt="画像1" src="<?php echo get_template_directory_uri() ?>/images/img/08.jpeg" />

  
  <div class="f-mainWrap">
    <main class="f-main">
      <!-- 流れ星 -->
      <p class="c-awes__star shootingstar1"></p>
      <p class="c-awes__star shootingstar2"></p>

      <!-- パンくず -->
      <?php custom_breadcrumb(); ?>
      
      <h1>SERVICE</h1>
      <section class="c-contLg">
        <img class="c-contLg__img" src="<?php echo get_template_directory_uri() ?>/images/img/07.jpeg">
        <div class="c-descLg">
          <h2 class="c-descLg__title">Web作成</h2>
          <h3 class="c-descLg__subtitle c-heading--bottomline">レスポンシブデザイン</h3>
          <p class="c-descLg__text">
            近年、スマートフォンの台頭により、レスポンシブデザイン(PC、スマートフォンどちらでも画面に合わせてサイト変形するデザイン)が求められています。
            既存のページをレスポンシブデザインに変更したり、新しくページを作り直したりとどちらでも対応できる体制を作っております。
          </p>

          <h3 class="c-descLg__subtitle c-heading--bottomline">Web業界の現状</h3>
          <p class="c-descLg__text">
            Webの世界は進展が早く、例えばGoogleは短いスパンで検索のアルゴリズムを変更しており、
            常に最新情報を手に入れながらサイトを更新していく必要が有ります。
            何年も更新されていないページはどんどんいらない情報として処理されてしまいます。
          </p>
          
          <h3 class="c-descLg__subtitle c-heading--bottomline">これから必要になること</h3>
          <p class="c-descLg__text">
            先に述べたようにインターネットの世界は進展が非常に早いです。
            外部委託すれば解決できることも多いですが、
            自身で知識をつけていかないと、必要の無いこともやる羽目になってしまいます。
            最低限、自分たちに必要なものが理解できるだけの現状を知っていく必要が有ります。
            そのための講習を私たちは実践しております。
          </p>
          
        </div>
      </section>


    </main>

    <aside class="f-sidebar">
        <?php include("sidebar.php"); ?>
    </aside>
  </div><!-- f-mainWrap -->

<?php get_footer(); ?>