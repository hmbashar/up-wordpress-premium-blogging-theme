<?php 

function custom_css_function(){
	?>
		<style type="text/css">
			body {background: <?php  global $redux_demo; echo $redux_demo['body_color']; ?> ;}
			.header_top_area {
			  background-color: <?php  echo $redux_demo['main_color']; ?>;
			}
			.header_bottom {
			  background-color: <?php echo $redux_demo['main_color']; ?>;
			}
			.single_post_info p, .single_post_info p a, .single_post_info p i {
			  background-color: <?php echo $redux_demo['main_color']; ?>;

			}
			.post_last_update p {
			  background-color: <?php echo $redux_demo['main_color']; ?>;

			}
			.post_readmore a {
			  background: <?php echo $redux_demo['main_color']; ?>;

			}
			.single_post {
				<?php if ($redux_demo['single_post_border_top']) : ?>
  					border-color: <?php echo $redux_demo['single_post_border_top']; ?>;
  				<?php else : ?>
  					border-color:#35b70d #ddd #ddd;
  				<?php endif; ?>
			}
			.page-numbers.current, a.page-numbers:hover {
				  background: <?php echo $redux_demo['main_color']; ?>;
				  border: 1px solid <?php echo $redux_demo['main_color']; ?>;

			}
			.author_total_count p {
				  background-color: <?php echo $redux_demo['main_color']; ?>;
			}
			.author_all_post {
			  background-color: <?php echo $redux_demo['main_color']; ?>;
			}
			.single_post_content h2 {
			  border-left: 5px solid <?php echo $redux_demo['main_color']; ?>;
			}
			blockquote {
			  border-left: 5px solid <?php echo $redux_demo['main_color']; ?>;
			}
			.author_reg_date {
			  background-color: <?php echo $redux_demo['main_color']; ?>;

			}
			.single_sidebar, .single_widget {
				<?php if ($redux_demo['single_post_border_top']) : ?>
			  		border-color: <?php echo $redux_demo['single_post_border_top']; ?>;
			  	<?php else : ?>
			  		border-color: #35b70d #ddd #ddd;
			  	<?php endif; ?>
			}
			.footer_bottom_area {
			  background: <?php echo $redux_demo['main_color']; ?>;
			}
			.comment-reply-link {
			  background-color: <?php echo $redux_demo['main_color']; ?>;
			}
			.comment-author-admin > .comment-body, .bypostauthor > .comment-body .comment-author cite::after {
				background-color: <?php echo $redux_demo['main_color']; ?>;
			}
			.comment-author-admin > .comment-body, .bypostauthor > .comment-body {
			  border-top: 6px solid <?php echo $redux_demo['single_post_border_top']; ?>;
			}
			.mainmenu ul li:hover a, .current-menu-item, .current_page_item {
			  background-color: <?php echo $redux_demo['hover-colors']; ?>;
			}
			.post_readmore a:hover {
			  background-color: <?php echo $redux_demo['hover-colors']; ?>;
			}
			.email-subscribe-area {
			  background-color: <?php echo $redux_demo['main_color']; ?>;
			}
			.post_feadture_img a img {
				width:<?php echo $redux_demo['index-featured-img-width'];?>px;
				height:<?php echo $redux_demo['index-featured-img-height'];?>px;
			}

			.single_sidebar ul li:hover {
			  background-color: <?php echo $redux_demo['hover-colors']; ?>;
			}

			.single_sidebar ul#recentcomments li.recentcomments:hover,.single_sidebar ul li.cat-item:hover, .single_social a i:hover, .single_widget ul li a:hover {
			  background-color: <?php echo $redux_demo['hover-colors']; ?>;
			}
		</style>
	<?php
}

add_action('wp_head', 'custom_css_function');


?>