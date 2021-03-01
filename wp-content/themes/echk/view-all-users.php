<?php
require_once get_template_directory().'/MyEncryption.php';

function users_shortcode( $atts){

    $crypt = new MyEncryption;

    $content = '<h2>Список пользователей</h2>';

    $number = 2;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $offset = ($paged -1) * $number;
    $count =  count_users();
    $count = $count['total_users'];
    $total_pages = intval($count / $number) + 1;

    $users = get_users(
        array(
            'offset' => $offset,
            'number' => $number,
        )
    );

    foreach($users as $user){
        $content .=
        '<a href="/author?id='. $user->ID .'"><h4>' . $user->display_name . '</h4></a>
        <br />';

    }


    if ($count > $offset){
    $content .=
            '<div id="pagination" class="clearfix">' .
            paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => 'page/%#%/',
                'current' => $paged,
                'total' => $total_pages,
                'prev_next'    => false,
                'type' => 'plain',
            )) .
        '</div>';
    }

    return $content ;
}
