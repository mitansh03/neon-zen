<?php
/**
 * Classes section — "Experience The Flow" with 4 class cards.
 *
 * @package Zen_Yoga
 */

$classes = array(
	array(
		'slug'  => 'electric-vinyasa',
		'label' => __( 'Level: Advanced', 'zen-yoga' ),
		'title' => __( 'Electric Vinyasa', 'zen-yoga' ),
		'image' => 'class-electric-vinyasa.jpg',
		'alt'   => __( 'Woman in athletic wear ready for Electric Vinyasa class', 'zen-yoga' ),
	),
	array(
		'slug'  => 'immersive-audio',
		'label' => __( 'Audio Focused', 'zen-yoga' ),
		'title' => __( 'Immersive Audio', 'zen-yoga' ),
		'image' => 'class-immersive-audio.jpg',
		'alt'   => __( 'Audio equipment for Immersive Audio yoga session', 'zen-yoga' ),
	),
	array(
		'slug'  => 'bio-thermal',
		'label' => __( '98 Degrees', 'zen-yoga' ),
		'title' => __( 'Bio-Thermal', 'zen-yoga' ),
		'image' => 'class-bio-thermal.jpg',
		'alt'   => __( 'Warm studio interior for Bio-Thermal yoga session', 'zen-yoga' ),
	),
	array(
		'slug'  => 'restorative',
		'label' => __( 'Restorative', 'zen-yoga' ),
		'title' => __( 'Restorative Flow', 'zen-yoga' ),
		'image' => 'class-restorative.jpg',
		'alt'   => __( 'Instructor for Restorative Flow yoga class', 'zen-yoga' ),
	),
);
?>

<section class="section classes" id="classes">
	<div class="container">
		<div class="section__heading reveal">
			<p class="neon-label"><?php esc_html_e( 'The Practice', 'zen-yoga' ); ?></p>
			<h2><?php esc_html_e( 'Experience The Flow', 'zen-yoga' ); ?></h2>
			<p class="section__subtitle">
				<?php esc_html_e( 'Four distinct dimensions of movement designed to push your limits and restore your soul.', 'zen-yoga' ); ?>
			</p>
		</div>

		<div class="classes__grid">
			<?php foreach ( $classes as $class ) : ?>
				<div class="classes__card reveal">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $class['image'] ); ?>"
					     alt="<?php echo esc_attr( $class['alt'] ); ?>"
					     class="classes__card-img"
					     loading="lazy"
					     width="600"
					     height="800">
					<div class="classes__card-overlay"></div>
					<div class="classes__card-content">
						<span class="classes__card-label"><?php echo esc_html( $class['label'] ); ?></span>
						<h3 class="classes__card-title"><?php echo esc_html( $class['title'] ); ?></h3>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
