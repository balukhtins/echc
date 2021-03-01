<?php
  namespace iberezansky\fb3d;

  function get_questions() {
    $qs = [];
    $push = function($id, $html='', $js='') use(&$qs) {
      array_push($qs, ['id'=> $id, 'html'=> $html, 'js'=> $js]);
    };

    ob_start();
    ?>
    <p style="text-align:center;">
      <b>Thank You for using our plugin!</b>
    </p>
    <p>
      When you have time and find this plugin is worthy, feel free to leave <a href="https://bit.ly/3fOzyoQ" target="_blank">a review</a> and help the plugin reach more users.
    </p>
    <p style="text-align:right;">
      3D FlipBook Team
    </p>
    <?php
    $html = ob_get_clean();
    ob_start();
    ?>
    ok.on('click', function() {
      window.open('https://bit.ly/3fOzyoQ');
    });
    <?php
    $push('review-reminder3', $html, ob_get_clean());

    return $qs;
  }

?>
