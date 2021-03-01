<?php if (!defined('FW')) die('Forbidden'); ?>
<?php if (isset($data['slides'])): ?>

    <div class="site-section block-13">
        <div class="owl-carousel nonloop-block-13">
           <?php foreach ($data['slides'] as $slides) : ?>
            <div>
                <a href="<?php if (!empty($slides['extra']['link'])) echo $slides['extra']['link'];?>" class="unit-1 text-center">
                    <img src="<?php echo $slides['src'];?>" alt="Image" class="img-fluid">
                    <div class="unit-1-text">
                        <h3 class="unit-1-heading"><?php echo $slides['title'];?></h3>
                        <p class="px-5"><?php echo $slides['desc'];?></p>
                    </div>
                </a>
            </div>
            <?php endforeach;?>
        </div>
    </div>

<?php endif; ?>
