<?php get_header(); ?>


<main>
  <section class="mv layout-mv">
    <div class="mv__inner">
      <div class="mv__swiper js-mv-swiper swiper">
        <div class="swiper-wrapper">
          <?php
          $mv_images = SCF::get('mv-images');
          if ($mv_images && is_array($mv_images)) :
            foreach ($mv_images as $image) :
              if (!empty($image['mv-img']) && !empty($image['mv-sp-img'])) :
                $image_pc = wp_get_attachment_image_url($image['mv-img'], 'full');
                $image_sp = wp_get_attachment_image_url($image['mv-sp-img'], 'full');
                $alt_text = !empty($image['mv-alt']) ? esc_attr($image['mv-alt']) : get_post_meta($image['mv-img'], '_wp_attachment_image_alt', true);
          ?>
                <div class="swiper-slide">
                  <picture class="mv__img">
                    <source media="(max-width: 768px)" srcset="<?php echo esc_url($image_sp); ?>" />
                    <source media="(min-width: 769px)" srcset="<?php echo esc_url($image_pc); ?>" />
                    <img src="<?php echo esc_url($image_pc); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
                  </picture>
                </div>
          <?php
              endif;
            endforeach;
          endif;
          ?>
        </div>

      </div>
      <div class="mv__title-wrap title">
        <h2 class="title__main">
          <span>Australia's<br>
            Best Tours</span>
        </h2>
        <p class="title__sub">絶景と感動の旅へようこそ</p>
      </div>
    </div>
  </section>


  <section class="tours layout-tours">
    <div class="tours__inner inner">
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="tours__header section-header">
        <h2 class="section-header__title js-animation">
          <span>T</span>
          <span>o</span>
          <span>u</span>
          <span>r</span>
          <span>s</span>
        </h2>
      </div>
      <div class="tours__swiper-wrap">
        <div class="js-tours-swiper swiper">
          <ul class="tours__swiper-wrapper swiper-wrapper">
            <?php
            // キャンペーン記事を取得
            $args = array(
              'post_type' => 'tours',
              'posts_per_page' => -1,
            );
            $tours_query = new WP_Query($args);

            if ($tours_query->have_posts()) :
              while ($tours_query->have_posts()) : $tours_query->the_post();
                $terms = get_the_terms(get_the_ID(), 'tours_genre');
                $tours_info = get_field('tours_info');

                // タグを取得
                $tours_tag = !empty($terms) && !is_wp_error($terms) ? esc_html($terms[0]->name) : 'ジャンルが見つかりませんでした。';

                // カスタムフィールドから情報を取得
                $tours_title = get_the_title(); // 投稿タイトル

                // カスタムフィールドの 'tours_info' から情報を取得
                $plan_title = isset($tours_info['plan_title']) ? esc_html($tours_info['plan_title']) : '情報がありません';
                $price_info = isset($tours_info['price_info']) ? $tours_info['price_info'] : array();
                $price = isset($price_info['price']) ? '￥' . number_format($price_info['price']) : '価格情報がありません';
                $price_discount = isset($price_info['price_discount']) ? '￥' . number_format($price_info['price_discount']) : '割引価格未設定';
            ?>

                <li class="tours__slide swiper-slide">
                  <div class="tours-card">
                    <div class="tours-card__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">
                      <?php else : ?>
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                      <?php endif; ?>
                    </div>

                    <div class="tours-card__item-body">
                      <div class="tours-card__meta">
                        <span class="tours-card__tag"><?php echo $tours_tag; ?></span>
                        <p class="tours-card__category"><?php echo $tours_title; ?></p>
                      </div>
                      <div class="tours-card__contents">
                        <p class="tours-card__title"><?php echo esc_html($plan_title); ?></p>
                        <div class="tours-card__price-body">
                          <span class="tours-card__price"><?php echo esc_html($price); ?></span>
                          <span class="tours-card__price-discount"><?php echo esc_html($price_discount); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

            <?php
              endwhile;
              wp_reset_postdata();
            else :
              echo '<li>No tours found.</li>';
            endif;
            ?>

          </ul>
        </div>
      </div>
      <div class="tours__button">
        <a href="<?php echo esc_url(home_url('/tours/')); ?>" class="button">
          <span>View more</span>
        </a>
      </div>
    </div>
  </section>


  <section class="about-us layout-about-us">
    <div class="about-us__inner inner">
      <div class="about-us__header section-header">
        <h2 class="section-header__title section-header__title--aboutUs js-animation">
          <span>A</span>
          <span>b</span>
          <span>o</span>
          <span>u</span>
          <span>t</span>
          <span>&nbsp;</span>
          <span>u</span>
          <span>s</span>
        </h2>
      </div>

      <div class="about-us__wrapper">
        <div class="about-us__img-wrap">
          <div class="about-us__img-left js-fade-up">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us_1.png" alt="カンガルーが横を向いている様子" />
          </div>

          <div class="about-us__img-right">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us_2.jpg" alt="荒原の中にあるエアーズロック" />
          </div>
        </div>

        <div class="about-us__contents">
          <div class="about-us__title-wrap">
            <h3 class="about-us__title">
              Who <br class="u-desktop" />
              <span>We Are?</span>
            </h3>
          </div>
          <div class="about-us__text-wrap">
            <div class="about-us__text">
              私たちは、オーストラリア専門のツアーを提供し、壮大な自然、豊かな文化、そして多彩なアクティビティを体験できるユニークな旅をご提案します。<br />
              すべての旅が特別な思い出となるよう、一人ひとりに寄り添ったサービスで、心に残る冒険をお約束します。
            </div>
            <div class="about-us__button">
              <a href="<?php echo esc_url(home_url('/about-us/')); ?>" class="button button--aboutUs">
                <span>View more</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="information layout-information">
    <div class="information__inner inner">
      <div class="information__header section-header">
        <h2 class="section-header__title section-header__title--white js-animation">
          <span>I</span>
          <span>n</span>
          <span>f</span>
          <span>o</span>
          <span>r</span>
          <span>m</span>
          <span>a</span>
          <span>t</span>
          <span>i</span>
          <span>o</span>
          <span>n</span>
        </h2>
      </div>

      <div class="information__wrap">
        <div class="information__img js-inview">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information.jpg" alt="" />
        </div>

        <div class="information__body">
          <div class="information__contents">
            <h3 class="information__title">Nature</h3>
            <p class="information__text">
              オーストラリアの自然と冒険は、息を呑むような景観とエキサイティングな体験を提供します。<br />グレートバリアリーフでは、シュノーケリングやダイビングで色とりどりの珊瑚や海洋生物と触れ合えます。さらに、ウルルの神秘的な姿や、アウトバックでのキャンプ、熱帯雨林のトレッキングなど、多彩なアクティビティが待っています。壮大な自然の中でのサファリツアーや、地元の文化に触れるエクスペリエンスを通じて、忘れられない冒険が広がるでしょう。
            </p>

          </div>
        </div>
      </div>
    </div>
    <div class="information__button">
      <a href="<?php echo esc_url(home_url('/information/')); ?>" class="button">
        <span>View more</span>
      </a>
    </div>
  </section>

  <section class="blog layout-blog">
    <div class="blog__inner inner">
      <div class="blog__header section-header">
        <h2 class="section-header__title section-header__title--blog js-animation">
          <span>B</span>
          <span>l</span>
          <span>o</span>
          <span>g</span>
        </h2>
      </div>

      <ul class="blog__items blog-cards">
        <?php
        // 変更: home.phpのデータを取得して表示
        $args = array(
          'post_type' => 'post', // 通常の投稿タイプ
          'posts_per_page' => 3, // 表示する投稿数
        );
        $blog_query = new WP_Query($args);

        if ($blog_query->have_posts()) :
          while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
            <li class="blog-cards__item">
              <a href="<?php the_permalink(); ?>" class="blog-card js-blog-card">
                <div class="blog-card__img">
                  <?php if (get_the_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" />
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                  <?php endif; ?>
                </div>
                <div class="blog-card__body">
                  <div class="blog-card__meta">
                    <time class="blog-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
                    <?php $cat = get_the_category();
                    $cat = $cat[0]->cat_name; ?>
                    <p class="blog-card__category"><?php the_title(); ?></p>
                  </div>
                  <p class="blog-card__text">
                    <?php
                    $content = mb_substr(strip_tags(get_the_content()), 0, 86);
                    echo $content;
                    ?>
                  </p>
                </div>
              </a>
            </li>
        <?php
          endwhile;
          wp_reset_postdata(); // クエリをリセット
        else :
          echo '<li>No blog posts found.</li>'; // 投稿が見つからない場合
        endif;
        ?>
      </ul>
      <div class="blog__button">
        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="button">
          <span>View more</span>
        </a>
      </div>

    </div>
  </section>



  <section class="options layout-options">
    <div class="options__inner inner">
      <div class="options__header section-header">
        <h2 class="section-header__title section-header__title--white js-animation">
          <span>O</span>
          <span>p</span>
          <span>t</span>
          <span>i</span>
          <span>o</span>
          <span>n</span>
          <span>s</span>
        </h2>
      </div>
      <div class="options__contents">
        <?php
        // 固定ページIDを指定してSCFからメニューを取得
        $menu = SCF::get('menu', 127); // ID 127のページからメニューを取得
        if (is_array($menu) && !empty($menu)) :
          $grouped_items = [];
          foreach ($menu as $item) :
            $category = $item['add_category']; // カテゴリー名を取得
            if (is_array($category)) :
              foreach ($category as $cat) :
                if (!isset($grouped_items[$cat])) :
                  $grouped_items[$cat] = [];
                endif;
                $grouped_items[$cat][] = $item;
              endforeach;
            else :
              if (!isset($grouped_items[$category])) :
                $grouped_items[$category] = [];
              endif;
              $grouped_items[$category][] = $item;
            endif;
          endforeach;

          // 各カテゴリーのデータを出力
          foreach ($grouped_items as $category => $items) :
        ?>
            <div class="options__lists">
              <p class="options__title"><?php echo esc_html($category); ?></p> <!-- カテゴリー名を表示 -->
              <dl class="options__menu">
                <?php
                foreach ($items as $item) :
                ?>
                  <div class="options__list">
                    <dt class="options__name"><?php echo esc_html($item['add_title']); ?></dt> <!-- サブフィールドからタイトルを表示 -->
                    <dd class="options__cost">
                      <?php
                      // add_price が存在し、数値であることを確認
                      $add_price = isset($item['add_price']) && is_numeric($item['add_price']) ? $item['add_price'] : 0;
                      $formatted_price = '￥' . number_format($add_price);
                      echo esc_html($formatted_price);
                      ?>
                    </dd> <!-- サブフィールドから価格を表示 -->
                  </div>
                <?php endforeach; ?>
              </dl>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <p>料金情報がありません。</p>
        <?php endif; ?>

      </div>
    </div>
    <div class="options__button">
      <a href="<?php echo esc_url(home_url('/options/')); ?>" class="button">
        <span>View more</span>
      </a>
    </div>
    </div>
  </section>

  <section class="voice layout-voice">
    <div class="voice__inner inner">
      <div class="voice__wave">
        <div class="voice__header section-header">
          <h2 class="section-header__title section-header__title--voice js-animation">
            <span>V</span>
            <span>o</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
          </h2>
        </div>

        <ul class="voice__items voice-cards">
          <?php
          // 変更: archive-voice.phpのデータを取得して表示
          $args = array(
            'post_type' => 'voice', // カスタム投稿タイプ
            'posts_per_page' => 2, // 表示する投稿数
          );
          $voice_query = new WP_Query($args);

          if ($voice_query->have_posts()) :
            while ($voice_query->have_posts()) : $voice_query->the_post();
          ?>
              <li class="voice-cards__item">
                <div class="voice-card">
                  <div class="voice-card__body">
                    <div class="voice-card__wrap">
                      <div class="voice-card__contents">
                        <div class="voice-card__meta">
                          <?php
                          // グループフィールドを取得
                          $voice_info = get_field('voice_info');

                          // voice_age の取得（選択フィールドの場合）
                          $age_value = '';
                          if (is_array($voice_info) && isset($voice_info['voice_age'])) {
                            $age_value = esc_html($voice_info['voice_age']); // 単一の値を取得
                          }

                          // voice_gender の取得（選択フィールドの場合）
                          $gender_value = '';
                          if (is_array($voice_info) && isset($voice_info['voice_gender'])) {
                            $gender_value = esc_html($voice_info['voice_gender']); // 単一の値を取得
                          }
                          ?>

                          <span class="voice-card__age">
                            <?php echo $age_value . ($gender_value ? "($gender_value)" : ''); ?>
                          </span>
                          <!-- カテゴリー -->
                          <?php if ($taxonomy_terms = get_the_terms(get_the_ID(), 'voice_genre')) : foreach ($taxonomy_terms as $taxonomy_term) : ?>
                              <p class="voice-card__tag"><?php echo esc_html($taxonomy_term->name); ?></p>
                          <?php endforeach;
                          endif; ?>

                        </div>
                        <div class="voice-card__title">
                          <?php the_title(); ?>
                        </div>
                      </div>

                      <div class="voice-card__img js-inview">
                        <?php if (has_post_thumbnail()) :
                          $thumbnail_id = get_post_thumbnail_id();
                          $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // 代替テキストを取得
                        ?>
                          <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                        <?php else : ?>
                          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                        <?php endif; ?>
                      </div>
                    </div>

                    <p class="voice-card__text">
                      <?php the_content(); ?>
                    </p>
                  </div>
                </div>
              </li>
            <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p>記事が投稿されていません</p>
      <?php endif; ?>
      <div class="voice__button">
        <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="button button--yellow">
          <span>View more</span>
        </a>
      </div>
      </div>
    </div>
  </section>


  <?php get_footer(); ?>