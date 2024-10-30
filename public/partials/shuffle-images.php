<?php if(is_array($images) && count($images) > 0): ?>
	<div data-si-mousemove-trigger="<?php echo $atts['intensity'] ?>" class="shuffle-me">
		
		<a href="<?php echo $atts['target']; ?>" class="essco-shuffle-info" target="_blank">
			<?php if($atts['title'] && $atts['title'] != ''){
				echo '<h3>'.$atts['title'].'</h3>';	
			} ?>
			<?php if($atts['subtitle'] && $atts['subtitle'] != ''){
				echo '<p>'.$atts['subtitle'].'</p>';	
			} ?>
		</a>
		
		<div class="images">
			<?php foreach ($images as $image): ?>
				<?php  
					$img = wp_get_attachment_url( $image );
					if($img && $img != ''):
				?>
			    	<img src="<?php echo wp_get_attachment_url( $image ); ?>">
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>