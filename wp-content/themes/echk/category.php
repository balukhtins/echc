<?php
get_header();
?>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5"><h1 class="text-primary mb-5 text-uppercase font-weight-bold" data-aos="fade-up" data-aos-delay="100"><?php /* single_cat_title('', 1); */?></h1></div>
        <div class="row">
            <?php if (have_posts()) : while(have_posts()) : the_post();?>
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
<div class="container text-center pb-5">
    <div class="row">
        <div class="col-12">
        <?php the_posts_pagination(array(
            'end_size' => 2,
            'mid_size' => 1,
            'prev_next'    => false,
        ))?>
        </div>
    </div>
</div>


<?php
get_sidebar();
get_footer();