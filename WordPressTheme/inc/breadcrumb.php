<div class="breadcrumb <?php
                        if (is_404()) {
                            echo 'breadcrumb--white';
                        } elseif (is_page('options')) {
                            echo 'layout-breadcrumb decoration decoration--options';
                        } elseif (is_page('faq')) {
                            echo 'layout-breadcrumb decoration decoration--faq';
                        } else {
                            echo 'layout-breadcrumb decoration';
                        }
                        ?>">
    <div class="breadcrumb__inner inner">
        <?php if (function_exists('bcn_display')) : ?>
            <div class="about__breadcrumb">
                <div class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
                    <?php bcn_display(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>