<div class="entry-content">
	<?php if (is_home() && current_user_can('publish_posts')) { ?>
		<p>
			<a href="<?= esc_url(admin_url('post-new.php')) ?>">
				<?= __('%1$sCreate First Post. %2$s.', 'alkima-theme') ?>
			</a>
		</p>
	<?php } else {
		get_search_form();
	} ?>

</div>