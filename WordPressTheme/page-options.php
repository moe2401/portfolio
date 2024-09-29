<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <div class="sub-mv__img">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/options.jpg" alt="青い海と尖った葉っぱのついた木の様子" />
      </div>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Options</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>


  <div class="sub-options layout-sub-options">
    <div class="sub-options__inner inner">
      <div class="sub-options__table options-lists">

        <!-- 一つの表 ここから-->
        <?php
        $menu = SCF::get('menu');
        if (is_array($menu) && !empty($menu)) :
          $grouped_items = [];
          foreach ($menu as $item) :
            $category = $item['add_category']; // チェックボックスの値が配列である場合
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
          foreach ($grouped_items as $category => $items) :

        ?>
            <div class="options-lists__items options-list">
              <p class="options-list__title">
                <span class="option-list__icon">
                  <?php
                  $icon = wp_get_attachment_image_src($items[0]['add_icon'], 'full'); // フィールドからアイコン画像を取得

                  if ($icon) : ?>
                    <img src="<?php echo esc_url($icon[0]); ?>" alt="<?php echo esc_attr($category); ?>のアイコン" />
                  <?php endif; ?>
                </span>
                <?php echo esc_html($category); ?>
              </p>

              <dl class="options-list__content">
                <?php
                foreach ($items as $item) :
                ?>
                  <div class="options-list__wrap">
                    <dt class="options-list__data">
                      <?php echo esc_html($item['add_title']); ?>
                    </dt>
                    <dd class="options-list__data">
                      <?php
                      // add_price が存在し、数値であることを確認
                      $add_price = isset($item['add_price']) && is_numeric($item['add_price']) ? $item['add_price'] : 0;
                      $formatted_price = '￥' . number_format($add_price);
                      echo esc_html($formatted_price);
                      ?>
                    </dd>
                  </div>
                <?php
                endforeach;
                ?>
              </dl>
            </div>
        <?php
          endforeach;
        endif;
        ?>
        <!-- 一つの表ここまで -->
      </div>
    </div>
  </div>

  <?php get_footer(); ?>