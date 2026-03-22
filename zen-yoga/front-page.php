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
	<?php get_template_part( 'template-parts/section', 'contact' ); ?>
</main>

<?php
get_footer();
