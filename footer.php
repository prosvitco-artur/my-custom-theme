<?php
alkima_theme__after_current_template();
do_action('alkima_theme_content_bottom');

?>
	</main>

	<?php
		do_action('alkima_theme_content_after');
		do_action('alkima_theme_footer_before');

		alkima_theme_output_footer();

		do_action('alkima_theme_footer_after');
	?>
</div>

<?php wp_footer(); ?>

</body>
</html>
