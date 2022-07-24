<?php get_header(); ?>


  <img class="l-top__img" alt="画像1" src="<?php echo get_template_directory_uri() ?>/images/img/01.jpeg" />

  
  <div class="f-mainWrap">
    <div class="f-left"></div>
    <main class="f-main">
      <!-- 流れ星 -->
      <p class="c-awes__star shootingstar1"></p>
      <p class="c-awes__star shootingstar2"></p>

      <!-- パンくず -->
      <?php custom_breadcrumb(); ?>
      
      <div class="margin-50"></div>
      
      <section class="c-contLg">
        <img class="c-contLg__img" src="<?php echo get_template_directory_uri() ?>/images/img/01.jpeg">
        <div class="c-descLg">
          <h2 class="c-descLg__title u-textcenter"></h2>
          <p class="c-descLg__text">
          </p>
          
        </div>
      </section>

      <h2 class="u-textcenter">会社概要</h2>
      <div class="margin-50"></div>
      <table class="company_discription">
        <tr>
          <th>会社名</th>
          <td>Resolutio</td>
        </tr>
        <tr>
          <th>代表者名</th>
          <td>堀 亮祐</td>
        </tr>
        <tr>
          <th>所在地</th>
          <td>大阪市東心斎橋1-17-5</td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>08064513789</td>
        </tr>
      </table>
      <div class="margin-50"></div>   
    </main>

    <aside class="f-sidebar">
        <?php include("sidebar.php"); ?>
    </aside>
    <div class="f-right"></div>
  </div><!-- f-mainWrap -->

<?php get_footer(); ?>