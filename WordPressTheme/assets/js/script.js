"use strict";

jQuery(function ($) {
  //ハンバーガーメニュー
  $(function () {
    $(".js-hamburger").click(function () {
      $(this).toggleClass("is-open");
      $(".js-header").toggleClass("is-active");
      $(".js-drawer").fadeToggle();

      //drawer開いたらbodyスクロールしない
      // 現在のbodyタグのoverflowスタイルを確認
      if ($("body").css("overflow") === "hidden") {
        // もしoverflowがhiddenなら、bodyのスタイルを元に戻す
        $("body").css({
          height: "",
          overflow: ""
        });
      } else {
        // そうでなければ、bodyにheight: 100%とoverflow: hiddenを設定し、スクロールを無効にする
        $("body").css({
          height: "100%",
          overflow: "hidden"
        });
      }
    });
  });

  // ドロワーナビのaタグをクリックで閉じる
  $(".js-drawer a[href]").on("click", function () {
    $(".js-hamburger").removeClass("is-open");
    $(".js-drawer").fadeOut();
  });

  // resizeイベント
  $(window).on("resize", function () {
    if (window.matchMedia("(min-width: 768px)").matches) {
      $(".js-hamburger").removeClass("is-open");
      $(".js-header").removeClass("is-active");
      $(".js-drawer").fadeOut();
    }
  });

  // スライダー
  var mv_swiper = new Swiper(".js-mv-swiper", {
    loop: true,
    effect: "fade",
    speed: 3000,
    allowTouchMove: false,
    autoplay: {
      delay: 3000
    }
  });

  // カードスライド;
  var campaign_swiper = new Swiper(".js-tours-swiper", {
    loop: true,
    slidesPerView: "auto",
    spaceBetween: 24,
    speed: 2000,
    breakpoints: {
      768: {
        slidesPerView: "auto",
        spaceBetween: 40,
        width: 333
      }
    },
    autoplay: {
      delay: 1000,
      disableOnInteraction: false
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });

  //ページトップに戻るボタン
  var pageTop = $(".page-top-button");
  pageTop.hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      pageTop.fadeIn();
    } else {
      pageTop.fadeOut();
    }
  });
  pageTop.click(function () {
    $("body,html").animate({
      scrollTop: 0
    }, 800);
    return false;
  });

  // フッター手前でストップ;
  $(".page-top-button").hide();
  $(window).on("scroll", function () {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    var footHeight = $("footer").innerHeight();
    if (scrollHeight - scrollPosition <= footHeight) {
      $(".page-top-button").css({
        position: "absolute",
        bottom: footHeight + 20
      });
    } else {
      $(".page-top-button").css({
        position: "fixed",
        bottom: 30
      });
    }
  });
  var speed = 700; // speed変数を定義
  var $elements = $(".information__img, .voice-card__img, .price__img");
  if ($elements.length > 0) {
    $elements.each(function () {
      $(this).append('<div class="color"></div>');
      var color = $(this).find(".color"),
        image = $(this).find("img");
      var counter = 0;
      image.css("opacity", "0");
      color.css("width", "0%");

      //inviewを使って背景色が画面に現れたら処理をする
      color.on("inview", function () {
        if (counter == 0) {
          $(this).delay(200).animate({
            width: "100%"
          }, speed, function () {
            image.css("opacity", "1");
            $(this).css({
              left: "0",
              right: "auto"
            });
            $(this).animate({
              width: "0%"
            }, speed);
          });
          counter = 1;
        }
      });
    });
  }

  // モーダルウィンドウ
  $(document).ready(function () {
    var $modalContent = $(".modal .bigimg");
    function showModal(imgSrc, imgAlt) {
      $modalContent.html("<img src=\"".concat(imgSrc, "\" alt=\"").concat(imgAlt, "\" />"));
      $(".modal").fadeIn();
      $("body").addClass("no-scroll");
    }
    $(".js-modal-open").click(function (e) {
      e.preventDefault();
      var $img = $(this).find("img");
      var imgSrc = $img.attr("src");
      var imgAlt = $img.attr("alt");
      showModal(imgSrc, imgAlt);
    });
    $(".modal").click(function (e) {
      // モーダルの背景または画像がクリックされたかをチェック
      if ($(e.target).is(".modal") || $(e.target).closest(".modal .bigimg img").length) {
        $(this).fadeOut(function () {
          // フェードアウト完了後に中身をクリア
          $modalContent.empty();
        });
        $("body").removeClass("no-scroll");
      }
    });
  });

  //informationタブ切り替え
  $(document).ready(function () {
    var tabButton = $(".js-tab-info-menu"),
      tabContent = $(".js-tab-info-content");
    function activateTab(tabName) {
      tabButton.removeClass("current");
      tabContent.removeClass("current");

      // タブボタンとタブコンテンツを一致させる
      tabButton.each(function (index) {
        if ($(this).data("number") === tabName) {
          $(this).addClass("current");
          tabContent.eq(index).addClass("current");
        }
      });
    }
    // ページ読み込み時にクエリパラメーターを確認してタブを表示
    var params = new URLSearchParams(window.location.search);
    var tab = params.get('id');
    if (tab) {
      activateTab(tab);
    }

    // タブクリック時の処理
    tabButton.on("click", function () {
      var tabId = $(this).data("number");
      activateTab(tabId);

      // URLにクエリパラメータを追加（ページ遷移なし）
      var newUrl = window.location.pathname + '?id=' + tabId + window.location.hash;
      history.pushState(null, '', newUrl);
    });

    // 初回ロード時にタブの状態を更新
    if (!tab) {
      activateTab("tab01"); // デフォルトタブ
    }
  });

  //archive アーカイブ
  $(".js-drawer-accordion").on("click", function () {
    $(this).next().slideToggle(500);
    $(this).toggleClass("is-open");
  });
});

//FAQ
jQuery(function ($) {
  $('.js-faq-question').on('click', function () {
    $(this).next().slideToggle();
    $(this).toggleClass('is-open');
  });
});

//loading
//ローディング
var tl = gsap.timeline();
tl.fromTo(".loading__title span", {
  opacity: 0,
  x: -10
}, {
  opacity: 1,
  x: 0,
  stagger: 0.08
});
tl.fromTo(".loading__title", {
  opacity: 1,
  y: 0
}, {
  opacity: 0,
  y: -15
});
tl.fromTo(".loading__item", {
  clipPath: "inset(0% 0% 0% 0%)"
}, {
  clipPath: "inset(0% 0% 100% 0%)",
  duration: 1,
  stagger: 0.2,
  ease: "power3.inOut"
});
tl.to(".loading", {
  display: "none"
});
tl.fromTo(".title__main span", {
  opacity: 0,
  yPercent: 100
}, {
  opacity: 1,
  yPercent: 0,
  ease: "Power3.out"
});
tl.fromTo(".title__sub", {
  opacity: 0
}, {
  opacity: 1
});

//セクションタイトル
// gsap.fromTo(".section-header__title span",{opacity:0, },{opacity:1, duration:0.7, stagger:0.2,})

document.addEventListener('DOMContentLoaded', function () {
  var sectionHeaders = document.querySelectorAll('.js-animation');
  sectionHeaders.forEach(function (header) {
    var sectionTexts = header.querySelectorAll('span');
    gsap.fromTo(sectionTexts, {
      autoAlpha: 0,
      y: 20
    }, {
      autoAlpha: 1,
      y: 0,
      duration: 0.3,
      stagger: 0.1,
      // 各文字の遅延
      scrollTrigger: {
        trigger: header,
        // 各セクションのタイトルをトリガーに設定
        start: 'top center'
      }
    });
  });
});

//blogカード
gsap.fromTo(".js-blog-card", {
  opacity: 0,
  y: 10
}, {
  opacity: 1,
  y: 0,
  duration: 0.7,
  ease: "power3.out",
  stagger: 0.2,
  scrollTrigger: {
    trigger: ".js-blog-card",
    // アニメーションを発火するトリガー要素
    start: "top 80%",
    // トリガーが画面のどこに来たらアニメーションを開始するか
    end: "bottom 60%",
    // アニメーションが終了するタイミング（オプション）
    toggleActions: "play none none none" // スクロール時のアクション
  }
});