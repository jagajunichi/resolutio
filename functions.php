<?php
  function my_setup(){
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // titleタグ自動生成
    add_theme_support('html5', array( //HTML5による出力
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));
  }
  add_action('after_setup_theme', 'my_setup');


/* CSSとJavaScriptの読み込み */
function my_script_init()
  { // WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    // jQueryの読み込み
    // wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.5.1.min.js', "", "1.0.1");
    wp_enqueue_script( 'jquery_cdn', '//code.jquery.com/jquery-3.5.1.min.js');
    // wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.1', true );
    // wp_enqueue_style( 'style-css', get_template_directory_uri() . '/css/style.css', array(), '1.0.1' );
  }
  add_action('wp_enqueue_scripts', 'my_script_init');




//PHPMailer設定
function set_phpmailer_details( $phpmailer ) {
  $phpmailer->isSMTP();     
  $phpmailer->Host = 'smtp.lolipop.jp';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = '587';  //587 or 465
  $phpmailer->Username = 'info@resolution.secret.jp';
  $phpmailer->Password = 'fw1_8---c-ryMO_L';
  $phpmailer->SMTPSecure = '';  //tls or ssl
  $phpmailer->From       = 'info@resolution.secret.jp';
  /* 送信者名 */
  $phpmailer->FromName = "hoge";
  /* デバッグ */
  $phpmailer->SMTPDebug = 0;
}
add_action( 'phpmailer_init', 'set_phpmailer_details' );


//WordpressのデフォルトのCSSを消す
function remove_global_styles(){
  wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'remove_global_styles' );


//テーマのアップデート通知を消す
add_filter("pre_site_transient_update_themes", "__return_null");

// 「プラグイン」の自動更新メール通知を停止する
add_filter( 'auto_plugin_update_send_email', '__return_false' );


// 独自関数の読み込み
function imgRes($imgPath){
  $fullPath="https://newthings.life/wp-content/themes/cier_temp/".$imgPath;
  
  // htmlの出力
  echo '<picture>';
  echo '  <source srcset="'.$fullPath.'.webp" type="image/webp">';
  echo '  <img src="'.$fullPath.'.jpg">';
  echo '</picture>';
}

function getfield() {
	$price = get_post_meta(get_the_ID(), 'test', true);
	return $price;
}
add_shortcode('custom', 'getfield');

// パンくずリストJSON-LD
function json_breadcrumb() {
 
  if( is_admin() || is_home() || is_front_page() ){ return; }
 
  $position  = 1;
  $query_obj = get_queried_object();
  $permalink = ( empty($_SERVER["HTTPS"] ) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
 
  $json_breadcrumb = array(
    "@context"        => "http://schema.org",
    "@type"           => "BreadcrumbList",
    "name"            => "パンくずリスト",
    "itemListElement" => array(
      array(
        "@type"    => "ListItem",
        "position" => $position++,
        "item"     => array(
          "name" => "HOME",
          "@id"  => esc_url( home_url('/') ),
        )
      ),
    ),
  );
 
  if( is_page() ) {
 
    $ancestors   = get_ancestors( $query_obj->ID, 'page' );
    $ancestors_r = array_reverse($ancestors);
    if ( count( $ancestors_r ) != 0 ) {
      foreach ($ancestors_r as $key => $ancestor_id) {
        $ancestor_obj = get_post($ancestor_id);
        $json_breadcrumb['itemListElement'][] = array(
          "@type"    => "ListItem",
          "position" => $position++,
          "item"     => array(
            "name" => esc_html($ancestor_obj->post_title),
            "@id"  => esc_url( get_the_permalink($ancestor_obj->ID) ),
          )
        );
      }
    }
    $json_breadcrumb['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "item"     => array(
        "name" => esc_html($query_obj->post_title),
        "@id"  => $permalink,
      )
    );
 
  } elseif( is_post_type_archive() ) {
 
    $json_breadcrumb['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "item"     => array(
        "name" => $query_obj->label,
        "@id"  => esc_url( get_post_type_archive_link( $query_obj->name ) ),
      )
    );
 
  } elseif( is_tax() || is_category() ) {
 
    if ( !is_category() ) {
      $post_type = get_taxonomy( $query_obj->taxonomy )->object_type[0];
      $pt_obj    = get_post_type_object( $post_type );
      $json_breadcrumb['itemListElement'][] = array(
        "@type"    => "ListItem",
        "position" => $position++,
        "item"     => array(
          "name" => $pt_obj->label,
          "@id"  => esc_url( get_post_type_archive_link($pt_obj->name) ),
        )
      );
    }
 
    $ancestors   = get_ancestors( $query_obj->term_id, $query_obj->taxonomy );
    $ancestors_r = array_reverse($ancestors);
    foreach ($ancestors_r as $key => $ancestor_id) {
      $json_breadcrumb['itemListElement'][] = array(
        "@type"    => "ListItem",
        "position" => $position++,
        "item"     => array(
          "name" => esc_html( get_cat_name($ancestor_id) ),
          "@id"  => esc_url( get_term_link($ancestor_id, $query_obj->taxonomy) ),
        )
      );
    }
 
    $json_breadcrumb['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "item"     => array(
        "name" => esc_html( $query_obj->name ),
        "@id"  => esc_url( get_term_link($query_obj) ),
      )
    );
 
  } elseif( is_single() ) {
 
    if ( !is_single('post') ) {
      $pt_obj = get_post_type_object( $query_obj->post_type );
      $json_breadcrumb['itemListElement'][] = array(
        "@type"    => "ListItem",
        "position" => $position++,
        "item"     => array(
          "name" => $pt_obj->label,
          "@id"  => esc_url( get_post_type_archive_link($pt_obj->name) ),
        )
      );
    }
 
    $json_breadcrumb['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "item"     => array(
        "name" => esc_html( $query_obj->post_title ),
        "@id"  => $permalink,
      )
    );
 
  } elseif( is_404() ) {
 
    $json_breadcrumb['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "item"     => array(
        "name" => "404 Not found",
        "@id"  => $permalink,
      )
    );
 
  } elseif( is_search() ) {
 
    $json_breadcrumb['itemListElement'][] = array(
      "@type"    => "ListItem",
      "position" => $position++,
      "item"     => array(
        "name" => "「" . get_search_query(). "」の検索結果",
        "@id"  => $permalink,
      )
    );
 
  }
 
  echo '<script type="application/ld+json">'.json_encode($json_breadcrumb).'</script>';
}
add_action( 'wp_head', 'json_breadcrumb' );


// パンくずリスト自動生成
if ( ! function_exists( 'custom_breadcrumb' ) ) {
  function custom_breadcrumb() {

    // トップページでは何も出力しないように
    // if ( is_front_page() ) return false;

    //そのページのWPオブジェクトを取得
    $wp_obj = get_queried_object();

    echo '<nav class="f-breadcrumb">'.  //id名などは任意で
      '<ul class="cp_breadcrumb">'.
        '<li>'.
          '<a href="'. esc_url( home_url() ) .'">ホーム</a>'.
        '</li>';

    if ( is_attachment() ) {

      /**
       * 添付ファイルページ ( $wp_obj : WP_Post )
       * ※ 添付ファイルページでは is_single() も true になるので先に分岐
       */
      $post_title = apply_filters( 'the_title', $wp_obj->post_title );
      echo '<li><a href="#">'. esc_html( $post_title ) .'</a></li>';

    } elseif ( is_single() ) {

      /**
       * 投稿ページ ( $wp_obj : WP_Post )
       */
      $post_id    = $wp_obj->ID;
      $post_type  = $wp_obj->post_type;
      $post_title = apply_filters( 'the_title', $wp_obj->post_title );

      // カスタム投稿タイプかどうか
      if ( $post_type !== 'post' ) {

        $the_tax = "";  //そのサイトに合わせて投稿タイプごとに分岐させて明示的に指定してもよい

        // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
        $tax_array = get_object_taxonomies( $post_type, 'names');
        foreach ($tax_array as $tax_name) {
            if ( $tax_name !== 'post_format' ) {
                $the_tax = $tax_name;
                break;
            }
        }

        $post_type_link = esc_url( get_post_type_archive_link( $post_type ) );
        $post_type_label = esc_html( get_post_type_object( $post_type )->label );

        //カスタム投稿タイプ名の表示
        echo '<li>'.
              '<a href="'. $post_type_link .'">'.
                ''. $post_type_label .''.
              '</a>'.
            '</li>';

        } else {

          $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示

        }

        // 投稿に紐づくタームを全て取得
        $terms = get_the_terms( $post_id, $the_tax );

        // タクソノミーが紐づいていれば表示
        if ( $terms !== false ) {

          $child_terms  = array();  // 子を持たないタームだけを集める配列
          $parents_list = array();  // 子を持つタームだけを集める配列

          //全タームの親IDを取得
          foreach ( $terms as $term ) {
            if ( $term->parent !== 0 ) {
              $parents_list[] = $term->parent;
            }
          }

          //親リストに含まれないタームのみ取得
          foreach ( $terms as $term ) {
            if ( ! in_array( $term->term_id, $parents_list ) ) {
              $child_terms[] = $term;
            }
          }

          // 最下層のターム配列から一つだけ取得
          $term = $child_terms[0];

          if ( $term->parent !== 0 ) {

            // 親タームのIDリストを取得
            $parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );

            foreach ( $parent_array as $parent_id ) {
              $parent_term = get_term( $parent_id, $the_tax );
              $parent_link = esc_url( get_term_link( $parent_id, $the_tax ) );
              $parent_name = esc_html( $parent_term->name );
              echo '<li>'.
                    '<a href="'. $parent_link .'">'.
                      ''. $parent_name .''.
                    '</a>'.
                  '</li>';
            }
          }

          $term_link = esc_url( get_term_link( $term->term_id, $the_tax ) );
          $term_name = esc_html( $term->name );
          // 最下層のタームを表示
          echo '<li>'.
                '<a href="'. $term_link .'">'.
                  ''. $term_name .''.
                '</a>'.
              '</li>';
        }

        // 投稿自身の表示
        echo '<li><a href="#">'. esc_html( strip_tags( $post_title ) ) .'</a></li>';

    } elseif ( is_page() || is_home() ) {

      /**
       * 固定ページ ( $wp_obj : WP_Post )
       */
      $page_id    = $wp_obj->ID;
      $page_title = apply_filters( 'the_title', $wp_obj->post_title );

      // 親ページがあれば順番に表示
      if ( $wp_obj->post_parent !== 0 ) {
        $parent_array = array_reverse( get_post_ancestors( $page_id ) );
        foreach( $parent_array as $parent_id ) {
          $parent_link = esc_url( get_permalink( $parent_id ) );
          $parent_name = esc_html( get_the_title( $parent_id ) );
          echo '<li>'.
                '<a href="'. $parent_link .'">'.
                  ''. $parent_name .''.
                '</a>'.
              '</li>';
        }
      }
      // 投稿自身の表示
      if ( !(is_front_page()) ){
        echo '<li><a href="#">'. esc_html( strip_tags( $page_title ) ) .'</a></li>';
      }

    } elseif ( is_post_type_archive() ) {

      /**
       * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
       */
      echo '<li><a href="#">'. esc_html( $wp_obj->label ) .'</a></li>';

    } elseif ( is_date() ) {

      /**
       * 日付アーカイブ ( $wp_obj : null )
       */
      $year  = get_query_var('year');
      $month = get_query_var('monthnum');
      $day   = get_query_var('day');

      if ( $day !== 0 ) {
        //日別アーカイブ
        echo '<li>'.
              '<a href="'. esc_url( get_year_link( $year ) ) .'">'. esc_html( $year ) .'年</a>'.
            '</li>'.
            '<li>'.
              '<a href="'. esc_url( get_month_link( $year, $month ) ) . '">'. esc_html( $month ) .'月</a>'.
            '</li>'.
            '<li><a href="#">'.
              ''. esc_html( $day ) .'日'.
            '</a></li>';

      } elseif ( $month !== 0 ) {
        //月別アーカイブ
        echo '<li>'.
              '<a href="'. esc_url( get_year_link( $year ) ) .'">'. esc_html( $year ) .'年</a>'.
            '</li>'.
            '<li><a href="#">'.
              ''. esc_html( $month ) .'月'.
            '</a></li>';

      } else {
        //年別アーカイブ
        echo '<li><a href="#">'. esc_html( $year ) .'年</a></li>';

      }

    } elseif ( is_author() ) {

      /**
       * 投稿者アーカイブ ( $wp_obj : WP_User )
       */
      echo '<li><a href="#">'. esc_html( $wp_obj->display_name ) .' の執筆記事</a></li>';

    } elseif ( is_archive() ) {

      /**
       * タームアーカイブ ( $wp_obj : WP_Term )
       */
      $term_id   = $wp_obj->term_id;
      $term_name = $wp_obj->name;
      $tax_name  = $wp_obj->taxonomy;

      /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */

      // 親ページがあれば順番に表示
      if ( $wp_obj->parent !== 0 ) {

        $parent_array = array_reverse( get_ancestors( $term_id, $tax_name ) );
        foreach( $parent_array as $parent_id ) {
          $parent_term = get_term( $parent_id, $tax_name );
          $parent_link = esc_url( get_term_link( $parent_id, $tax_name ) );
          $parent_name = esc_html( $parent_term->name );
          echo '<li>'.
                '<a href="'. $parent_link .'">'.
                  ''. $parent_name .''.
                '</a>'.
              '</li>';
        }
      }

      // ターム自身の表示

      echo '<li><a href="#">'.
            ''. esc_html( $term_name ) .''.
          '</a></li>';
      


    } elseif ( is_search() ) {

      /**
       * 検索結果ページ
       */
      echo '<li><a href="#">「'. esc_html( get_search_query() ) .'」で検索した結果</a></li>';

    
    } elseif ( is_404() ) {

      /**
       * 404ページ
       */
      echo '<li><a href="#">お探しの記事は見つかりませんでした。</a></li>';

    } else {

      /**
       * その他のページ（無いと思うけど一応）
       */
      echo '<li><a href="#">'. esc_html( get_the_title() ) .'</a></li>';

    }

    echo '</ul></nav>';  // 冒頭に合わせた閉じタグ

  }
}

