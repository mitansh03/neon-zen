<?php
/**
 * Front page template — Neon Zen single-page landing site.
 *
 * @package Zen_Yoga
 */

get_header();
?>

<main id="main-content" role="main">
	<?php get_template_part( 'template-parts/section', 'hero' ); ?>
	<?php get_template_part( 'template-parts/section', 'about' ); ?>
	<?php get_template_part( 'template-parts/section', 'classes' ); ?>
	<?php get_template_part( 'template-parts/section', 'schedule' ); ?>
	<?php get_template_part( 'template-parts/section', 'testimonials' ); ?>
	<?php get_template_part( 'template-parts/section', 'contact' ); ?>
	<?php get_template_part( 'template-parts/section', 'cta' ); ?>
</main>

<?php
get_footer();
