<h1>Sunlight Theme Options</h1>
<?php settings_errors(); ?>


<?php

$profile = esc_attr( get_option( 'profile_image' ) );
 	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );

	$fullName= $firstName .' '. $lastName;


	$descriptoin=esc_attr( get_option( 'user_description' ) );

	 ?>
<div class="sunlight-user-preview">
	<div class="profile">
		<img id="profile-picture-preview" src="<?php echo $profile; ?>">
	</div>
	<div class="sunlight-user"><h1><?php echo $fullName ?></h1></div>
	<div class="sunlight-desc"><h2><?php echo $descriptoin ?></h2></div>
</div>



<form method="post" action="options.php" class="user-form">
	<?php settings_fields( 'sunlight-settings-group' ); ?>
	<?php do_settings_sections( 'alecaddd_sunlight' ); ?>

	<?php submit_button(); ?>
</form>