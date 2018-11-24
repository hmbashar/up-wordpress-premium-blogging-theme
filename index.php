<?php get_header(); ?>
			<section class="content_area fix">
				<div class="content fix column">
					<div class="content_left floatleft">
						<?php get_template_part('post-excerpt')?>
					</div>
					<div class="content_right">
						<?php get_sidebar();?>
					</div>
				</div>
			</section>
<?php get_footer(); ?>