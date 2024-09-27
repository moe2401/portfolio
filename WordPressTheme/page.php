<?php get_header(); ?>

<section class="sub-mv">
    <div class="sub-mv__inner">
        <div class="sub-mv__img">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/sea.jpg" alt="青い透き通った海と男性が乗った一隻のボートの様子" />
        </div>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
        <h1 class="sub-page-title__main"><?php the_title(); ?></h1>
    </div>
</section>

<!-- パンクズ -->
<?php get_template_part('inc/breadcrumb'); ?>

<div class="privacy-policy layout-privacy-policy">
    <div class="privacy-policy__inner inner">
        <div class="privacy-policy__content">
            <h2 class="privacy-policy__title"><?php the_title(); ?></h2>
            <div class="privacy-policy__wrap">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>