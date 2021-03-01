<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package echk
 */

?>

<?php get_header()?>


<div>
    <?php
    the_content();

    wp_link_pages(
        array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'echk' ),
            'after'  => '</div>',
        )
    );
    ?>
</div><!-- .entry-content -->




<?php /*if (have_posts()) : while(have_posts()) : the_post();*/?><!--
    <?php /*the_content()*/?>
<?php /*endwhile;*/?>
<?php /*else: */?>
--><?php /*endif;*/?>

<?php get_footer()?>
