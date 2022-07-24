//ブレイクポイントの設定
var breakpoint_sm = 400;
var breakpoint_md = 768;
var breakpoint_lg = 1200;

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


//ハンバーガーメニュー
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



// Windowサイズによってヘッダーメニューのスタイルを変更
$(window).on("load resize", function () {
  if (window.innerWidth > breakpoint_md) {
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


//スライドアニメーション
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
        $(this).addClass("is-scrolled");
      }
    });
  });
});

$(function () {
  var show = $("[class*='js-scroll-show']");
  // var windowHeight = $(window).height();
  // if ($(location).attr('pathname') !== "/") {
  //   windowHeight = 500;
  // }
  $(window).on('scroll', function () {
    $(show).each(function () {
      var scroll = $(window).scrollTop();

      if (scroll > 10) {
        $(this).addClass("is-scrolled");
      }
      else{
        $(this).removeClass("is-scrolled");
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

    $(jsdomt).addClass("is-finished");

  }
  else{
    $(jsdomt).delay(2000).queue(function(){
      $(this).addClass("is-finished").dequeue;
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