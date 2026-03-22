<?php
/**
 * Schedule section — weekly class timetable with neon accents.
 *
 * @package Zen_Yoga
 */

$schedule = array(
	'mon' => array(
		'day'     => __( 'Monday', 'zen-yoga' ),
		'short'   => __( 'Mon', 'zen-yoga' ),
		'classes' => array(
			array( 'time' => '6:00 AM', 'name' => __( 'Electric Vinyasa', 'zen-yoga' ), 'level' => __( 'Advanced', 'zen-yoga' ) ),
			array( 'time' => '10:00 AM', 'name' => __( 'Restorative Flow', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
			array( 'time' => '6:30 PM', 'name' => __( 'Bio-Thermal', 'zen-yoga' ), 'level' => __( 'Intermediate', 'zen-yoga' ) ),
		),
	),
	'tue' => array(
		'day'     => __( 'Tuesday', 'zen-yoga' ),
		'short'   => __( 'Tue', 'zen-yoga' ),
		'classes' => array(
			array( 'time' => '6:00 AM', 'name' => __( 'Bio-Thermal', 'zen-yoga' ), 'level' => __( 'Intermediate', 'zen-yoga' ) ),
			array( 'time' => '12:00 PM', 'name' => __( 'Immersive Audio', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
			array( 'time' => '7:00 PM', 'name' => __( 'Electric Vinyasa', 'zen-yoga' ), 'level' => __( 'Advanced', 'zen-yoga' ) ),
		),
	),
	'wed' => array(
		'day'     => __( 'Wednesday', 'zen-yoga' ),
		'short'   => __( 'Wed', 'zen-yoga' ),
		'classes' => array(
			array( 'time' => '7:00 AM', 'name' => __( 'Restorative Flow', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
			array( 'time' => '5:30 PM', 'name' => __( 'Electric Vinyasa', 'zen-yoga' ), 'level' => __( 'Advanced', 'zen-yoga' ) ),
			array( 'time' => '8:00 PM', 'name' => __( 'Immersive Audio', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
		),
	),
	'thu' => array(
		'day'     => __( 'Thursday', 'zen-yoga' ),
		'short'   => __( 'Thu', 'zen-yoga' ),
		'classes' => array(
			array( 'time' => '6:00 AM', 'name' => __( 'Electric Vinyasa', 'zen-yoga' ), 'level' => __( 'Advanced', 'zen-yoga' ) ),
			array( 'time' => '11:00 AM', 'name' => __( 'Bio-Thermal', 'zen-yoga' ), 'level' => __( 'Intermediate', 'zen-yoga' ) ),
			array( 'time' => '7:00 PM', 'name' => __( 'Restorative Flow', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
		),
	),
	'fri' => array(
		'day'     => __( 'Friday', 'zen-yoga' ),
		'short'   => __( 'Fri', 'zen-yoga' ),
		'classes' => array(
			array( 'time' => '6:00 AM', 'name' => __( 'Immersive Audio', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
			array( 'time' => '5:00 PM', 'name' => __( 'Electric Vinyasa', 'zen-yoga' ), 'level' => __( 'Advanced', 'zen-yoga' ) ),
			array( 'time' => '7:30 PM', 'name' => __( 'Bio-Thermal', 'zen-yoga' ), 'level' => __( 'Intermediate', 'zen-yoga' ) ),
		),
	),
	'sat' => array(
		'day'     => __( 'Saturday', 'zen-yoga' ),
		'short'   => __( 'Sat', 'zen-yoga' ),
		'classes' => array(
			array( 'time' => '8:00 AM', 'name' => __( 'Electric Vinyasa', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
			array( 'time' => '10:30 AM', 'name' => __( 'Restorative Flow', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
			array( 'time' => '5:00 PM', 'name' => __( 'Immersive Audio', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
		),
	),
	'sun' => array(
		'day'     => __( 'Sunday', 'zen-yoga' ),
		'short'   => __( 'Sun', 'zen-yoga' ),
		'classes' => array(
			array( 'time' => '9:00 AM', 'name' => __( 'Restorative Flow', 'zen-yoga' ), 'level' => __( 'All Levels', 'zen-yoga' ) ),
			array( 'time' => '11:00 AM', 'name' => __( 'Bio-Thermal', 'zen-yoga' ), 'level' => __( 'Intermediate', 'zen-yoga' ) ),
		),
	),
);
?>

<section class="section schedule" id="schedule">
	<div class="container">
		<div class="section__heading reveal">
			<p class="neon-label"><?php esc_html_e( 'The Rhythm', 'zen-yoga' ); ?></p>
			<h2><?php esc_html_e( 'Weekly Schedule', 'zen-yoga' ); ?></h2>
			<p class="section__subtitle">
				<?php esc_html_e( 'Find your frequency. Every session is designed to sync your body with sound and movement.', 'zen-yoga' ); ?>
			</p>
		</div>

		<div class="schedule__grid">
			<?php foreach ( $schedule as $key => $day ) : ?>
				<div class="schedule__day reveal">
					<div class="schedule__day-header">
						<span class="schedule__day-name"><?php echo esc_html( $day['day'] ); ?></span>
						<span class="schedule__day-short"><?php echo esc_html( $day['short'] ); ?></span>
					</div>
					<ul class="schedule__slots">
						<?php foreach ( $day['classes'] as $class ) : ?>
							<li class="schedule__slot">
								<span class="schedule__time"><?php echo esc_html( $class['time'] ); ?></span>
								<span class="schedule__class-name"><?php echo esc_html( $class['name'] ); ?></span>
								<span class="schedule__level"><?php echo esc_html( $class['level'] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="schedule__cta reveal">
			<p class="schedule__cta-text"><?php esc_html_e( 'Can\'t find a slot? Message us for private sessions.', 'zen-yoga' ); ?></p>
			<a href="#contact-modal" class="btn btn--primary" data-modal-open><?php esc_html_e( 'Book a Session', 'zen-yoga' ); ?></a>
		</div>
	</div>
</section>
