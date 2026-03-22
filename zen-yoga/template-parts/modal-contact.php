<?php
/**
 * Contact form modal — triggered by Book Now / Start Your Journey buttons.
 *
 * @package Zen_Yoga
 */
?>

<div class="modal" id="contact-modal" aria-hidden="true" role="dialog" aria-labelledby="modal-heading">
	<div class="modal__backdrop" data-modal-close></div>
	<div class="modal__content">
		<button class="modal__close" data-modal-close aria-label="<?php esc_attr_e( 'Close', 'zen-yoga' ); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
		</button>

		<div class="modal__header">
			<p class="neon-label"><?php esc_html_e( 'The Electric Sanctuary', 'zen-yoga' ); ?></p>
			<h2 id="modal-heading" class="modal__heading"><?php esc_html_e( 'Book Your Session', 'zen-yoga' ); ?></h2>
			<p class="modal__subtitle"><?php esc_html_e( 'First class is on us. Plug in.', 'zen-yoga' ); ?></p>
		</div>

		<form class="contact__form" action="#" method="post">
			<div class="contact__field">
				<label for="modal-name" class="contact__label"><?php esc_html_e( 'Your Name', 'zen-yoga' ); ?></label>
				<input type="text" id="modal-name" name="zen_name" class="contact__input" placeholder="<?php esc_attr_e( 'Alex Flow', 'zen-yoga' ); ?>" required>
			</div>

			<div class="contact__field">
				<label for="modal-email" class="contact__label"><?php esc_html_e( 'Email Address', 'zen-yoga' ); ?></label>
				<input type="email" id="modal-email" name="zen_email" class="contact__input" placeholder="<?php esc_attr_e( 'alex@neonzen.yoga', 'zen-yoga' ); ?>" required>
			</div>

			<div class="contact__field">
				<label for="modal-class" class="contact__label"><?php esc_html_e( 'Class Preference', 'zen-yoga' ); ?></label>
				<select id="modal-class" name="zen_class" class="contact__input contact__select">
					<option value="electric-vinyasa"><?php esc_html_e( 'Electric Vinyasa', 'zen-yoga' ); ?></option>
					<option value="immersive-audio"><?php esc_html_e( 'Immersive Audio', 'zen-yoga' ); ?></option>
					<option value="bio-thermal"><?php esc_html_e( 'Bio-Thermal', 'zen-yoga' ); ?></option>
					<option value="restorative"><?php esc_html_e( 'Restorative Flow', 'zen-yoga' ); ?></option>
				</select>
			</div>

			<button type="submit" class="btn btn--primary contact__submit" style="width:100%;">
				<?php esc_html_e( 'Request Access', 'zen-yoga' ); ?>
			</button>
		</form>
	</div>
</div>
