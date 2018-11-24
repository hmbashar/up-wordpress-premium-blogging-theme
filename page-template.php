<?php 
/*
Template Name: Only Registered User
*/

get_header(); ?>


<?php if ($redux_demo['allow-registered-user'] == 1) : ?>
	<?php if (is_user_logged_in()) : ?>

		<?php get_template_part('spage-content');?>

	<?php else : ?>
		<div class="dont-have-access-contents fix column"> 

			<h2><?php echo $redux_demo['unregisterd-message']; ?></h2>

		</div>
	<?php endif; ?>
<!-- End Register User conditation-->

<?php else : ?>

	<?php get_template_part('spage-content');?>

<?php endif; ?>

<?php get_footer(); ?>