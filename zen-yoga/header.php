<?php
/**
 * Theme header — Neon Zen dark nav.
 *
 * @package Zen_Yoga
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
	<div class="site-header__inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo" rel="home">
			<span class="site-header__bolt" aria-hidden="true">⚡</span>
			<span class="site-header__brand-name"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
		</a>

		<button class="site-header__menu-toggle" id="menu-toggle" aria-controls="primary-nav" aria-expanded="false">
			<span class="sr-only"><?php esc_html_e( 'Menu', 'zen-yoga' ); ?></span>
			<span class="hamburger"></span>
		</button>

		<nav class="site-header__nav" id="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'zen-yoga' ); ?>">
			<ul class="site-header__nav-list">
				<li><a href="#about"><?php esc_html_e( 'About', 'zen-yoga' ); ?></a></li>
				<li><a href="#classes"><?php esc_html_e( 'Classes', 'zen-yoga' ); ?></a></li>
				<li><a href="#schedule"><?php esc_html_e( 'Schedule', 'zen-yoga' ); ?></a></li>
				<li><a href="#contact"><?php esc_html_e( 'Contact', 'zen-yoga' ); ?></a></li>
			</ul>
		</nav>

		<a href="#contact" class="btn btn--primary site-header__cta"><?php esc_html_e( 'Book Now', 'zen-yoga' ); ?></a>
	</div>
</header>
