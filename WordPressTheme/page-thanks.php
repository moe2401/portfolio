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

  <div class="sub-thanks layout-sub-thanks">
    <div class="sub-thanks__inner inner">
      <div class="sub-thanks__content">
        <p class="sub-thanks__success">
          お問い合わせ内容を送信完了しました。
        </p>
        <p class="sub-thanks__text">
          このたびは、お問い合わせ頂き<br class="u-mobile" />誠にありがとうございます。<br />
          お送り頂きました内容を確認の上、<br class="u-mobile" />3営業日以内に折り返しご連絡させて頂きます。<br />
          また、ご記入頂いたメールアドレスへ、<br class="u-mobile" />自動返信の確認メールをお送りしております。<br />
        </p>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>