<?php
/**
 * CTA strip — final conversion banner before footer.
 *
 * @package Zen_Yoga
 */
?>

<section class="section cta" id="cta">
	<div class="cta__glow" aria-hidden="true"></div>
	<div class="container cta__inner">
		<div class="cta__content reveal reveal--scale">
			<p class="neon-label"><?php esc_html_e( 'Your Transformation Starts Now', 'zen-yoga' ); ?></p>
			<h2 class="cta__heading">
				<?php echo wp_kses_post( __( 'Ready To <span class="neon-highlight">Ignite</span>?', 'zen-yoga' ) ); ?>
			</h2>
			<p class="cta__text">
				<?php esc_html_e( 'Your first class is on us. Step into the electric sanctuary and feel the difference.', 'zen-yoga' ); ?>
			</p>
		</div>
		<div class="cta__actions reveal reveal--fade">
			<a href="#contact-modal" class="btn btn--primary btn--lg" data-modal-open>
				<?php esc_html_e( 'Book Your Free Class', 'zen-yoga' ); ?>
			</a>
			<a href="https://wa.me/91XXXXXXXXXX?text=<?php echo rawurlencode( "Hi, I'd like to book my first class at Neon Zen." ); ?>"
			   class="btn btn--outline btn--lg"
			   target="_blank"
			   rel="noopener noreferrer">
				<?php esc_html_e( 'WhatsApp Us', 'zen-yoga' ); ?>
			</a>
		</div>
	</div>
</section>
