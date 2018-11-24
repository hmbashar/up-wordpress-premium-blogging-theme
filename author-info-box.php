						<div class="post_author_info fix">
							<div class="author_info_area floatleft">
								<div class="author_info_top fix">
									<div class="author_name floatleft">									
										<?php the_author(); ?>
									</div>
									<div class="author_total_count floatright">

										<?php
										    $user_id = get_the_author_meta('ID');
											$comm_count = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' .
											$wpdb->comments. ' WHERE user_id = "' . $user_id . '"');
										?>
										<p class="total_post_count"><i class="fa fa-pencil"></i> <?php echo up_count_user_posts($user_id, 'post') . ' Posts'; ?></p>
										<p class="total_comment_count"><i class="fa fa-comments"></i> <?php echo $comm_count . ' Comments'; ?></p>
									</div>
								</div>
								<div class="author_info_middle fix">
									<div class="author_info_img floatleft">
										<?php echo get_avatar(get_the_author_meta('email'), '100', '', '');	?>
									</div>
									<div class="author_info_bio floatright">
										<p><?php the_author_meta( 'description' ); ?></p>
									</div>
								</div>
								<div class="author_info_bottom fix">
									<div class="author_all_post floatleft">
										<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) )) ; ?>">See All Posts</a>
							
									</div>
									
									<div class="author_reg_date floatright">

										Registion : 
										<i class="fa fa-calendar"></i> <?php $user_id = get_the_author_meta('ID'); echo date("F j, Y", strtotime(get_userdata($user_id)->user_registered)); ?> | <i class="fa fa-clock-o"></i> <?php $user_id = get_the_author_meta('ID'); echo date("g:i a", strtotime(get_userdata($user_id)->user_registered)); ?> 
									</div>
								</div>
							</div>



							<div class="author_recent floatright">
								<div class="author_lest_post fix">
									<img src="http://placehold.it/90x90/599BF5/fff" alt="" />
									<a href=""><h2>This title last post</h2></a>
									<i class="fa fa-eye">  <?php if(function_exists('the_views')) { the_views(); } ?></i> | <i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?> | <i class="fa fa-clock-o"> <?php echo get_the_time(); ?></i>
								</div>
								<div class="author_lest_comment fix">									
									<img src="<?php echo get_template_directory_uri();?>/img/comments.png" alt="" />
									<a href=""><h2>This title last post</h2></a>
									<i class="fa fa-eye">  <?php if(function_exists('the_views')) { the_views(); } ?></i> | <i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?> | <i class="fa fa-clock-o"> <?php echo get_the_time(); ?></i>
									
								</div>
							</div>
						</div>
