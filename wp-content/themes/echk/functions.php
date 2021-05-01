<?php
/**
 * echk functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package echk
 */

require_once get_template_directory().'/Echk_Header_Menu.php';
require_once get_template_directory().'/Echk_Post_Menu.php';
require_once get_template_directory().'/my_user_fields.php';
require_once get_template_directory().'/view-all-users.php';

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'echk_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function echk_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on echk, use a find and replace
		 * to change 'echk' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'echk', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'header-menu' => esc_html__( 'Header Menu', 'echk' ),
                'footer-menu' => esc_html__( 'Footer Menu', 'echk' ),
                '0023-2-menu' => esc_html__( '0023 Menu', 'echk' ),
                'pbepkm-menu' => esc_html__( 'pbepkm Menu', 'echk' ),
                'strelki-menu' => esc_html__( 'strelki Menu', 'echk' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'echk_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'echk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function echk_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'echk_content_width', 640 );
}
add_action( 'after_setup_theme', 'echk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function echk_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'echk' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'echk' ),
			'before_widget' => '<id id="%1$s" class="widget %2$s col-md-3">',
			'after_widget'  => '</id>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'echk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function echk_scripts() {
	wp_enqueue_style( 'echk-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'echk-google-font', 'https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700' );
    wp_enqueue_style( 'echk-fonts-style', get_template_directory_uri() .'/assets/fonts/icomoon/style.css' );
    wp_enqueue_style( 'echk-bootstrap-style', get_template_directory_uri() .'/assets/css/bootstrap.min.css' );
    if (is_page(array('home', 'about-us', 'literature', 'test'))){
        wp_enqueue_style( 'echk-magnific-popup-style', get_template_directory_uri() .'/assets/css/magnific-popup.css' );
        wp_enqueue_style( 'echk-jquery-ui-style', get_template_directory_uri() .'/assets/css/jquery-ui.css' );
        wp_enqueue_style( 'echk-owl-carousel-style', get_template_directory_uri() .'/assets/css/owl.carousel.min.css' );
        wp_enqueue_style( 'echk-owl-theme-default-style', get_template_directory_uri() .'/assets/css/owl.theme.default.min.css' );
        wp_enqueue_style( 'echk-bootstrap-datepicker-style', get_template_directory_uri() .'/assets/css/bootstrap-datepicker.css' );
        wp_enqueue_style( 'echk-flaticon-style', get_template_directory_uri() .'/assets/fonts/flaticon/font/flaticon.css' );
        wp_enqueue_style( 'echk-aos-style', get_template_directory_uri() .'/assets/css/aos.css' );
    }
    wp_enqueue_style( 'echk-style-style', get_template_directory_uri() .'/assets/css/style.css' );
    wp_enqueue_style( 'echk-main-style', get_template_directory_uri() .'/assets/css/main.css' );

    wp_style_add_data( 'echk-style', 'rtl', 'replace' );

	wp_enqueue_script( 'echk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri().'/assets/js/jquery-3.3.1.min.js');
    wp_enqueue_script('jquery');
    if (is_page(array('home', 'about-us', 'literature', 'test'))){
        wp_enqueue_script('jquery-migrate-js', get_template_directory_uri().'/assets/js/jquery-migrate-3.0.1.min.js',array('jquery'), '', true);
        wp_enqueue_script('jquery-ui-js', get_template_directory_uri().'/assets/js/jquery-ui.js',array('jquery'), '', true);
        wp_enqueue_script('owl-carousel-js', get_template_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'), '', true);
        wp_enqueue_script('jquery-stellar-js', get_template_directory_uri().'/assets/js/jquery.stellar.min.js',array('jquery'), '', true);
        wp_enqueue_script('jquery-countdown-js', get_template_directory_uri().'/assets/js/jquery.countdown.min.js',array('jquery'), '', true);
        wp_enqueue_script('jquery-magnific-popup-js', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js',array('jquery'), '', true);
        wp_enqueue_script('bootstrap-datepicker-js', get_template_directory_uri().'/assets/js/bootstrap-datepicker.min.js',array('jquery'), '', true);
        wp_enqueue_script('aos-js', get_template_directory_uri().'/assets/js/aos.js',array('jquery'), '', true);
        wp_enqueue_script('countTo-js', get_template_directory_uri().'/assets/js/jquery.countTo.js',array('jquery'), '', true);
        wp_enqueue_script( 'echk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

    }
    wp_enqueue_script('popper-js', get_template_directory_uri().'/assets/js/popper.min.js',array('jquery'), '', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js',array('jquery'), '', true);

    wp_enqueue_script('main-js', get_template_directory_uri().'/assets/js/main.js',array('jquery'), '', true);


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'echk_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Регистрируем хук и передаем название функции,
// которая будет вносить изменения в выборку
add_action( 'pre_get_posts', 'sort_my_category_by_date' );

// Пишем саму функцию, которая внедрит нужную сортировку
function sort_my_category_by_date( $query ) {

    // Убеждаемся, что изменения не касаются админки
    // и что мы применяем сортировку именно к основной выборке постов
    // (а не к виджетам, например)
    if ( ! is_admin() && $query->is_main_query() ) {

        // Изменяем сортировку только в пределах страницы определенной категории
        if ( is_category() ) {

            // Сортировать по полю "Дата"
            $query->set( 'orderby', 'date' );

            // Сортировать по возрастанию
            $query->set( 'order', 'ASC' );
        }
    }
}

## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
    // размеры которые нужно удалить
    return array_diff( $sizes, [
        'medium_large',
    ] );
}

//добавление кнопки разрыва страныцы в визуальный редактор
add_filter('mce_buttons', 'mce_page_break');
function mce_page_break($mce_buttons){
    $pos = array_search('wp_more', $mce_buttons, true);
    if ($pos !== false){
        $buttons = array_slice($mce_buttons, 0, $pos + 1);
        $buttons[] = 'wp_page';
        $mce_buttons = array_merge($buttons, array_slice($mce_buttons, $pos + 1));
    }
    return $mce_buttons;
}

/*
 * навигация по страницам
 */
require get_template_directory() . '/inc/echk_link_pages.php';



