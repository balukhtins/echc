<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package echk
 */

?>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">

                    <?php if (is_active_sidebar('footer')):?>
                    <!--<div class="col-md-3">-->
                        <?php dynamic_sidebar('footer')?>
                    <!--</div>-->
                    <?php endif;?>
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>

                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved

                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>
</div>
<?php wp_footer();?>
</body>
</html>

