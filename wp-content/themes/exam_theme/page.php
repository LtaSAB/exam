<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exam_theme
 */

get_header('page'); ?>

	<div id="primary" class="content-area">
	<main id="main" class="site-main figure-triangle" role="main">
	<div class="container-fluid">
	<h2>
		<?php echo get_post_meta( get_the_id(), 'name', true ); ?>
	</h2>
	<span class="title-decorative">
					<?php echo get_post_meta( get_the_id(), 'short_description', true ); ?>
				</span>

	<section>
<?php
$temp     = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query( 'showposts=3' . '&paged=' . $paged );
if ( $wp_query->have_posts() ) :
	while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		<article class="clearfix">
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
					<p class="view-excerpt"><?php the_excerpt(); ?></p>
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
				<a href="<?php the_permalink(); ?>"
				   class="button read-more"><?php echo __( 'Read More' ); ?></a>
			</div>

		</article>

	<?php endwhile;
	the_posts_pagination($args);
	endif;
	?>
	</section>

	<?php wp_reset_postdata(); ?>
	</div>
	</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();
