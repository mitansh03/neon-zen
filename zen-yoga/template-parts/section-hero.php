<?php
/**
 * Hero section — full-viewport with background image and neon CTAs.
 *
 * @package Zen_Yoga
 */
?>

<section class="section hero" id="hero">
	<div class="hero__bg">
		<!-- Replace with actual hero image -->
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>"
		     alt="<?php esc_attr_e( 'Yoga practitioner in a dimly lit studio', 'zen-yoga' ); ?>"
		     class="hero__bg-img"
		     loading="eager">
	</div>
	<div class="hero__overlay"></div>

	<div class="container hero__inner">
		<p class="neon-label"><?php esc_html_e( 'The Electric Sanctuary', 'zen-yoga' ); ?></p>
		<h1 class="hero__heading">
			<?php echo wp_kses_post( __( 'Ignite Your <span class="neon-highlight">Inner</span> Flow', 'zen-yoga' ) ); ?>
		</h1>
		<p class="hero__text">
			<?php esc_html_e( 'Step into a realm where ancient discipline meets futuristic energy. High-intensity Vinyasa fueled by immersive electronic soundscapes.', 'zen-yoga' ); ?>
		</p>
		<div class="hero__actions">
			<a href="#contact-modal" class="btn btn--primary" data-modal-open><?php esc_html_e( 'Start Your Journey', 'zen-yoga' ); ?></a>
			<a href="#classes" class="btn btn--outline"><?php esc_html_e( 'View Schedule', 'zen-yoga' ); ?></a>
		</div>
	</div>
</section>
