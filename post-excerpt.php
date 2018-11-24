<?php
/**
 * The template for displaying post excerpts. 
 *
 * @package WordPress
 * @subpackage Md Abul Bashar
 */
 global $redux_demo;
?>

<div class="single_post_area fix">
	<?php if(have_posts()) : $i = 0 ?> <?php while (have_posts()) : the_post(); $i++; ?>	
	<!--Single Post -->
	<div class="single_post fix">
		<div class="single_post_header fix">
			<div class="single_post_title fix">
				<a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
			</div>
			<div class="single_post_info fix">
				<p><i class="fa fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) )) ; ?>"><?php the_author(); ?></a> | <i class="fa fa-eye">  <?php if(function_exists('the_views')) { the_views(); } ?></i> | <i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?> |  <i class="fa fa-folder-open"> <?php the_category(','); ?></i> | <a href=""><i class="fa fa-comment"></i> <?php comments_popup_link('No', '1', '%'); ?> </a> | <i class="fa fa-edit"></i> <?php edit_post_link( __( 'Edit' )); ?></p>
			</div>
		</div>
		<div class="single_post_content fix">
			<div class="post_feadture_img floatleft">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
			</div>
			<div class="post_content">									
				<p><?php the_excerpt();?></p>
			</div>
		</div>
		
		<div class="single_post_footer fix">
			<div class="post_last_update floatleft">
				<p><?php _e('Last Update: ', 'up_text_domain');?><i class="fa fa-calendar"></i> <?php echo get_the_modified_date( ); ?> | <i class="fa fa-clock-o"></i> <?php echo get_the_modified_time( ); ?> | <a title="This post short link if you need." href="<?php echo wp_get_shortlink(); ?> "><i class="fa fa-link"></i></a></p>
			</div>
			<div class="post_readmore floatright">
				<a href="<?php the_permalink();?>"><?php _e('Read More', 'up_text_domain'); ?></a>
			</div>
		</div>
		
	</div>
	<!-- Ads Code -->
	<?php 
		$rendom_ads_count = $redux_demo['index-rendom-ads-count'];
		$rendom_ads = $redux_demo['index-rendom-ads'];
		$ads_count_one = $redux_demo['index-different-count-one'];
		$ads_one = $redux_demo['index-different-ads-one'];
		$ads_count_two = $redux_demo['index-different-count-two'];
		$ads_two = $redux_demo['index-different-ads-two'];
		$ads_count_three = $redux_demo['index-different-count-three'];
		$ads_three = $redux_demo['index-different-ads-three'];
	?>
	
	<?php if ($rendom_ads_count && $rendom_ads) : ?>
		<?php if($i%$rendom_ads_count==0): ?><?php echo $rendom_ads;?><?php  endif; ?>
	<?php endif; ?>
	
	<?php if($i==$ads_count_one): ?>
		<?php echo $ads_one;?>
	<?php endif; ?>
	<?php if($i==$ads_count_two): ?>
		<?php echo $ads_two; ?>
	<?php endif; ?>
	<?php if($i==$ads_count_three): ?>
		<?php echo $ads_three; ?>
	<?php endif; ?>
	<!--Ads code -->
		
	
	<?php endwhile; ?><?php endif; ?>		
	<div class="blog_post_pagi">
		<?php the_posts_pagination(array(
			'screen_reader_text' => ' ',
			'end_size'     => 2,    
			'mid_size'     => 4, 
		));?>	
	</div>							
</div>