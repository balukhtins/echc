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
    //$echk_single_content = get_the_content();
    $c = apply_filters( 'the_content', get_the_content() );
    //debug($echk_single_content);
    //debug($c);

    $d = explode('</div>
</div>', $c);

    //debug($d);

$paged = $wp_query->get( 'page' );

if ( $paged < 2 ){
    // Это первая страница или пост не разделен на страницы
    for ($i=0; $i<count($d)-1; $i++){
        if ($i == 0){
            $f[$i] = str_replace('<section class="fw-main-row ">
<div class="fw-container">
<div class="fw-row">
<div id="" class="fw-col-xs-12">',
                '',
                $d[$i]);
        }
        else{
            $f[$i] = str_replace('
<div class="fw-row">
<div id="" class="fw-col-xs-12">',
                '',
                $d[$i]);
        }
    }
}
else {
    // Это 2,3,4 ... страница разделенного поста.
    for ($i=0; $i<count($d)-1; $i++){
        $f[$i] = str_replace('<div class="fw-row">
<div id="" class="fw-col-xs-12">',
            '',
            $d[$i]);
       }
 }
//debug($f);
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


                    <?php for ($i=0; $i<count($f); $i++):?>
                        <div class="echk-single-content">
                            <?php echo $f[$i];?>

                        </div>
                    <?php endfor;?>

                </div>

                    <div class="container text-center pb-5">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                wp_link_pages( [
                                    'before'           => '<p>' . __('Pages:'),
                                    'after'            => '</p>',
                                    'link_before'      => '',
                                    'link_after'       => '',
                                    'next_or_number'   => 'number',
                                    'nextpagelink'     => __('Next'),
                                    'previouspagelink' => __('Previous'),
                                    'pagelink'         => '%',
                                    'echo'             => 1,
                                ] );
                                ?>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="echk-single-content col-md-8">
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
