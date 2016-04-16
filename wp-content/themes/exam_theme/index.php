<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exam_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="about-us clearfix">

					<div class="inner-block col-md-6">
						<h2 class="title"><?php echo get_theme_mod( 'about_us' ) ?></h2>
					<span class="about-us-short-description title-decorative">
						<?php echo get_theme_mod( 'about_us_short_description' ) ?>
					</span>
					</div>
					<div class="inner-block-content col-md-6">
						<p class="about-us-description">
							<?php echo get_theme_mod( 'about_us_description' ) ?>
							</p>
						<a href="<?php bloginfo('url'); ?>/about-us.php" class="button read-more">
							<?php echo __('Read more');?></a>
					</div>
			</div>
			<div class="our-services figure-triangle figure">
				<div class="container-fluid">
					<h2 class="title"><?php echo get_theme_mod( 'services_title' ) ?></h2>
					<span class=" title-decorative">
						<?php echo get_theme_mod( 'services_description' ) ?>
					</span>
					<section class="clearfix">
						<?php
						$args      = array(
							'post_type' => 'services',
							'posts_per_page' => 4
						);
						$the_query = new WP_Query( $args );

						if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<article class="col-md-6 ">
									<div class="thumbnail-wrapper">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="short-description">
										<h3>
											<a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<p><?php the_excerpt(); ?></p>
									</div>
								</article>
							<?php endwhile;
							wp_reset_postdata();
						endif; ?>
					</section>
					<a href="<?php bloginfo('url'); ?>/services.php" class="button read-more">
						<?php echo __('View more');?>
					</a>
				</div>
			</div>
			<div class="our-parthners figure-triangle clearfix">

				<div class="container-fluid">
					<h2 class="title"><?php echo get_theme_mod( 'parthners_title' ) ?></h2>
					<span class=" title-decorative">
						<?php echo get_theme_mod( 'parthners_short_description' ) ?>
					</span>
				</div>
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
