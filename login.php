<?php
/*
Template Name: Login Page
*/
?>

<?php get_header(); ?>

<div class="container">

  <div class="row">

	<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>

    <div class="col-sm-12">
		

			<h3>Have an account?</h3>
			<p>Log in or sign up! It&rsquo;s fast &amp; <em>free!</em></p>

			<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
				<div class="username">
					<label for="user_login"><?php _e('Username'); ?>: </label>
					<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
				</div>
				<div class="password">
					<label for="user_pass"><?php _e('Password'); ?>: </label>
					<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
				</div>
				<div class="login_fields">
					<div class="rememberme">
						<label for="rememberme">
							<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> Remember me
						</label>
					</div>
					<?php do_action('login_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
			<p><a href="<?php echo home_url('/'); ?>/signup/"><?php _e('Signup'); ?></a> | <a href="<?php echo home_url('/'); ?>/lost-password/"><?php _e('Lost your password?'); ?></a></p>
    </div><!-- .col-sm-12 -->

	<?php } else { // is logged in ?>

    <div class="col-sm-12">
		<h3>Welcome, <?php echo $user_identity; ?></h3>
		<div class="usericon">
			<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>

		</div>
		<div class="userinfo">
			<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
			<p>
				<a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a> | 
				<?php if (current_user_can('manage_options')) { 
					echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>'; } else { 
					echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?>

			</p>
		</div>
    </div><!-- .col-sm-12 -->

	<?php } ?>

  </div><!-- .row -->

</div><!-- .container -->

<?php get_footer(); ?>
