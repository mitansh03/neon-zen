<?php
/**
 * About section — "Why Neon Zen?" with feature cards.
 *
 * @package Zen_Yoga
 */
?>

<section class="section about" id="about">
	<div class="container">
		<div class="about__image reveal reveal--scale">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/about-studio.jpg' ); ?>"
			     alt="<?php esc_attr_e( 'Yoga practitioner meditating in a dimly lit Neon Zen studio', 'zen-yoga' ); ?>"
			     loading="lazy"
			     width="1200"
			     height="800">
		</div>

		<div class="about__content reveal reveal--left">
			<h2 class="about__heading">
				<?php echo wp_kses_post( __( 'Why <span class="neon-highlight">Neon Zen</span>?', 'zen-yoga' ) ); ?>
			</h2>
			<p class="about__text">
				<?php esc_html_e( 'We\'ve reimagined the yoga experience for the digital age. Neon Zen isn\'t just a studio; it\'s a sensory immersion designed to sync your body\'s rhythm with high-fidelity acoustics.', 'zen-yoga' ); ?>
			</p>
		</div>

		<div class="about__features">
			<div class="about__card reveal">
				<div class="about__card-icon" aria-hidden="true">⚡</div>
				<div class="about__card-body">
					<h3 class="about__card-title"><?php esc_html_e( 'The Fusion', 'zen-yoga' ); ?></h3>
					<p class="about__card-text">
						<?php esc_html_e( 'We combine high-intensity power yoga with rhythmic lighting and electronic soundscapes to induce a state of deep flow twice as fast as traditional practice.', 'zen-yoga' ); ?>
					</p>
				</div>
			</div>

			<div class="about__card reveal">
				<div class="about__card-icon" aria-hidden="true">🎵</div>
				<div class="about__card-body">
					<h3 class="about__card-title"><?php esc_html_e( 'Audio Immersion', 'zen-yoga' ); ?></h3>
					<p class="about__card-text">
						<?php esc_html_e( 'Spatial audio engineering creates a sonic cocoon that allows you to tune out the noise of the city and tune into your breath.', 'zen-yoga' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
