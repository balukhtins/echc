<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package echk
 */

?>
<?php
    $c = apply_filters( 'the_content', get_the_content() );

    $d = explode('<p><!--echk_next--></p>', $c);

    //debug($d);

$paged = $wp_query->get( 'page' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" style="text-align: center;">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>
	</header><!-- .entry-header -->

    <div class="site-section">
        <div class="container">
            <div class="row">

                <?php if( !empty($GLOBALS['multipage']) ): ?>

                    <?php $echk_post_title = esc_html( get_the_title() ); ?>

                    <?php if (is_single( $echk_post_title )):?>
                <nav class="navbar navbar-expand-xl navbar-light bg-light col-md-3 <?= $post->post_name?>-menu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php /*print_r();*/?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <?php wp_nav_menu(array(
                                'theme_location' => $post->post_name.'-menu',
                                'container' => false,
                                'menu_class' => 'nav flex-column',
                                'walker' => new Echk_Post_Menu,
                            )) ?>
                        </div>
                </nav>
                    <?php endif;?>

                <div class="col">

                    <?php if ( $paged < 2 ):?>
                        <div class="echk-single-content">
                            <?php echk_post_thumbnail(); ?>
                        </div>
                    <?php endif;?>


                    <?php for ($i=0; $i<count($d); $i++):?>
                        <div class="echk-single-content">
                            <?php echo $d[$i];?>

                        </div>
                    <?php endfor;?>

                </div>

                    <div class="container text-center pb-5">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                /*wp_link_pages( [
                                    'before'           => '<p>',
                                    'after'            => '</p>',
                                    'link_before'      => ' ',
                                    'link_after'       => ' ',
                                    'next_or_number'   => 'next',
                                    'nextpagelink'     => '  ' . __('Next'),
                                    'previouspagelink' => __('Previous') . ' ',
                                    'pagelink'         => '%',
                                    'echo'             => 1,
                                    'separator'        => '  |  ',
                                ] );*/

                                 echo echk_link_pages();

                                ?>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="echk-single-content col">
                        <?php echk_post_thumbnail(); ?>
                    </div>
                    <?php the_content();?>
               <?php endif;?>
    <!-- .entry-content -->

	<!--<footer class="entry-footer">
		<?php echk_entry_footer(); ?>
	</footer>--><!-- .entry-footer -->
            </div>
        </div>
    </div>

</article><!-- #post-<?php /*the_ID(); */?> -->
