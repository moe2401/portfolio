<aside class="sub-blog__aside">
  <div class="sub-blog__aside-inner">
    <div class="sub-blog__popular">
      <div class="sub-blog__head">
        <h2 class="sub-blog__head-title">人気記事</h2>
      </div>

      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC'
      );

      $the_query = new WP_Query($args);
      ?>
      <?php if ($the_query->have_posts()) : ?>
        <ul class="sub-blog__popular-cards popular-cards">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="popular-cards__item">
              <a href="<?php the_permalink(); ?>" class="popular-card">
                <div class="popular-card__wrap">
                  <div class="popular-card__img">
                    <?php if (get_the_post_thumbnail()) : ?>
                      <img class="detail__thumbnail" src="<?php the_post_thumbnail_url("full"); ?>" alt="" />
                    <?php else : ?>
                      <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                    <?php endif; ?>
                  </div>

                  <div class="popular-card__body">
                    <div class="popular-card__meta">
                      <time class="blog-card__time" datetime="<?php the_time("c"); ?>"><?php the_time("Y.m/d"); ?></time>

                      <?php $cat = get_the_category();
                      $cat = $cat[0]->cat_name; ?>
                      <p class="blog-card__category"><?php the_title(); ?></p>
                    </div>
                  </div>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>

        <?php else : ?>
          <p>記事が投稿されていません</p>
        <?php endif; ?>
        </ul>
    </div>

    <!-- 口コミ -->
    <div class="sub-blog__review">
      <div class="sub-blog__head">
        <h2 class="sub-blog__head-title">口コミ</h2>
      </div>
      <?php
      $args = array(
        'post_type' => 'voice',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $the_query = new WP_Query($args);
      ?>
      <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div class="sub-blog__review-card">
            <div class="review-card__img">
              <?php if (get_the_post_thumbnail()) : ?>
                <img class="detail__thumbnail" src="<?php the_post_thumbnail_url("full"); ?>" alt="" />
              <?php else : ?>
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
              <?php endif; ?>
            </div>
            <div class="review-card__body">

              <?php
              // グループフィールドを取得
              $voice_info = get_field('voice_info');

              // voice_age の取得
              $age_value = '';
              if (is_array($voice_info) && isset($voice_info['voice_age'][0]['value'])) {
                $age_value = esc_html($voice_info['voice_age'][0]['value']);
              }

              // voice_gender の取得
              $gender_value = '';
              if (is_array($voice_info) && isset($voice_info['voice_gender'][0])) {
                $gender_value = esc_html($voice_info['voice_gender'][0]);
              }
              ?>

              <p class="review-card__category">
                <?php echo $age_value . ($gender_value ? "($gender_value)" : ''); ?>
              </p>
              <p class="review-card__text">
                <?php the_title(); ?>
              </p>
            </div>
            <div class="review-card__button">
              <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="button">
                <span>View more</span>
              </a>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <p>口コミが投稿されていません</p>
      <?php endif; ?>
    </div>


    <!-- ツアー -->
    <div class="sub-blog__tours">
      <div class="sub-blog__head">
        <h2 class="sub-blog__head-title">ツアー</h2>
      </div>
      <?php
      // 必須 ここから
      setPostViews(get_the_ID());
      // 必須 ここまで

      $args = array(
        'post_type' => 'tours',
        'posts_per_page' => 2,
        'orderby' => 'date',   // 日付でソート
        'order' => 'DESC',     // 新しい順にソート
      );

      $the_query = new WP_Query($args);
      ?>

      <?php if ($the_query->have_posts()) : ?>
        <ul class="sub-blog__tours-cards">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="sub-blog__tours-card">
              <div class="tours-card tours-card--large">
                <div class="tours-card__img tours-card__img--aside">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">
                  <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                  <?php endif; ?>
                </div>

                <div class="tours-card__item-body tours-card__item-body--aside">
                  <div class="tours-card__meta">
                    <p class="tours-card__category tours-card__category--center">
                      <?php the_title(); ?>
                    </p>
                  </div>
                  <?php
                  // tours_price グループフィールドを取得
                  $tours_info = get_field('tours_info');
                  ?>
                  <div class="tours-card__contents">
                    <p class="tours-card__title tours-card__title--small">
                      <?= $tours_info && isset($tours_info['plan_title']) ? esc_html($tours_info['plan_title']) : '情報がありません'; ?>
                    </p>
                    <div class="tours-card__price-body">
                      <span class="tours-card__price tours-card__price--small">
                        <?php
                        // price_info グループを取得
                        $price_info = isset($tours_info['price_info']) ? $tours_info['price_info'] : null;

                        // price を取得
                        $price = $price_info && isset($price_info['price']) ? $price_info['price'] : null;
                        $formatted_price = $price !== null ? '￥' . number_format($price) : '価格情報がありません';
                        echo esc_html($formatted_price);
                        ?>
                      </span>
                      <span class="tours-card__price-discount tours-card__price-discount--small">
                        <?php
                        // 割引価格を取得
                        $price_discount = $price_info && isset($price_info['price_discount']) ? $price_info['price_discount'] : null;
                        $formatted_discount = $price_discount !== null ? '￥' . number_format($price_discount) : '価格情報がありません';
                        echo esc_html($formatted_discount);
                        ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p>キャンペーン記事がありません。</p>
      <?php endif; ?>

      <div class="sub-blog__button">
        <a href="<?php echo esc_url(home_url('/tours/')); ?>" class="button">
          <span>View more</span>
        </a>
      </div>
    </div>

    <!-- アーカイブ -->
    <div class="sub-blog__archive">
      <div class="sub-blog__head">
        <h2 class="sub-blog__head-title">アーカイブ</h2>
      </div>

      <div class="sub-blog__archive-details">
        <?php
        global $wpdb;
        $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC");

        $japanese_months = array(
          1 => '1月',
          2 => '2月',
          3 => '3月',
          4 => '4月',
          5 => '5月',
          6 => '6月',
          7 => '7月',
          8 => '8月',
          9 => '9月',
          10 => '10月',
          11 => '11月',
          12 => '12月'
        );

        foreach ($years as $year) :
        ?>
          <p class="sub-blog__archive-summary js-drawer-accordion"><?php echo $year; ?>年</p>
          <ul class="sub-blog__archive-lists">
            <?php
            $months = $wpdb->get_col($wpdb->prepare("
                                SELECT DISTINCT MONTH(post_date) 
                                FROM $wpdb->posts 
                                WHERE post_type = 'post' 
                                AND post_status = 'publish' 
                                AND YEAR(post_date) = %d 
                                ORDER BY post_date DESC
                            ", $year));

            foreach ($months as $month) :
              $month_name = $japanese_months[intval($month)];
              $link = get_month_link($year, $month);
            ?>
              <li class="sub-blog__archive-item">
                <a href="<?php echo $link; ?>"><?php echo $month_name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
  </div>
</aside>