<?php get_header(); ?>

<main>
    <section class="sub-mv">
        <div class="sub-mv__inner">
            <div class="sub-mv__img">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sub-tours-img.jpg" alt="黄色のバンが大きな岩に囲まれた道路を走っている様子" />
            </div>
        </div>
        <div class="sub-mv__title-wrap sub-page-title">
            <h1 class="sub-page-title__main">Tours</h1>
        </div>
    </section>

    <!-- パンクズ -->
    <?php get_template_part('inc/breadcrumb'); ?>

    <div class="sub-tours layout-sub-tours">
        <div class="sub-tours__inner inner">
            <ul class="tab__menu">
                <li class="tab__menu-item <?php echo is_post_type_archive('tours') ? 'is-active' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/tours/')); ?>">ALL</a>
                </li>
                <?php
                $taxonomy_terms = get_terms(array(
                    'taxonomy' => 'tours_genre',
                    'hide_empty' => false,
                ));
                ?>

                <?php if (!empty($taxonomy_terms) && !is_wp_error($taxonomy_terms)) : ?>
                    <?php foreach ($taxonomy_terms as $term) : ?>
                        <?php $active_class = is_tax('tours_genre', $term->slug) ? 'is-active' : ''; ?>
                        <li class="tab__menu-item <?php echo $active_class; ?>">
                            <a href="<?php echo get_term_link($term); ?>"><?php echo esc_html($term->name); ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

            <div class="sub-tours__content">
                <?php if (have_posts()) : ?>
                    <ul class="sub-tours__cards">
                        <?php while (have_posts()) : the_post(); ?>
                            <li class="sub-tours__item">
                                <div class="tours-card tours-card--large">
                                    <div class="tours-card__img">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="no-image" />
                                        <?php endif; ?>
                                    </div>

                                    <div class="tours-card__item-body">
                                        <div class="tours-card__meta">
                                            <span class="tours-card__tag">
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'tours_genre');
                                                if ($terms && !is_wp_error($terms)) {
                                                    echo esc_html($terms[0]->name);
                                                }
                                                ?>
                                            </span>
                                            <p class="tours-card__category tours-card__category--large">
                                                <?php the_title(); ?>
                                            </p>
                                        </div>
                                        <?php
                                        // tours_info グループフィールドを取得
                                        $tours_info = get_field('tours_info');
                                        ?>
                                        <div class="tours-card__contents">
                                            <p class="tours-card__title">
                                                <?= $tours_info && isset($tours_info['plan_title'])
                                                    ? esc_html($tours_info['plan_title'])
                                                    : '情報がありません'; ?>
                                            </p>

                                            <div class="tours-card__price-body">
                                                <?php
                                                // グローバル変数を宣言
                                                global $price, $price_discount;

                                                // price_info グループを取得
                                                $price_info = isset($tours_info['price_info']) ? $tours_info['price_info'] : null;

                                                // price を取得
                                                $price = $price_info && isset($price_info['price']) ? $price_info['price'] : null;
                                                $formatted_price = $price !== null ? '￥' . number_format($price) : '価格情報がありません';

                                                // 割引価格を取得
                                                $price_discount = $price_info && isset($price_info['price_discount']) ? $price_info['price_discount'] : null;
                                                $formatted_discount = $price_discount !== null ? '￥' . number_format($price_discount) : '価格情報がありません';
                                                ?>
                                                <span class="tours-card__price"><?php echo esc_html($formatted_price); ?></span>
                                                <span class="tours-card__price-discount"><?php echo esc_html($formatted_discount); ?></span>
                                            </div>

                                            <div class="tours-card__text-box u-desktop">
                                                <p class="tours-card__text">
                                                    <?php the_content(); ?>
                                                </p>

                                                <div class="tours-card__wrap">
                                                    <span class="tours-card__date">
                                                        <?php
                                                        // tours_info グループフィールドを取得
                                                        $tours_info = get_field('tours_info');

                                                        // period_info グループを取得
                                                        $period_info = isset($tours_info['period_info']) ? $tours_info['period_info'] : null;

                                                        // period_start と period_end を取得
                                                        $date_start = $period_info && isset($period_info['period_start']) ? esc_html($period_info['period_start']) : '期間情報がありません';
                                                        $date_end = $period_info && isset($period_info['period_end']) ? esc_html($period_info['period_end']) : '';

                                                        // date_end が設定されていない場合は、date_start のみを表示
                                                        echo $date_start . ($date_end ? ' - ' . $date_end : '');
                                                        ?>
                                                    </span>
                                                    <p class="contact__button-text">ご予約・お問い合わせはコチラ</p>
                                                    <div class="contact__button contact__button--margin">
                                                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="button">
                                                            <span>Contact us</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <p>記事が投稿されていません</p>
                <?php endif; ?>
            </div>

            <div class="sub-tours__pagenavi pagenavi">
                <div class="pagenavi__inner">
                    <div class="wp-pagenavi" role="navigation">
                        <?php wp_pagenavi(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>
</main>