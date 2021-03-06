<?php

/**
 * Loads non admin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function wst_load_nonadmin_files() {
	$filenames = array(
		'setup.php',
		'functions/enqueue-assets.php',
		'functions/helper-functions.php',
		'components/customizer-css.php',
		'functions/register-widgets.php',
		'structure/header.php',
		'structure/post.php',
		'structure/sidebar.php',
		'structure/menu.php',
		'structure/footer.php',
		'structure/archive.php',
	);
	wst_load_specified_files( $filenames );
}

/**
 * Load admin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function wst_load_admin_files() {
	$filenames = array(
		'components/customizer.php',
		'components/options.php',
		'components/class-tgm-plugin-activation.php'

	);
	wst_load_specified_files( $filenames );
}

/**
 * Load each of the specified files.
 *
 * @since 1.0.0
 *
 * @param array $filenames
 * @param string $folder_root
 *
 * @return void
 */
function wst_load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: CHILD_LIB;
	foreach ( $filenames as $filename ) {
		include( $folder_root . $filename );
	}
}

wst_load_nonadmin_files();
wst_load_admin_files();



add_action( 'tgmpa_register', 'wst_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function wst_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => 'Timber',
			'slug'      => 'timber-library',
			'required'  => true,
		),



	);



	tgmpa( $plugins, $config );
}
