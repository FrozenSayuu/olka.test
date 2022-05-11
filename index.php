<?php get_header(); ?>

<div class="index">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article style="margin-bottom: 15rem;" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<div id="our-post-image"><?php the_post_thumbnail('travel-gallery'); ?></div>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink();?>" class="btn btn-primary">Visa hela</a>
			</article>
		<?php
		endwhile;

		if ( is_single() ) :
			previous_post_link();
			next_post_link();
		endif;
	else :
		_e( 'Oj hoppsan, här var det tomt.', 'textdomain' );
	endif;
	?>

</div>

<?php get_footer(); ?>
