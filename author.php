<?php get_header(); ?>

<div class="author_page_area">
	<div class="author_page">
		<div class="author_page_top_area fix">
			<div class="author_page_top column fix">
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
							<?php
							    if(isset($_GET['author_name'])) :
							        $curauth = get_userdatabylogin($author_name);
							    else :
							        $curauth = get_userdata(intval($author));
							    endif;
							    $user_id = $curauth->ID;
							 
							    $args = array(
							        'user_id' => $user_id,
							        'number' => 1, // how many comments to retrieve
							        'status' => 'approve'
							    );
								 
								$comments = get_comments( $args );
								 
								if ( $comments )
								{
								$output = "<ul>\n";
								foreach ( $comments as $c )
								{
								$output.= '<li>';
								$output.= '<a href="'.get_comment_link( $c->comment_ID ).'">';
								$output.= get_the_title($c->comment_post_ID);
								$output.= '</a>, <br/> Posted on: '. mysql2date('m/d/Y', $c->comment_date);
								$output.= "</li>\n";
								}
								$output.= '</ul>';
								 
								echo $output;
								}
								else { echo "No comments made";}								 
							?>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="author_page_medile_area fix">
			<div class="author_content_hadding fix column">
				<h2 class="author_all_post_title floatleft"><?php the_author(); ?> All Posts</h2>
				<h2 class="author_all_post_comment floatright"><?php the_author(); ?> Recent Comment's</h2>
			</div>
			<div class="author_page_medile column fix">
				
				<div class="author_all_postes floatleft">
					<div class="author_single_postes">
						<?php get_template_part('post-excerpt')?>
					</div>

				</div>				
				<div class="author_all_comment floatright">					
					<?php get_template_part('author-recent-comment');?>							
				</div>
			</div>
		</div>
		<div class="author_page_bottom_area fix">
			<div class="author_page_bottom fix column">
				
		</div>
		</div>
	</div>
</div>

<?php get_footer();?>