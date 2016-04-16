<?php
/**
 * exam_theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package exam_theme
 */

if ( ! function_exists( 'exam_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function exam_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on exam_theme, use a find and replace
	 * to change 'exam_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'exam_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'exam_theme' ),
		'footer' => esc_html__( 'Footer', 'exam_theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'exam_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'exam_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function exam_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'exam_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'exam_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function exam_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'exam_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'exam_theme' ),
		'before_widget' => '<section id="%1$s" class="alternative-menu col-md-3 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'exam_theme_widgets_init' );
function exam_theme_widget_contact() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-form', 'exam_theme' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'exam_theme' ),
		'before_widget' => '<section id="%1$s" class="widget col-md-5 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'exam_theme_widget_contact' );


/**
 * Enqueue scripts and styles.
 */
function exam_theme_scripts() {
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_script( 'jquery-1.12.0.min', '/wp-content/themes/exam_theme/js/jquery-1.12.0.min.js', 1.1, true );
	wp_enqueue_script( 'flex-script', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true );
	wp_enqueue_style( 'exam_theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'exam_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'exam_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'exam_theme_scripts' );

//Font awesome

function font_awesome() {
	if (!is_admin()) {
		wp_register_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css');
		wp_enqueue_style('font-awesome');
	}
}
add_action('wp_enqueue_scripts', 'font_awesome');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function example_customizer( $wp_customize ) {
	//contact info

	$wp_customize->add_section(
		'contact_section',
		array(
			'title'       => 'Контактные данные',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting(
		'phone_number',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'phone_number',
		array(
			'label'   => 'Номер телефона',
			'section' => 'contact_section',
			'type'    => 'text',
		)
	);
//about us
	$wp_customize->add_section(
		'about_us_section',
		array(
			'title'       => 'Про нас',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting(
		'about_us',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'about_us',
		array(
			'label'   => 'Название',
			'section' => 'about_us_section',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'about_us_short_description',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'about_us_short_description',
		array(
			'label'   => 'Краткое описание',
			'section' => 'about_us_section',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'about_us_description',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'about_us_description',
		array(
			'label'   => 'Описание',
			'section' => 'about_us_section',
			'type'    => 'text',
		)
	);

	//services

	$wp_customize->add_section(
		'services',
		array(
			'title'       => 'Наши сервисы',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting(
		'services_title',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'services_title',
		array(
			'label'   => 'Название',
			'section' => 'services',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'services_description',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'services_description',
		array(
			'label'   => 'Описание',
			'section' => 'services',
			'type'    => 'text',
		)
	);
	/*Социальные сети*/
	$wp_customize->add_section(
		'social_icon_section',
		array(
			'title'       => 'Социальные сети',
			'description' => 'Это секция настроек.',
			'priority'    => 35,
		)
	);
	$wp_customize->add_setting(
		'social_icon_facebook',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_facebook',
		array(
			'label'   => 'Ссылка на facebook',
			'section' => 'social_icon_section',
			'type'    => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_twitter',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_twitter',
		array(
			'label'   => 'Ссылка на твиттер',
			'section' => 'social_icon_section',
			'type'    => 'url',
		)
	);$wp_customize->add_setting(
		'social_icon_pinterest',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_pinterest',
		array(
			'label'   => 'Ссылка на pinterest',
			'section' => 'social_icon_section',
			'type'    => 'url',
		)
	);


	$wp_customize->add_setting(
		'social_icon_google',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_google',
		array(
			'label'   => 'Ссылка на google+',
			'section' => 'social_icon_section',
			'type'    => 'url',
		)
	);
	//changing logo
	$wp_customize->add_section(
		'site-logo',
		array(
			'title'       => 'Логотип',
			'description' => 'Это секция настроек.',
			'priority'    => 50,
		)
	);
	$wp_customize->add_setting( 'logo-upload' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo-upload',
			array(
				'label' => 'Выберите картинку логотипа сайта',
				'section' => 'site-logo',
				'settings' => 'logo-upload'
			)
		)
	);

	//parthners

	$wp_customize->add_section(
		'our_parthners',
		array(
			'title'       => 'Наши партнеры',
			'description' => 'Это секция настроек.',
			'priority'    => 60,
		)
	);
	$wp_customize->add_setting(
		'parthners_title',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'parthners_title',
		array(
			'label'   => 'Название',
			'section' => 'our_parthners',
			'type'    => 'text',
		)
	);
	$wp_customize->add_setting(
		'parthners_short_description',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'parthners_short_description',
		array(
			'label'   => 'Краткое описание',
			'section' => 'our_parthners',
			'type'    => 'text',
		)
	);

}
add_action( 'customize_register', 'example_customizer' );

//register services
add_action( 'init', 'register_services' );
function register_services() {
	$labels = array(
		'name'               => __( 'Services' ),
		'singular_name'      => __( 'Сервис' ),
		'add_new'            => __( 'Добавить сервис' ),
		'add_new_item'       => __( 'Добавить новый сервис' ),
		'edit_item'          => __( 'Редактировать сервис ' ),
		'new_item'           => __( 'Новый сервис' ),
		'all_items'          => __( 'Все сервисы' ),
		'view_item'          => __( 'Просмотр сервиса' ),
		'search_items'       => __( 'Искать сервисы' ),
		'not_found'          => __( 'Сервисов не найдено.' ),
		'not_found_in_trash' => __( 'В корзине нет сервисов.' ),
		'menu_name'          => __( 'Сервисы' )
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true,
		'menu_icon'     => 'dashicons-admin-appearance',
		'menu_position' => 5,
		'has_archive'   => true,
		'supports'      => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'comments',
			'categories',
			'custom-fields'
		),
		'taxonomies'    => array( 'post_tag', 'category' ),

	);
	register_post_type( 'services', $args );
}
$args = array(
	'show_all'     => False, // показаны все страницы участвующие в пагинации
	'end_size'     => 1,     // количество страниц на концах
	'mid_size'     => 1,     // количество страниц вокруг текущей
	'prev_next'    => True,  // выводить ли боковые ссылки "предыдущая/следующая страница".
	'prev_text'    => __(' '),
	'next_text'    => __(' '),
	'add_args'     => False,
	'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
	'screen_reader_text' => __( 'Posts navigation' ),
);

//register slider
add_action( 'init', 'register_slider' );
function register_slider() {
	$labels = array(
		'name'               => __( 'Slider' ),
		'singular_name'      => __( 'Слайд' ),
		'add_new'            => __( 'Добавить слайд' ),
		'add_new_item'       => __( 'Добавить новый слайд' ),
		'edit_item'          => __( 'Редактировать слайд ' ),
		'new_item'           => __( 'Новый слайд' ),
		'all_items'          => __( 'Все слайды' ),
		'view_item'          => __( 'Просмотр слайдов' ),
		'search_items'       => __( 'Искать слайды' ),
		'not_found'          => __( 'Слайдов не найдено.' ),
		'not_found_in_trash' => __( 'В корзине нет слайдов.' ),
		'menu_name'          => __( 'Слайдер' )
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon'     => 'dashicons-images-alt',
		'menu_position' => 5,
		'has_archive'   => true,
		'supports'      => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'comments',
			'categories',
			'custom-fields'
		),
		'taxonomies'    => array( 'post_tag', 'category' ),

	);
	register_post_type( 'slider', $args );
}
//register services
add_action( 'init', 'register_parthners' );
function register_parthners() {
	$labels = array(
		'name'               => __( 'Parthners' ),
		'singular_name'      => __( 'Партнер' ),
		'add_new'            => __( 'Добавить Партнера' ),
		'add_new_item'       => __( 'Добавить нового Партнера' ),
		'edit_item'          => __( 'Редактировать Партнера ' ),
		'new_item'           => __( 'Новый Партнер' ),
		'all_items'          => __( 'Все Партнеры' ),
		'view_item'          => __( 'Просмотр Партнера' ),
		'search_items'       => __( 'Искать Партнеров' ),
		'not_found'          => __( 'Партнеров не найдено.' ),
		'not_found_in_trash' => __( 'В корзине нет Партнеров.' ),
		'menu_name'          => __( 'Партнеры' )
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true,
		'menu_icon'     => 'dashicons-admin-appearance',
		'menu_position' => 5,
		'has_archive'   => true,
		'supports'      => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'comments',
			'categories',
			'custom-fields'
		),
		'taxonomies'    => array( 'post_tag', 'category' ),

	);
	register_post_type( 'parthners', $args );
}