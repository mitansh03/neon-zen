<?php
/**
 * Contact section — neon info card + lead gen form.
 *
 * @package Zen_Yoga
 */
?>

<section class="section contact" id="contact">
	<div class="container">
		<!-- Neon green info card -->
		<div class="contact__info-card reveal reveal--left">
			<h2 class="contact__heading"><?php esc_html_e( 'Ready To Plug In?', 'zen-yoga' ); ?></h2>
			<p class="contact__text">
				<?php esc_html_e( 'Join the waitlist for our next high-voltage session. First class is on us.', 'zen-yoga' ); ?>
			</p>
			<ul class="contact__details">
				<li class="contact__detail">
					<svg class="contact__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
					<span><?php esc_html_e( '123 Vinyasa Blvd, Neon City', 'zen-yoga' ); ?></span>
				</li>
				<li class="contact__detail">
					<svg class="contact__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
					<a href="mailto:contact@neonzen.yoga"><?php esc_html_e( 'contact@neonzen.yoga', 'zen-yoga' ); ?></a>
				</li>
			</ul>
		</div>

		<!-- Lead gen form -->
		<div class="contact__form-wrap reveal reveal--right">
			<form class="contact__form" action="#" method="post">
				<div class="contact__field">
					<label for="zen-name" class="contact__label"><?php esc_html_e( 'Your Name', 'zen-yoga' ); ?></label>
					<input type="text"
					       id="zen-name"
					       name="zen_name"
					       class="contact__input"
					       placeholder="<?php esc_attr_e( 'Alex Flow', 'zen-yoga' ); ?>"
					       required>
				</div>

				<div class="contact__field">
					<label for="zen-email" class="contact__label"><?php esc_html_e( 'Email Address', 'zen-yoga' ); ?></label>
					<input type="email"
					       id="zen-email"
					       name="zen_email"
					       class="contact__input"
					       placeholder="<?php esc_attr_e( 'alex@neonzen.yoga', 'zen-yoga' ); ?>"
					       required>
				</div>

				<div class="contact__field">
					<label for="zen-class" class="contact__label"><?php esc_html_e( 'Class Preference', 'zen-yoga' ); ?></label>
					<select id="zen-class" name="zen_class" class="contact__input contact__select">
						<option value="electric-vinyasa"><?php esc_html_e( 'Electric Vinyasa', 'zen-yoga' ); ?></option>
						<option value="immersive-audio"><?php esc_html_e( 'Immersive Audio', 'zen-yoga' ); ?></option>
						<option value="bio-thermal"><?php esc_html_e( 'Bio-Thermal', 'zen-yoga' ); ?></option>
						<option value="restorative"><?php esc_html_e( 'Restorative Flow', 'zen-yoga' ); ?></option>
					</select>
				</div>

				<button type="submit" class="btn btn--primary contact__submit">
					<?php esc_html_e( 'Request Access', 'zen-yoga' ); ?>
				</button>
			</form>
		</div>
	</div>
</section>
