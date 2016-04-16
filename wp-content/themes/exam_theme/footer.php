<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exam_theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">
		<div class="site-info col-md-4">
				<div class="footer-logo">
					<h2>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'logo-upload' ) ?>"
						                                                                    alt="logo"></a>
					</h2>
					<span class="date"><?php the_date('Y');?></span>
					<span class="copyright"> &copy; <?php bloginfo( 'description' ); ?> . </span>
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
		</div><!-- .site-info -->
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

					<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->
</div>
<?php wp_footer(); ?>

</body>
</html>
