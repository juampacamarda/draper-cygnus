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
	register_nav_menus (array('menu-blog'=>'Menu Categorias Blog'));
	register_nav_menus (array('menu-blog-responsive'=>'Menu Categorias Mobile'));
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
function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
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
  if ( (is_single() || is_category() ) && $query->is_main_query() )
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
		'hierarchical'          => true,
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


//formato Fecha
function my_post_time_ago_function() {
return sprintf( esc_html__( '%s ago', 'textdomain' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'get_the_date', 'my_post_time_ago_function' );

//share social buttons
// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
function share_buttons($content) {
    global $post;
    if(is_singular() || is_home()){
    
        // Get current page URL 
        $sb_url = urlencode(get_permalink());
				$credit = get_bloginfo ( 'name' );
        // Get current page title
        $sb_title = str_replace( ' ', '%20', get_the_title());
        
        // Get Post Thumbnail for pinterest
        $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());
 
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&nbsp; by &nbsp;'.$credit;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;

 
        // Add sharing button at the end of page/page content
        $content .= '<div class="social-box"><ul class="nav redes">';
        $content .= '<li class="red"><a  href="'. $twitterURL .'" target="_blank" rel="nofollow"><span><i class="fab fa-twitter"></i></span></a></li>';
				$content .= '<li class="red"><a  href="'.$linkedInURL.'" target="_blank" rel="nofollow"><span><i class="fab fa-linkedin"></i></span></a></li>';
        $content .= '<li class="red"><a  href="'.$facebookURL.'" target="_blank" rel="nofollow"><span><i class="fab fa-facebook-f"></i></span></a></li>';
        $content .= '</ul></div>';
        
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
// Enable the_content if you want to automatically show social buttons below your post.

 

// This will create a wordpress shortcode [social].
// Please it in any widget and social buttons appear their.
// You will need to enabled shortcode execution in widgets.
add_shortcode('social','share_buttons');