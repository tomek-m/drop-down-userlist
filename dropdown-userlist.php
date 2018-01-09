<?php
/*
Plugin Name: Drop-down userlist
Description: Replace the username field drop-down menu to the traditional login form
Author: Tomek
Author URI: http://wp-learning.net
Plugin URI: http://wp-learning.net
Version: 1.2
*/

function change_traditional_login_form() {
   wp_enqueue_script('clean_login_fields',plugins_url('drop-down-userlist/clear-login.js'),array('jquery'),null,true);
   ?>
	<label for="new_user_login"><?php _e('Username') ?><br />
	<?php
	    $blogusers = get_users( 'blog_id=1&orderby=nicename' );
		echo '<select name="log" id="new_user_login" class="input">'."\n";
				foreach ( $blogusers as $user ) {
				echo "<option value=".strtolower($user->user_login);
				if ($_POST['log'] == strtolower($user->user_login)) {
				echo ' selected';
        }
		echo ">".strtolower($user->user_login)."</option>";
		}
		echo '</select>'."\n";
	?>
	</label>
	<label for="new_user_pass"><?php _e('Password') ?><br />
	<input type="password" name="pwd" id="new_user_pass"<?php echo $aria_describedby_error; ?> class="input" value="" size="20" /></label>
   <?php
}

function change_traditional_lostpassword_form() {
   wp_enqueue_script('clean_login_fields',plugins_url('drop-down-userlist/clear-login.js'),array('jquery'),null,true);
   ?>
	<label for="new_user_login"><?php _e('Username') ?><br />
	<?php
	    $blogusers = get_users( 'blog_id=1&orderby=nicename' );
		echo '<select name="user_login" id="new_user_login" class="input">'."\n";
				foreach ( $blogusers as $user ) {
				echo "<option value=".strtolower($user->user_login);
				if ($_POST['log'] == strtolower($user->user_login)) {
				echo ' selected';
        }
		echo ">".strtolower($user->user_login)."</option>";
		}
		echo '</select>'."\n";
	?>
	</label>
   <?php
}

add_filter( 'login_form', 'change_traditional_login_form' );
add_filter( 'lostpassword_form', 'change_traditional_lostpassword_form' );
?>