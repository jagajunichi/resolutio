//ブレイクポイントの設定
var breakpoint_sm = 400;
var breakpoint_md = 768;
var breakpoint_lg = 1000;
var breakpoint_xl = 1200;


$(function () {
    // デモのチェックボタンにチェックを入れる
    $(window).on('load', function () {
        setTimeout(function(){
            $('.demo--c').prop('checked', true);
        },1000)
        
      //北千里の場合ヘッダが無いのでその調整
      if (document.URL.match("kitasenri")) {
        $(".f-header h1").css("margin-top", "10px");
        $(".f-header h1").css("font-size", "50px");
        if (window.innerWidth < 768) {
          $(".f-header h1").css("margin-top", "0");
          $(".f-header h1").css("font-size", "32px");
        }
      }
    });

    var appear = false;
    var pagetop = $('#js-pageTop');
    var pagebottom = $('#js-pageBottom');

    var doch=0;
    var winh=0;
    var bottom=0;

    
    /* var doch = document.body.clientHeight; */ //ページ全体の高さ
    $(window).on('load', function () {
        doch = $(document).innerHeight(); //ページ全体の高さ
        winh = $(window).innerHeight(); //ウィンドウの高さ
        bottom = doch - winh; //ページ全体の高さ - ウィンドウの高さ = ページの最下部位置
    });


    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {  //100pxスクロールしたら
        if (appear == false) {
          appear = true;
          pagetop.stop().animate({
            'bottom': '2px' //下から2pxの位置に
          }, 300); //0.3秒かけて現れる
          pagebottom.stop().animate({
            'bottom': '2px' //下から2pxの位置に
          }, 300); //0.3秒かけて現れる
        }
      } else {
        if (appear) {
          appear = false;
          pagetop.stop().animate({
            'bottom': '-100px'
          }, 300); //0.3秒かけて隠れる
          pagebottom.stop().animate({
            'bottom': '-100px'
          }, 300); //0.3秒かけて隠れる
        }
      }
    });
    pagetop.click(function () {
      $('body, html').animate({ scrollTop: 0 }, 500); //0.5秒かけてトップへ戻る
      return false;
    });
    pagebottom.click(function () {
      $('body, html').animate({ scrollTop: bottom }, 500); //0.5秒かけてトップへ戻る
      return false;
    });
  });

// ナビのアニメーション
// $(function () {
//   $('.menu-trigger').on('click', function () {
//     if ($(".global-nav .nav-list").css("display") === "block") {

//       $(".global-nav .nav-list").slideUp("1500");
//       $(".global-nav").height("0vh");

//     } else {
//       $(".global-nav").height("100vh");
//       $(".global-nav .nav-list").slideDown("1500");
//     }

//     $(this).toggleClass('active');
//     return false;
//   });
// }); 

$(function () {
  $('.menu-trigger').on('click', function () {
    if ($(".p-navList").css("display") === "block") {

      $(".p-navList").slideUp("1500");
      $(".p-nav").height("0vh");

    } else {
      $(".p-nav").height("100vh");
      $(".p-navList").slideDown("1500");
    }

    $(this).toggleClass('active');
    return false;
  });
});



// Windowサイズによってスタイルを変更
$(window).on("load resize", function () {
  if (window.innerWidth > 768) {
    $(".global-nav .nav-list").css("display", "flex");
  } else {
    $(".global-nav .nav-list").css("display", "none");
  }
});

// アコーディオンメニュー
$(".nav-item").on("click", function () {
  if (window.matchMedia("(max-width: 768px)").matches) {
    $(this).children(".nav-item_sub").slideToggle();
    $(".nav-item").not($(this)).children(".nav-item_sub").slideUp();
  }
});

$(function () {
  $(".js-slick").slick({
    autoplay: true, // 自動再生を設定
    arrows: false, // 矢印
    autoplaySpeed: 4000, // 自動再生のスピード（ミリ秒単位）
    dots: false, // ドットインジケーターの表示
    centerMode: true,//画像を中央に持ってくる
    centerPadding: '10%',//画面端に前後の画像が見える
    responsive: [//レスポンシブデザイン
      {
        breakpoint: breakpoint_md,//ブレイクポイントの
        settings: {
          centerPadding: '0',
        }
      },
    ]
  });
});


$(function () {
  var fadeIn = $("[class*='js-scroll-fade']");
  var windowHeight = $(window).height();
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();

    $(fadeIn).each(function () {
      var offset = $(this).offset().top;
      if (scroll > offset - windowHeight + 250) {
        $(this).addClass("is-scroll");
      }
    });
  });
});

$(function () {
  var show = $("[class*='js-scroll-show']");
  var windowHeight = $(window).height();
  if ($(location).attr('pathname') !== "/") {
    windowHeight = 500;
  }
  $(window).on('scroll', function () {
    $(show).each(function () {
      var scroll = $(window).scrollTop();

      if (scroll > windowHeight) {
        $(this).addClass("is-scroll");
      }
      else{
        $(this).removeClass("is-scroll");
      }
    });
  });
});
















//vivus 描画アニメーション
// $(function () {
//   var maskanimation = new Vivus('MASK', {//アニメーションをするIDの指定
//   start: 'manual',//自動再生//自動再生をせずスタートをマニュアルに'manual'
//   type: 'scenario-sync',// アニメーションのタイプを設定
//   duration:200,//アニメーションの時間設定。数字が小さくなるほど速い
//   forceRender: false/* , *///パスが更新された場合に再レンダリングさせない
//   /* animTimingFunction: Vivus.EASE, *///動きの加速減速設定
// });
//   maskanimation.play();
// });

//vivus 描画アニメーション
$(function () {
  // var vivusText = 
  new Vivus('text', {
    type: 'delayed',
    duration: 200,
    animTimingFunction: Vivus.EASE,
    start: 'autostart',
    onReady: function () {
$(".cls-2").addClass('is-ready')}

  }, function () {
    $(".cls-2").addClass('is-end');
  });
});


$(window).on("load", function () {
  var jsdomt = $(".p-nav"); 
  if ($(location).attr('pathname') == "/testpage2/") {

    $(jsdomt).addClass("is-finish");

  }
  else{
    $(jsdomt).delay(2000).queue(function(){
      $(this).addClass("is-finish").dequeue;
    });
  }
});


//フォーム
$(function () {
  $(".js-close,.overlay").on('click', function () {
    $(".contact ,.overlay").addClass("hidden");
  })

  $(".btn").on('click', function () {
    $(".contact ,.overlay").removeClass("hidden");
  })
});