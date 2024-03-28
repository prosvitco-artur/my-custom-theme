<article class="horizontal mb-4 <?php do_action('alkima_theme_archive_card_classes') ?>" <?php do_action('alkima_theme_archive_card_attributes') ?>>
    <?php do_action('alkima_theme_archive_card_start_title') ?>
        <div class="row g-0">

            <?php if (has_post_thumbnail()): ?>
                <div class="col-lg-6 col-xl-5 col-xxl-4">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'card-img-lg-start')); ?>
                    </a>
                </div>
            <?php endif; ?>

            <div class="col">
                <div class="card-body">
                    <?php do_action('alkima_theme_archive_card_meta_before') ?>
                    <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                        <?php the_title('<h2 class="blog-post-title h5">', '</h2>'); ?>
                    </a>

                    <?php if ('post' === get_post_type()): ?>
                        <p class="meta small mb-2 text-body-tertiary">
                            <?php do_action('alkima_theme_archive_card_meta_before') ?>
                        </p>
                    <?php endif; ?>

                    <p class="card-text">
                        <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                            <?= strip_tags(get_the_excerpt()); ?>
                        </a>
                    </p>

                    <p class="card-text">
                        <a class="read-more" href="<?php the_permalink(); ?>">
                            <?= apply_filters('alkima_theme_read_more_text', __('Read more »', 'alkima_theme')); ?>
                        </a>
                    </p>

                    <?php do_action('alkima_theme_archive_card_meta_after') ?>

                </div>
            </div>
        </div>
    </div>
</article>