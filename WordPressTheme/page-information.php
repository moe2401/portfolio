<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <picture class="sub-mv__img">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-info.jpg" alt="ハーバードブリッジとヤシの木の様子" />
      </picture>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Information</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>


  <section class="sub-information layout-sub-information">
    <div class="sub-information__inner inner">
      <div class="sub-information__contents">
        <div class="sub-information__tab tab-info">
          <ul class="tab-info__menu">
            <li class="tab-info__menu-item js-tab-info-menu current" data-number="tab01">
              <h2>NATURE</h2>
            </li>

            <li class="tab-info__menu-item js-tab-info-menu" data-number="tab02">
              <h2>CULTURE</h2>
            </li>

            <li class="tab-info__menu-item js-tab-info-menu" data-number="tab03">
              <div class="tab-info__img u-desktop"></div>
              <h2>POPULAR</h2>
            </li>
          </ul>

          <ul class="tab-info__content">
            <li id="tab01" class="tab-info__content-item js-tab-info-content current">
              <a href="#" class="info-card">
                <div class="info-card__body">
                  <div class="info-card__content">
                    <div class="info-card__meta">
                      <p class="info-card__category">NATURE</p>
                    </div>
                    <p class="info-card__text">
                      オーストラリアの自然と冒険は、グレートバリアリーフでのシュノーケリングやダイビング、ウルルの神秘的な姿、アウトバックでのキャンプ、熱帯雨林のトレッキングなど、多彩な体験が楽しめます。壮大な自然の中でのサファリツアーや地元文化に触れるエクスペリエンスが、忘れられない冒険を提供します。
                    </p>
                  </div>

                  <div class="info-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/information-nature.jpg" alt="岩が3つ並んでいるブルーマウンテンの様子" />
                  </div>
                </div>
              </a>
            </li>

            <li id="tab02" class="tab-info__content-item js-tab-info-content">
              <a href="#" class="info-card">
                <div class="info-card__body">
                  <div class="info-card__content">
                    <div class="info-card__meta">
                      <p class="info-card__category">CULTURE</p>
                    </div>
                    <p class="info-card__text">
                      オーストラリアの文化は、アボリジニの伝統と多様な移民文化が融合したものです。アートや音楽、スポーツ、そしてアウトドア活動が盛んで、多国籍料理やバーベキュー文化も楽しめます。リラックスしたライフスタイルと温かい社会が魅力です。「カルチャーツアー」で、この豊かな文化を体験してみてください。
                    </p>
                  </div>

                  <div class="info-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/information-culture.jpg" alt="アボリジニーの男性が木の破片を持って立っている様子" />
                  </div>
                </div>
              </a>
            </li>

            <li id="tab03" class="tab-info__content-item js-tab-info-content">
              <a href="#" class="info-card">
                <div class="info-card__body">
                  <div class="info-card__content">
                    <div class="info-card__meta">
                      <p class="info-card__category">POPULAR</p>
                    </div>
                    <p class="info-card__text">
                      オーストラリアを訪れるなら、グレートバリアリーフでのダイビングやシュノーケリングが外せません。さらに、ウルルのサンライズツアーやシドニーのオペラハウス見学も人気です。メルボルン発のグレートオーシャンロード絶景ドライブや、タスマニアの自然探索エコツアーも見逃せない魅力。これらのツアーで、オーストラリアの豊かな自然と文化をたっぷり楽しめます。
                    </p>
                  </div>

                  <div class="info-card__img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/information-popular.jpg" alt="海の上に浮かんでいるオペラハウス" />
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>


  <?php get_footer(); ?>