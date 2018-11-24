<div class="sidebar">
	<?php if( is_active_sidebar('right_sidebar')): ?>
	<?php dynamic_sidebar('right_sidebar');?>
	
	<?php else : ?>
	<!--single sidebar-->
	<div class="single_sidebar">
		<h2>This is single sidebar title</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <a href="">Ipsum has been </a>the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	</div>
	<?php endif; ?>

</div>