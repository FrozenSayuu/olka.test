<?php get_header();
global $query_string;
$search = trim($query_string, "s=");
?>

<div class="search-cont">
	<h1>Ditt sökresultat för <?php echo $search; ?>:</h1>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article style="margin-bottom: 5rem;" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<?php
				if( get_the_post_thumbnail() ) : ?>
					<div id="our-post-image">
						<?php the_post_thumbnail('travel-gallery'); ?>
					</div>
				<?php
				endif; 
				the_excerpt(); ?>
				<a href="<?php the_permalink();?>" class="btn btn-primary">Visa hela</a>
			</article>
		<?php
		endwhile;

		if ( is_single() ) :
			previous_post_link();
			next_post_link();
		endif;
	else :
		_e( 'Hoppsan! Inga träffar matchade din sökning.', 'textdomain' );
	endif;
	?>

</div>

<?php get_footer(); ?>
