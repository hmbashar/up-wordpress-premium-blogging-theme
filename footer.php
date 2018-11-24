			<footer class="footer_area fix">
				<div class="footer_top fix">
					<div class="widget_area column fix">
						
						<?php if(is_active_sidebar('footer_widget_left')) : ?>
						<?php dynamic_sidebar('footer_widget_left'); ?>
						<?php else : ?>
						<!--single widget-->
						<div class="single_widget floatleft">
							<h2>This is single widget</h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
						</div>
						<?php endif; ?>
						
						<?php if (is_active_sidebar('footer_widget_middle')) : ?>
						<?php dynamic_sidebar('footer_widget_middle');?>
						<?php else : ?>
						<!--single widget-->
						<div class="single_widget floatleft">
							<h2>This is single widget</h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
						</div>
						<?php endif; ?>
						<?php if (is_active_sidebar('footer_widget_right')):?>
						<?php dynamic_sidebar('footer_widget_right');?>
						<?php else : ?>						
						<div class="single_widget floatright">
							<h2>This is single widget</h2>
							<ul>
								<li><a href="">Home</a></li>
								<li><a href="">Home</a></li>
								<li><a href="">Home</a></li>
								<li><a href="">Home</a></li>
								<li><a href="">Home</a></li>
								<li><a href="">Home</a></li>
							</ul>
						</div>
						<?php endif;?>
						
					</div>
				</div>
				<div class="footer_middle fix"></div>
				<div class="footer_bottom_area fix">
					<div class="footer_bottom column fix">
						<div class="copyright floatleft">
							<p>Copyright &copy; 2015-<?php echo date('Y')?>. <?php bloginfo('name');?>. All Right Reserved</p>
						</div>
						<div class="theme_credit floatright">
							<p>Design &amp; Developed by: <a href="http://www.codingbank.com" target="_blank">Coding Bank</a></p>
						</div>
					</div>
				</div>
			</footer>
		</div>	
	
	


		<?php wp_footer(); ?>
    </body>
</html>
