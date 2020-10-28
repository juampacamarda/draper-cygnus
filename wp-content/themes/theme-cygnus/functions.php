<?php
//custom logo
function mytheme_setup() {
    add_theme_support('custom-logo', array(
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );}

 
add_action('after_setup_theme', 'mytheme_setup');
//cambiar la clase del logo
add_filter( 'get_custom_logo', 'change_logo_class' );

function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo-link', 'home-link-lg d-block', $html );
	$html = str_replace( 'custom-logo', 'img-fluid',  $html );

    return $html;
}

//nav menu and thumbnails
if (function_exists('register_nav_menus')){
	register_nav_menus (array('superior'=>'Menu Principal Superior'));
	register_nav_menus (array('footer-a'=>'Menu footer a'));
	register_nav_menus (array('footer-b'=>'Menu footer b'));

}
function add_link_atts($atts) {
$atts['class'] = "nav-link";
return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');
//navlink
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
//
if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
}
//mostrar barra admin
if (is_user_logged_in()) {
    show_admin_bar(true);
}#end if
//abajo carga shortcodes

// Adding Shortcodes to the_excerpt() function
add_filter('the_excerpt', 'do_shortcode');
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=text', 'do_shortcode');
add_filter('acf/format_value', 'do_shortcode');
// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');
//abao carga estilos
function theme_scripts(){
    wp_enqueue_style('theme-style-base', get_stylesheet_directory_uri() .'/assets/scss/theme-cygnus-base.min.css');
    wp_enqueue_style('owl-style', get_stylesheet_directory_uri() .'/assets/scss/owl.carousel.min.css');
    wp_enqueue_style('cygnus-style', get_stylesheet_directory_uri() .'/assets/scss/theme-cygnus.css');
    wp_enqueue_script('theme-js-base', get_stylesheet_directory_uri() .'/assets/js/theme-cygnus-base.min.js');
     wp_enqueue_script('owl-js', get_stylesheet_directory_uri() .'/assets/js/owl.carousel.min.js');
    wp_enqueue_script('theme-js', get_stylesheet_directory_uri() .'/assets/js/theme-cygnus.js');

}
add_action('wp_enqueue_scripts','theme_scripts');
//subir svg
function custom_mimes( $mimes = array() ) {
	// New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'custom_mimes' );
//fin subir svg

//option pages
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Cygnus Theme options'),
            'menu_title'    => __('Cygnus Theme options'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position' => '53.5'
        ));
    }
}
// Show posts of 'post', 'page' and 'libro' post types on home page
function add_my_post_types_to_query( $query ) {
  if ( (is_single() || is_home() || is_category() ) && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'page', 'portfolio', 'miembros' ) );
  	return $query;
	}

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function postype_query( $query ){
    if( ! is_admin()
        && $query->is_post_type_archive( 'portfolio', 'miembros' )
        && $query->is_main_query() ){
            $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'postype_query' );
//postype portfolio
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'portfolio', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Proyecto', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'portfolio', 'text_domain' ),
		'name_admin_bar'        => __( 'Porfolio', 'text_domain' ),
		'archives'              => __( 'Porfolio Archives', 'text_domain' ),
		'attributes'            => __( 'Porfolio Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Proyecto Padre', 'text_domain' ),
		'all_items'             => __( 'Todos los Proyectos', 'text_domain' ),
		'add_new_item'          => __( 'Agregar Nuevo Proyecto', 'text_domain' ),
		'add_new'               => __( 'Agregar Nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Proyecto', 'text_domain' ),
		'edit_item'             => __( 'Editar Proyecto', 'text_domain' ),
		'update_item'           => __( 'Actualizar Proyecto', 'text_domain' ),
		'view_item'             => __( 'Ver Proyecto', 'text_domain' ),
		'view_items'            => __( 'Ver Proyectos', 'text_domain' ),
		'search_items'          => __( 'Buscar Proyecto', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Imagen Destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Elige la imagen Destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Elimina la imagen Destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como Imagen Destacadas', 'text_domain' ),
		'insert_into_item'      => __( 'Agregar a Proyecto', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Lista de Proyectos', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Fitros', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Proyecto', 'text_domain' ),
		'description'           => __( 'Cygnus portfolio', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 3.34,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'custom_post_type', 0 );


//postype miembros
// Register Custom Post Type
function miembros_post_type() {

	$labels = array(
		'name'                  => _x( 'miembros', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Integrante', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'miembros', 'text_domain' ),
		'name_admin_bar'        => __( 'miembros', 'text_domain' ),
		'archives'              => __( 'miembros Archives', 'text_domain' ),
		'attributes'            => __( 'miembros Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Integrante Padre', 'text_domain' ),
		'all_items'             => __( 'Todos los Integrantes', 'text_domain' ),
		'add_new_item'          => __( 'Agregar Nuevo Integrante', 'text_domain' ),
		'add_new'               => __( 'Agregar Nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo Integrante', 'text_domain' ),
		'edit_item'             => __( 'Editar Integrante', 'text_domain' ),
		'update_item'           => __( 'Actualizar Integrante', 'text_domain' ),
		'view_item'             => __( 'Ver Integrante', 'text_domain' ),
		'view_items'            => __( 'Ver Integrantes', 'text_domain' ),
		'search_items'          => __( 'Buscar Integrante', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Imagen Destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Elige la imagen Destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Elimina la imagen Destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como Imagen Destacadas', 'text_domain' ),
		'insert_into_item'      => __( 'Agregar a Integrante', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Lista de Integrantes', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Fitros', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Integrante', 'text_domain' ),
		'description'           => __( 'Cygnus miembros', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 3.35,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'miembros', $args );

}
add_action( 'init', 'miembros_post_type', 0 );
