<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>  	
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->		
		<?php global $redux_demo; wp_head(); ?>
		
    </head>
    <body <?php body_class(); ?>>

   
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<div class="main_area">
			<header class="header_area">
				<div class="header">
					<div class="header_top_area fix">
						<div class="header_top column fix">
							<div class="header_menu floatleft">
								<?php if ( ! is_user_logged_in() ) : ?>
								<?php 
									wp_nav_menu(array(
										'theme_location'	=> 'logout_menu',
										'fallback_cb'		=> 'my_theme_default_menu',
										'walker'			=> new up_Nav_Menu(),										
									));
								
								?>	
								<?php else : ?>								
									<?php 
										wp_nav_menu(array(
											'theme_location'	=> 'loginmenu',
											'fallback_cb'		=> 'my_theme_default_menu',
											'walker'			=> new up_Nav_Menu(),										
										));
									
									?>										
								<?php endif;?>
								</ul>
							</div>
							<div class="header_social floatright">

								<?php if ($redux_demo['facebook_switch'] == 1) : ?>
								<?php if ($redux_demo['social_facebook']) : ?>
									<div class="single_social floatleft">
										<a href="<?php echo $redux_demo['social_facebook'];?>" title="Our Official Facebook Page"><i class="fa fa-facebook"></i></a>
									</div>
								<?php else : ?>
									<div class="single_social floatleft">
										<a href="https://www.facebook.com/upworkhelplinebd" title="Default Facebook Page in the theme"><i class="fa fa-facebook"></i></a>
									</div>
								<?php endif; ?>
								<?php endif; ?>


								<?php if ($redux_demo['twitter_switch'] == 1 ) : ?>
								<?php if ($redux_demo['social_twitter']) : ?>								
									<div class="single_social floatleft">
										<a title="Our Official Twitter" href="<?php echo $redux_demo['social_twitter'];?>"><i class="fa fa-twitter"></i></a>
									</div>
								<?php else : ?>
									<div class="single_social floatleft">
										<a title="The Theme default twitter" href="https://www.twitter.com/hmbashar"><i class="fa fa-twitter"></i></a>
									</div>
								<?php endif; ?>
								<?php endif; ?>

								<?php if ($redux_demo['youtube_switch'] == 1 ) : ?>
								<?php if ($redux_demo['social_youtube']) : ?>
									<div class="single_social floatleft">
										<a title="Our Official Youtube Channel" href="<?php echo $redux_demo['social_youtube']; ?>"><i class="fa fa-youtube"></i></a>
									</div>
								<?php else : ?>								
									<div class="single_social floatleft">
										<a title="Official Youtube Channel in the theme" href="https://www.youtube.com/linuxhostlab"><i class="fa fa-youtube"></i></a>
									</div>
								<?php endif; ?>
								<?php endif; ?>
								
								<?php if ($redux_demo['linkedin_switch'] == 1 ) : ?>
								<?php if($redux_demo['social_linkedin']) : ?>
									<div class="single_social floatleft">
										<a title="Our Official Linkedin" href="<?php echo $redux_demo['social_linkedin'];?>"><i class="fa fa-linkedin"></i></a>
									</div>
								<?php else : ?>
									<div class="single_social floatleft">
										<a title="Official Linkedin in the theme" href="https://www.linkedin.com/hmbashar"><i class="fa fa-linkedin"></i></a>
									</div>
								<?php endif; ?>
								<?php endif; ?>

								<?php if ($redux_demo['google_plus_switch'] == 1 ) : ?>
								<?php if ($redux_demo['social_google_plus']) : ?>
									<div class="single_social floatleft">
										<a title="Our Official Google Plus" href="<?php echo $redux_demo['social_google_plus'];?>"><i class="fa fa-google-plus"></i></a>
									</div>
								<?php else : ?>
									<div class="single_social floatleft">
										<a title="Default Google Plus profile in the theme" href="https://plus.google.com/u/0/+MdAbulBashar-linuxhostlab"><i class="fa fa-google-plus"></i></a>
									</div>
								<?php endif; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="header_middle_area fix">
						<div class="header_middle column fix">
							<div class="logo floatleft">
								<?php if ($redux_demo['logo_switch'] == 1) : ?>
								<?php if($redux_demo['header_logo']) : ?>
									<a href="<?php echo esc_url(site_url());?>"><img src="<?php echo $redux_demo['header_logo']['url'] ; ?>" alt="" /></a>								
								<?php endif; ?>
								<?php endif; ?>

							</div>

							<!--Header Ads -->
							<?php  dynamic_sidebar('header_ads');?>
							<!--Header Ads -->
						
						</div>
					</div>
					<div class="header_bottom">
						<div class="main_menu column">
							<div class="mainmenu" >

								<?php 
									wp_nav_menu(array(
										'theme_location'	=> 'main_menu',
										'fallback_cb'		=> 'my_theme_default_menu',
										'walker'			=> new up_Nav_Menu(),	
										'menu_id' 			=> 'mobile_id',									
									));
								
								?>
							</div>
						</div>
					</div>
					
				</div>
			</header>
			<section class="braking_news_area fix">
				<div class="braking_news column fix">
					<div class="braking_update"><?php echo $redux_demo['latest-update-title'];?></div>	
					
					<marquee class="marquee">
					
						<?php
							$braking_count = $redux_demo['latest-post-count'];
							$braking_cat = get_cat_name ($redux_demo['latest-posts-category']);
							$braking_news = new WP_Query(array(
								'post_type'		=> 'post',
								'posts_per_page'=> $braking_count,
								'category_name'		=> $braking_cat,
							));
						
						?>							
						<?php if ($braking_news->have_posts()) : ?> <?php while ($braking_news->have_posts()) : ?><?php $braking_news->the_post();?>
						
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						
						<?php endwhile;?>
						<?php endif;?>
					
					</marquee>
					
				</div>
			</section>