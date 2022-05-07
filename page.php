<?php get_header(); 

?>

<div class="page">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<div id="our-post-thumbnail">
				</div>
				<?php the_content(); ?>
			</article>
		<?php
		endwhile;

		if ( is_single() ) :
			previous_post_link();
			next_post_link();
		endif;
	else :
		_e( 'Sorry, no posts matched your criteria.', 'textdomain' );
	endif;
	?>

</div>

<?php get_footer(); ?>
