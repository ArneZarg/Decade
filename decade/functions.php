<?php
	function decade_files(){
		wp_enqueue_script('bootstrap-js', get_theme_file_uri('/js/bootstrap.js'), NULL, microtime(), true);
		wp_enqueue_script('my-js', get_theme_file_uri('/js/scroll-top.js'), NULL, microtime(), true);
		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), null, 'all') ;
		wp_register_script( 'jScript', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js' );
		wp_enqueue_script( 'jScript' );
		wp_enqueue_style('decade-main-styles', get_stylesheet_uri(), NULL, microtime());
	}
	add_action('wp_enqueue_scripts', 'decade_files');//for first argument you need wp_enqueue_scripts to be the name. For the second argument, name doesn't matter because you create the file.

	function decade_features(){
		register_nav_menu('headerMenuLocation', 'Header Menu Location');//args('name of the menu', 'the text that actually shows up in the menu') this allows you to make a menu in wp-admin.
		register_nav_menu('footerLocationOne', 'Footer Location One');
		register_nav_menu('footerLocationTwo', 'Footer Location Two');
		add_theme_support('title-tag');
	}
	add_action('after_setup_theme', 'decade_features');//args: to have a unique title for every page: (wordpress function after_setup_theme, our function)

	function event_queries($query){
		if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
			$today = date('Y-m-d');
			$query->set('meta_key', 'event_date');
			$query->set('orderby', 'meta_value_num');
			$query->set('order', 'ASC');
			$query->set('meta_query', array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today." 00:00:00",
                'type' => 'numeric'
              )
            ));
		}
	}

	add_action('pre_get_posts', 'event_queries');

function redirectSubsToFrontend(){
	$ourCurrentUser = wp_get_current_user();
	if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
		wp_redirect(site_url('/'));
		exit;
	}
}

//Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function noSubsAdminBar(){
	$ourCurrentUser = wp_get_current_user();
	if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
		show_admin_bar(false);
	}
}

//hides admin bar from non-editorial/administrative roles
add_action('admin_init', 'noSubsAdminBar');
?>