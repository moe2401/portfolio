<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <?php wp_head(); ?>

</head>

<body>
  <!-- loading animation -->
  <?php if (is_front_page()) : ?>
    <section class="loading js-animation">
      <div class="loading__items">
        <div class="loading__item"></div>
        <div class="loading__item"></div>
        <div class="loading__item u-desktop"></div>
        <h1 class="loading__title">
          <span>W</span>
          <span>E</span>
          <span>L</span>
          <span>C</span>
          <span>O</span>
          <span>M</span>
          <span>E</span>
        </h1>
      </div>
    </section>
  <?php endif; ?>

  <!-- ページトップボタン -->
  <div class="page-top-button js-page-top">
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-top-button.png" alt="トップ" />
  </div>

  <header class="header js-header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="<?php echo home_url('/'); ?>">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-portfolio_1.png" alt="imagine tour" />
        </a>
      </h1>


      <nav class="header__nav">
        <ul class="header__nav-items">
          <li class="header__nav-item">
            <a href="<?php echo esc_url(home_url('/tours/')); ?>">Tours<span>ツアー</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo esc_url(home_url('/about-us/')); ?>">About us<span>私たちについて</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo esc_url(home_url('/information/')); ?>">Information<span>ツアー情報</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog<span>ブログ</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo esc_url(home_url('/voice/')); ?>">Voice<span>お客様の声</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo esc_url(home_url('/options/')); ?>">Options<span>オプション料金</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ<span>よくある質問</span></a>
          </li>
          <li class="header__nav-item">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact<span>お問い合わせ</span></a>
          </li>
        </ul>
      </nav>

      <button class="header__hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <div class="header__drawer js-drawer">
        <div class="header__drawer-nav nav-contents">
          <nav class="nav-contents__wrap">
            <ul class="nav-contents__contents">
              <li class="nav-contents__group">
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/tours/')); ?>">ツアー</a>
                </div>
                <div>
                  <ul class="nav-contents__items">
                    <li class="nav-contents__item">
                      <?php
                      $tours_info = get_term_by('slug', 'category_0', 'tours_genre');
                      ?>
                      <a href="<?= $tours_info && !is_wp_error($tours_info) ? esc_url(get_term_link($tours_info)) : '#' ?>">
                        NATURE
                      </a>
                    </li>
                    <li class="nav-contents__item">
                      <?php
                      $tours_info = get_term_by('slug', 'category_1', 'tours_genre');
                      ?>
                      <a href="<?= $tours_info && !is_wp_error($tours_info) ? esc_url(get_term_link($tours_info)) : '#' ?>">
                        CULTURE
                      </a>
                    </li>
                    <li class="nav-contents__item">
                      <?php
                      $tours_info = get_term_by('slug', 'category_2', 'tours_genre');
                      ?>
                      <a href="<?= $tours_info && !is_wp_error($tours_info) ? esc_url(get_term_link($tours_info)) : '#' ?>">
                        POPULAR
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/about-us/')); ?>">私たちについて</a>
                </div>
              </li>
            </ul>

            <ul class="nav-contents__contents">
              <li class="nav-contents__group">
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/voice/')); ?>">お客様の声</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/options/')); ?>">オプション料金</a>
                </div>
                <ul class="nav-contents__items">
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/options/')); ?>">ガイド</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/options/')); ?>">アクティビティ</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/options/')); ?>">グルメ体験</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/options/')); ?>">宿泊アップグレード</a>
                  </li>
                </ul>
              </li>
            </ul>

            <ul class="nav-contents__contents">
              <li class="nav-contents__group">
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/information/')); ?>">ダイビング情報</a>
                </div>
                <div>
                  <ul class="nav-contents__items">
                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab01">NATURE</a>
                    </li>

                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab02">CULTURE</a>
                    </li>

                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab03">POPULAR</a>
                    </li>
                  </ul>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a>
                </div>
              </li>
            </ul>

            <ul class="nav-contents__contents">
              <li class="nav-contents__group">
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/faq/')); ?>">よくある質問</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/sitemap/')); ?>">サイトマップ</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/cancel-policy/')); ?>">キャンセル<br class="u-mobile" />ポリシー</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>">利用規約</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>