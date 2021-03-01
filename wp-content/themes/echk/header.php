<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package echk
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2">
                    <h1 class="mb-0"><a href="<?php echo home_url('/')?>" class="text-white h2 mb-0"><?php echo bloginfo('name')?></a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <?php wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'container' => false,
                            'walker' => new Echk_Header_Menu,
                            'menu_class' => 'site-menu js-clone-nav mx-auto d-none d-lg-block',
                        ))?>

                   </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

            </div>

        </div>

    </header>
</div>
<?php if (!is_single()):?>
    <div id = "background-1" class="site-blocks-cover overlay" style="background-image: url(<?php echo get_site_url( null, '/wp-content/uploads/2020/04/electrician.jpg' );?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold"><?php (is_page() || is_home()) ? single_post_title() : single_cat_title('', 1); ?></h1>
                </div>
            </div>
        </div>
    </div>
<?php else:?>
    <div id = "background-1" class="class-single"  ></div>
<?php endif;?>