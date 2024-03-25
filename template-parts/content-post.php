<article class="ct-archive-card <?php do_action('alkima_theme_archive_card_classes') ?>" <?php do_action('alkima_theme_archive_card_attributes') ?>>
    <?php do_action('alkima_theme_archive_card_start_title') ?>
    <?php do_action('alkima_theme_archive_card_before_title') ?>
    <h2>
        <?= the_title() ?>
    </h2>
    <?php do_action('alkima_theme_archive_card_after_title') ?>
    <p>
        <?= the_excerpt() ?>
    </p>
    <?php do_action('alkima_theme_archive_card_after_content') ?>
</article>