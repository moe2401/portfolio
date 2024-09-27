<?php get_header(); ?>

<main>
  <section class="sub-mv">
    <div class="sub-mv__inner">
      <div class="sub-mv__img">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/sub/contact.jpg" alt="カラフルな小さな家のような倉庫が並んでいる様子" />
      </div>
    </div>
    <div class="sub-mv__title-wrap sub-page-title">
      <h1 class="sub-page-title__main">Contact</h1>
    </div>
  </section>

  <!-- パンクズ -->
  <?php get_template_part('inc/breadcrumb'); ?>

  <div class="sub-contact layout-sub-contact">
    <div class="sub-contact__inner inner">
      <div class="sub-contact__form">
        <div class="sub-contact__inner" novalidate="novalidate">
          <?php echo do_shortcode('[contact-form-7 id="4bf53d5"]'); ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>