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
    $echk_single_content = get_the_content();
    $c = apply_filters( 'the_content', get_the_content() );
    debug($c);
    preg_match_all('&<p.+/p>&', $c, $b);
    //preg_match_all('&.+?text="(.+?)"&', $echk_single_content, $b);
    debug($b);
    //echo preg_replace('&.+?text="(.+?)" _made.+?&', '$1', $echk_single_content);
    //$a = explode('[',$echk_single_content);
    //debug($a);

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
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

	            <?php echk_post_thumbnail(); ?>

                <?php for ($i=0; $i<count($b[0]); $i++):?>
                    <div class="echk-single-content col-md-8">
                        <?php echo $b[0][$i];?>
                        <?php
                        /*the_content(*/
                            /*sprintf(
                                wp_kses(*/
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    /*__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'echk' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post( get_the_title() )
                            )*/
                        /*);*/

                        /*wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'echk' ),
                                'after'  => '</div>',
                            )
                        );*/
                        ?>
	                </div>
                <?php endfor;?>
    <!-- .entry-content -->

	<!--<footer class="entry-footer">
		<?php /*echk_entry_footer(); */?>
	</footer>--><!-- .entry-footer -->
            </div>
        </div>
    </div>

</article><!-- #post-<?php /*the_ID(); */?> -->
