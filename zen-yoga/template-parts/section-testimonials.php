<?php
/**
 * Testimonials section — member quotes with neon accent styling.
 *
 * @package Zen_Yoga
 */

$testimonials = array(
	array(
		'quote'  => __( 'I walked in skeptical about "electric yoga." Three months later, I\'ve never been stronger or more centered. The soundscapes alone are worth it.', 'zen-yoga' ),
		'name'   => __( 'Priya Sharma', 'zen-yoga' ),
		'title'  => __( 'Software Engineer', 'zen-yoga' ),
		'avatar' => 'testimonial-priya.jpg',
	),
	array(
		'quote'  => __( 'Bio-Thermal changed my relationship with heat training. The instructors push you just enough — you leave feeling like you\'ve unlocked something.', 'zen-yoga' ),
		'name'   => __( 'Arjun Mehta', 'zen-yoga' ),
		'title'  => __( 'Founder, Pulse Labs', 'zen-yoga' ),
		'avatar' => 'testimonial-arjun.jpg',
	),
	array(
		'quote'  => __( 'The 6 AM Electric Vinyasa is the best hour of my day. Dark room, deep bass, full intensity. Nothing else in Bangalore comes close.', 'zen-yoga' ),
		'name'   => __( 'Meera Iyer', 'zen-yoga' ),
		'title'  => __( 'Fitness Coach', 'zen-yoga' ),
		'avatar' => 'testimonial-meera.jpg',
	),
);
?>

<section class="section testimonials" id="testimonials">
	<div class="container">
		<div class="section__heading reveal">
			<p class="neon-label"><?php esc_html_e( 'The Proof', 'zen-yoga' ); ?></p>
			<h2><?php esc_html_e( 'Voices From The Flow', 'zen-yoga' ); ?></h2>
		</div>

		<div class="testimonials__grid">
			<?php foreach ( $testimonials as $index => $testimonial ) : ?>
				<blockquote class="testimonials__card reveal">
					<div class="testimonials__quote-mark" aria-hidden="true">"</div>
					<p class="testimonials__quote"><?php echo esc_html( $testimonial['quote'] ); ?></p>
					<footer class="testimonials__author">
						<div class="testimonials__avatar">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $testimonial['avatar'] ); ?>"
							     alt="<?php echo esc_attr( $testimonial['name'] ); ?>"
							     loading="lazy"
							     width="56"
							     height="56">
						</div>
						<div class="testimonials__author-info">
							<cite class="testimonials__name"><?php echo esc_html( $testimonial['name'] ); ?></cite>
							<span class="testimonials__title"><?php echo esc_html( $testimonial['title'] ); ?></span>
						</div>
					</footer>
				</blockquote>
			<?php endforeach; ?>
		</div>
	</div>
</section>
