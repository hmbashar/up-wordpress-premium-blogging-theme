	<?php global $redux_demo; ?>

	<div class="column single_page_top_ads">
		<?php echo $redux_demo['single_page_top_ads'];?>
	</div>
			<section class="content_area fix">
				<div class="content column">
					<?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?>				
					<div class="single_page">
						<?php get_template_part('author-info-box');?>
						<div class="single_post_content_area fix">
							<div class="single_page_post fix">
								<div class="single_post_header fix">
									<div class="single_page_title fix">
										<h2><?php the_title();?></h2>
									</div>
									<div class="single_post_info single_page_post_info fix">
										<p><i class="fa fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) )) ; ?>"><?php the_author(); ?></a> | <i class="fa fa-eye">  <?php if(function_exists('the_views')) { the_views(); } ?></i> | <i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?> |  <i class="fa fa-folder-open"> <?php the_category(','); ?></i> | <a href=""><i class="fa fa-comment"></i><?php comments_popup_link('No', '1', '%'); ?></a> | <i class="fa fa-clock-o"> <?php echo get_the_time(); ?></i> | <i class="fa fa-edit"></i> <?php edit_post_link( __( 'Edit' )); ?></p>
									</div>
								</div>
							
								<div class="title_below_ads">
									<?php echo $redux_demo['single_page_title_below'];?>
								</div>
							
							<?php if ($redux_demo['post-shortlink'] == 1) : ?>	
								<div class="post_short_link fix">
									<?php if (function_exists('wp_get_shortlink')) { ?>
										<span class="post-shortlink">Shortlink:
											<input type='text' value='<?php echo wp_get_shortlink(get_the_ID()); ?>' onclick='this.focus(); this.select();' />
										</span>
									<?php } ?>
								</div>
							<?php endif; ?>

								<div class="single_post_content fix">
									<?php the_content();?>
								</div>
								<div class="single_post_footer">
									<p><?php _e('Last Update: ', 'up_text_domain');?><i class="fa fa-calendar"></i> <?php echo get_the_modified_date( ); ?> | <i class="fa fa-clock-o"></i> <?php echo get_the_modified_time( ); ?> | <i class="fa fa-tags"></i> <?php the_tags( 'Tagging: ',', ' ); ?> </p>
								</div>

							<div class="after_content_ads">
								<?php echo $redux_demo['single_page_after_content_ads'];?>
							</div>	
								
								<!--Email Subscribe start-->
								<div class="email-subscribe-area fix">
									<h3><?php echo $redux_demo['email_subs_hadding'];?></h3>	
									<p class="email-subscribe-content"><?php echo $redux_demo['email_subs_content'];?></p>
									<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=<?php echo $redux_demo['feed_address'];?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
										<p>
											<input class="floatleft cb-email-subscribe" placeholder="Enter your email address:" type="email" name="email"/>
										</p>
										<p>
											<input type="hidden" value="<?php echo $redux_demo['feed_address'];?>" name="uri"/><input type="hidden" name="loc" value="en_US"/><input class="floatleft cb-email-subscribe-submit" type="submit" value="Subscribe" />
										</p>
									</form>
									<p>
										<a href="http://feeds.feedburner.com/<?php echo $redux_demo['feed_address'];?>"><img src="http://feeds.feedburner.com/~fc/<?php echo $redux_demo['feed_address'];?>?bg=99CCFF&amp;fg=444444&amp;anim=1" height="26" width="88" style="border:0" alt="" /></a>
									</p>
								</div>
								<!--Email Subscribe end-->

								
								<div class="single_post_comment fix">
									 <?php comments_template( '', true ); ?>  
								</div>
								<div class="single_after_comments_ads">
									<?php echo $redux_demo['single_page_after_comments_ads'];?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?><?php else : ?>
					<h3><?php _e('404 Error&#58; Not Found'); ?></h3>
					<?php endif; ?>
				</div>
			</section>