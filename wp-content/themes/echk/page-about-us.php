

<?php get_header()?>


<!--<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php /*echo get_site_url( null, '/wp-content/uploads/2020/04/electrician.jpg' );*/?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-white font-weight-light text-uppercase font-weight-bold"><?php /*the_title()*/?></h1>
                <p class="breadcrumb-custom"><a href="index.html">Home</a> <span class="mx-2">&gt;</span> <span>About Us</span></p>
            </div>
        </div>
    </div>
</div>-->

<div class="site-section">
    <div class="container">
        <div class="row mb-5">

<?php if (have_posts()) : while(have_posts()) : the_post();?>

        <?php the_content();?>

    <?php endwhile;?>

<?php endif;?>

        </div>
    </div>
</div>

<?php get_footer()?>