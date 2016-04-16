<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exam_theme
 */

?>

<article id="post-<?php the_ID(); ?>"  class="clearfix">
		<div class="author-avatar">
			<?php echo get_avatar( 'ltas@ukr.net', 60 ); ?>
		</div>
		<div class="inner-block">
			<div class="short-description">

				<div class="post-meta">
					<h3>
						<a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
										<span class="author-date">
											<span class="post-author"><?php echo __( 'Posted by:' ); ?></span>
											<?php the_author_posts_link(); ?>,
									<span class="post-date">
										<?php echo get_the_date(); ?>
									</span>
										</span>
				</div>
			</div>
			<div class="content">
				<div class="thumbnail-wrapper">
					<?php the_post_thumbnail(); ?>
				</div>
				<p class="view-excerpt"><?php the_content(); ?></p>
			</div>
			<div class="social-icons-wrapper clearfix">
				<div class="title-social-icons">
					<span><?php echo __( 'Share:' ); ?></span>
				</div>
				<ul class="social-icons clearfix ">
					<?php if ( ! empty( get_theme_mod( 'social_icon_facebook' ) ) ) {
						?>
						<li><a href="<?php echo get_theme_mod( 'social_icon_facebook' ) ?>"><span
									class="fa fa-facebook"></span></a></li>
						<?php
					}
					?>
					<?php if ( ! empty( get_theme_mod( 'social_icon_twitter' ) ) ) {
						?>
						<li><a href="<?php echo get_theme_mod( 'social_icon_twitter' ) ?>"><span
									class="fa fa-twitter"></span></a></li>
						<?php
					}
					?>
					<?php if ( ! empty( get_theme_mod( 'social_icon_pinterest' ) ) ) {
						?>
						<li><a href="<?php echo get_theme_mod( 'social_icon_pinterest' ) ?>"><span
									class="fa fa-pinterest"></span></a></li>
						<?php
					}
					?>
					<?php if ( ! empty( get_theme_mod( 'social_icon_google' ) ) ) {
						?>
						<li><a href="<?php echo get_theme_mod( 'social_icon_google' ) ?>"><span
									class="fa fa-google"></span></a></li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>

</article><!-- #post-## -->
