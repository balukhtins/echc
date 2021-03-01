<?php
/*
*Template Name: Users Page
*/
?>

<?php get_header()?>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">

<?php if (have_posts()) : while(have_posts()) : the_post();?>

    <div><?php the_content();?></div>

    <?php endwhile;?>

<?php endif;?>

        </div>
    </div>
</div>

<?php get_footer()?>