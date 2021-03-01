<?php
require_once get_template_directory().'/MyEncryption.php';

function show_user_fields( $user ) {
    $crypt = new MyEncryption;
    ?>
    <h3>Дополнительная информация</h3>
    <table class="form-table">
        <tr><th><label for="city">Город</label></th>
            <td><input type="text" name="city" id="city" value="<?php echo $crypt -> decrypt(esc_attr(get_user_meta( $user->ID, 'city', true )));?>" class="regular-text" /><br /></td></tr>
        <th><label for="gender">Пол</label></th>
        <td><?php $gender = $crypt -> decrypt(get_user_meta( $user->ID, 'gender', true )); ?>
            <ul>
                <li><label><input value="мужской" name="gender"<?php if ($gender == 'мужской') { ?> checked="checked"<?php } ?> type="radio" /> мужской</label></li>
                <li><label><input value="женский"  name="gender"<?php if ($gender == 'женский') { ?> checked="checked"<?php } ?> type="radio" /> женский</label></li>
            </ul>
        </td></tr>
    </table>
<?php
}

function save_user_fields( $user_id ) {

    $crypt = new MyEncryption;
    update_user_meta( $user_id, 'city', $crypt -> encrypt($_POST['city'] ));
    update_user_meta( $user_id, 'gender', $crypt -> encrypt($_POST['gender'] ));
}