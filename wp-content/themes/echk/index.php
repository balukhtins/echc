<?php
get_header();
?>


<?php $query = new WP_Query(array(
        'category_name' => 'technical-literature',
        'post_per_page' => 3,
        'order' => 'ASC',
));
?>
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5"><h1 class="text-primary mb-5 text-uppercase font-weight-bold" data-aos="fade-up" data-aos-delay="100">Технічна література</h1></div>
            <div class="row">
               <?php if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-entry">

                            <a href="<?php the_permalink()?>"><img src="<?php if (has_post_thumbnail()) echo get_the_post_thumbnail_url()?>" alt="Image" class="img-fluid" ></a>

                            <?php /*the_content();*/?>


                        </div>
                    </div>
                <?php endwhile;?>
                <?php endif;?>

            </div>
        </div>
    </div>
    <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-8">

            <?php $category_id = get_cat_ID( 'Технічна література' );
            $category_link = get_category_link( $category_id );
            ?>

            <p><a href="<?php echo $category_link;?>" class="btn btn-primary py-3 px-5 text-white"><?php _e('Далі')?></a></p>

        </div>
    </div>

<?php wp_reset_query();?>

<hr>


<?php $query = new WP_Query(array(
    'category_name' => 'protection-of-work',
    'post_per_page' => 3,
    'order' => 'ASC',

));
?>
    <div class="site-section">
        <div class="container">
           <div class="row justify-content-center mb-5"><h1 class="text-primary mb-5 text-uppercase font-weight-bold" data-aos="fade-up" data-aos-delay="100">Охорона праці</h1></div>
           <div class="row">
                <?php if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-entry">

                            <a href="<?php the_permalink()?>"><img src="<?php if (has_post_thumbnail()) echo get_the_post_thumbnail_url()?>" alt="Image" class="img-fluid" ></a>

                            <?php /*the_content();*/?>


                        </div>
                    </div>
                <?php endwhile;?>
                <?php endif;?>

            </div>
        </div>
    </div>
    <div class="row align-items-center justify-content-center text-center">

        <div class="col-md-8">

            <?php $category_id = get_cat_ID( 'Охорона праці' );
            $category_link = get_category_link( $category_id );
            ?>

            <p><a href="<?php echo $category_link;?>" class="btn btn-primary py-3 px-5 text-white"><?php _e('Далі')?></a></p>

        </div>
    </div>

<?php wp_reset_query();?>

<?php
get_sidebar();
get_footer();
