<?php

/*
*Template Name: One User Page
*/


get_header()?>

<?php
require_once get_template_directory().'/MyEncryption.php';
$crypt = new MyEncryption;
$id = ($_GET['id']) ? $_GET['id'] : '';
$user = get_user_by( 'id', $id  );
$user_meta = get_user_meta( $id);
?>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">


                <div>
                    <h4><?php echo $user->data->display_name ?></h4>
                    <ul>
                        <li> Имя пользователя - <?php echo $user->data->user_login ?></li>
                        <li > логин - <?php echo $user->data->user_nicename ?></li>
                        <li> Email - <?php echo $user->data->user_email ?></li>
                        <li> Имя - <?php echo $user_meta['first_name'][0] ?></li>
                        <li> Фамилия - <?php echo $user_meta['last_name'][0] ?></li>
                        <li> Город - <?php  echo  $crypt -> decrypt($user_meta['city'][0]) ?></li>
                        <li> Пол - <?php  echo  $crypt -> decrypt($user_meta['gender'][0])?></li>
                    </ul> <br />
                </div>


        </div>
    </div>
</div>

<?php get_footer()?>
