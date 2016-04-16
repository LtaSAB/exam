<div class="flexslider">
	
		<ul class="slides">
			<?php $args = array(
				'post_type' => 'slider',
				'posts_per_page'=> 3
			);
			$the_query  = new WP_Query( $args );
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li>
						<div class="slider-description">
						<span class="welcome">
							<?php echo get_post_meta( get_the_id(), 'welcome', true );?>
						</span>
							<h2><a href="<?php  the_permalink(); ?>"><?php the_title();?> </a></h2>
							<div class="slider-excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
						<a href="<?php the_permalink(); ?>" class="button read-more">
							<?php echo __('Read more');?>
						</a>
					</li>
				<?php endwhile;
				wp_reset_postdata();
			endif; ?>

		</ul>
</div>