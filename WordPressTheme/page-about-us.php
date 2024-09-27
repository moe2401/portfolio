<?php get_header(); ?>
<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <div class="sub-mv__img">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-aboutus.jpg" alt="透明な海と海岸の岩の様子" />
      </div>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">About us</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>

  <section class="sub-about-us layout-sub-about-us">
    <div class="sub-about-us__inner inner">
      <div class="sub-about-us__wrapper">
        <div class="about-us__img-wrap about-us">
          <div class="about-us__img-left about-us__img-left--noShow">
            <div>
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us_1.png" alt="カンガルーが横を向いている様子" />
            </div>
          </div>

          <div class="about-us__img-right about-us__img-right--subPage">
            <div>
              <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us_2.jpg" alt="荒原の中にあるエアーズロック" />
            </div>
          </div>
        </div>

        <div class="about-us__contents about-us__contents--sub">
          <h3 class="about-us__title about-us__title--white">
            Who<br />We Are?
          </h3>
          <div class="about-us__text-wrap about-us__text-wrap--margin">
            <div class="about-us__text">
              私たちは、オーストラリア専門のツアーを提供し、壮大な自然、豊かな文化、そして多彩なアクティビティを体験できるユニークな旅をご提案します。<br />
              すべての旅が特別な思い出となるよう、一人ひとりに寄り添ったサービスで、心に残る冒険をお約束します。
            </div>
          </div>
        </div>
      </div>

      <div class="sub-about-us__gallery gallery">
        <div class="gallery__inner">
          <div class="gallery__header section-header">
            <h3 class="section-header__title">
              <span>G</span>
              <span>a</span>
              <span>l</span>
              <span>l</span>
              <span>e</span>
              <span>r</span>
              <span>y</span>
            </h3>
          </div>

          <div class="gallery__modal js-modal">
            <?php
            $gallery_group = SCF::get('gallery');
            if ($gallery_group && is_array($gallery_group)) :
            ?>
              <ul class="gallery__list gallery-list">
                <?php foreach ($gallery_group as $gallery_item) : ?>
                  <?php
                  $image = $gallery_item['gallery_img'];
                  if (!empty($image)) :
                  ?>
                    <li class="gallery-list__item js-modal-open">
                      <img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" alt="<?php echo get_post_meta($image, '_wp_attachment_image_alt', true); ?>" />
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            <div class="modal">
              <div class="bigimg"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>