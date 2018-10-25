

<h1>Theme Support Options</h1>

<?php settings_errors(); ?>
<form method="post" action="options.php" class="my-theme-support">
	<?php settings_fields( 'theme-support' ) ?>
	<?php do_settings_sections( 'theme-support-options' ) ?>


	<?php submit_button(); ?>
	
</form>

