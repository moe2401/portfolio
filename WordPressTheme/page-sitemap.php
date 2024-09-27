<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <div class="sub-mv__img">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sea.jpg" alt="青い透き通った海と男性が乗った一隻のボートの様子" />
      </div>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Site MAP</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>

  <div class="sub-site-map layout-site-map">
    <div class="sub-site-map__inner inner">
      <div class="sub-site-map__content">
        <div class="sub-site-map__nav nav-contents">
          <nav class="nav-contents__wrap nav-contents__wrap--gap">
            <ul class="nav-contents__contents nav-contents__contents--darkGreen">
              <li class="nav-contents__group">
                <div class="nav-contents__title nav-contents__title--dark">
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
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/about-us/')); ?>">私たちについて</a>
                </div>
              </li>
            </ul>

            <ul class="nav-contents__contents nav-contents__contents--darkGreen">
              <li class="nav-contents__group">
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/voice/')); ?>">お客様の声</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
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

            <ul class="nav-contents__contents nav-contents__contents--darkGreen">
              <li class="nav-contents__group">
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/information/')); ?>">ダイビング情報</a>
                </div>
                <div>
                  <ul class="nav-contents__items">
                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab01">ライセンス講習</a>
                    </li>
                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab03">体験ダイビング</a>
                    </li>
                    <li class="nav-contents__item">
                      <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab02">ファンダイビング</a>
                    </li>
                  </ul>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a>
                </div>
              </li>
            </ul>

            <ul class="nav-contents__contents nav-contents__contents--darkGreen">
              <li class="nav-contents__group">
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/faq/')); ?>">よくある質問</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/sitemap/')); ?>">サイトマップ</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
                </div>
                <div class="nav-contents__title">
                  <a href="<?php echo esc_url(home_url('/cancel-policy/')); ?>">キャンセル<br class="u-mobile" />ポリシー</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>">利用規約</a>
                </div>
                <div class="nav-contents__title nav-contents__title--dark">
                  <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問合せ</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <?php get_footer(); ?>