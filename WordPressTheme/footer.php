<?php if (!is_page(array('contact', 'thanks')) && !is_404()) : ?>
  <!-- 条件に合うときに表示したい内容 -->
  <section class="contact layout-contact">
    <div class="contact__inner inner">
      <div class="contact__header section-header ">
        <p class="section-header__title section-header__title--contact js-animation">
          <span>C</span>
          <span>o</span>
          <span>n</span>
          <span>t</span>
          <span>a</span>
          <span>c</span>
          <span>t</span>
        </p>
      </div>
      <div class="contact__info">

        <div class="contact__map-wrap">
          <div class="contact__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220398.70017062945!2d150.9409715281291!3d-33.82450139165673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2z44OL44Ol44O844K144Km44K544Km44Kn44O844Or44K6IOOCt-ODieODi-ODvA!5e0!3m2!1sja!2sau!4v1724596022504!5m2!1sja!2sau" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>

        <div class="contact__detail">
          <div class="contact__lists-wrap">
            <ul class="contact__lists">
              <li class="contact__list"><span>住所&#58;</span>12 ローマストリート<br />シドニー, NSW 2000<br />オーストラリア</li>
              <li class="contact__list"><span>TEL&#58;</span>+61 1234 5555</li>
              <li class="contact__list"><span>営業時間&#58;</span>8:30-19:00</li>
            </ul>
          </div>
          <div class="contact__button">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="button">
              <span>Contact us</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
</main>

<footer class="footer layout-footer<?php if (is_404()) : ?> layout-footer--404<?php endif; ?>">
  <div class="footer__inner inner">
    <div class="footer__container">
      <div class="footer__wrap">
        <div class="footer__logo">
          <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo-portfolio_2.png" alt="imagine tour" />
        </div>
        <div class="footer__sns">
          <a href="https://www.facebook.com" target=”_blank” class="footer__sns-icon"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sns-icon_1.png" alt="facebookのアイコン" /></a>
          <a href="https://www.instagram.com" target=”_blank” class="footer__sns-icon"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/sns-icon_2.png" alt="インスタグラムのアイコン" /></a>
        </div>
      </div>

      <div class="footer__nav nav-contents">
        <nav class="nav-contents__wrap">
          <ul class="nav-contents__contents">
            <li class="nav-contents__group">
              <div class="nav-contents__title">
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
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/about-us/')); ?>">私たちについて</a>
              </div>
            </li>
          </ul>

          <ul class="nav-contents__contents">
            <li class="nav-contents__group">
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/voice/')); ?>">お客様の声</a>
              </div>
              <div class="nav-contents__title">
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

          <ul class="nav-contents__contents">
            <li class="nav-contents__group">
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/information/')); ?>">ツアー情報</a>
              </div>
              <div>
                <ul class="nav-contents__items">
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab01">NATURE</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab02">CULTURE</a>
                  </li>
                  <li class="nav-contents__item">
                    <a href="<?php echo esc_url(home_url('/information/')); ?>?id=tab03">POPULAR</a>
                  </li>
                </ul>
              </div>
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a>
              </div>
            </li>
          </ul>

          <ul class="nav-contents__contents">
            <li class="nav-contents__group">
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/faq/')); ?>">よくある質問</a>
              </div>
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/sitemap/')); ?>">サイトマップ</a>
              </div>
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
              </div>
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/cancel-policy/')); ?>">キャンセル<br class="u-mobile" />ポリシー</a>
              </div>
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>">利用規約</a>
              </div>
              <div class="nav-contents__title">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="footer__copyright">
    <small>Copyright &copy; 2021 - 2024 IMAGINE TOUR LLC. All Rights Reserved.</small>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>