<?php

get_header();

$sport_query = new WP_Query
([
    'post_type' => 'wcm_travel',
	'posts_per_page' => 9
]);
?>

<div id="slider-cont">
		<div class="slider">
			<?php
			echo do_shortcode('[smartslider3 slider="5"]');
			?>
		</div>
		<div id="slider-txt">
			<h1>Sportresor för alla tillfällen!</h1>
			<p>Sugen på att se favorit laget spela? Boka en sportresa för att se laget spela, boende och resa samlat i ett paket!</p>
            <button>Boka nu</button>
        </div>
	</div>

<?php get_template_part('template-parts/reviewbox'); ?>

<div class="trip-det container">
    <div>
	    <h2>Utvalda sportresor</h2>
	    <p>Tryck <a href="../travel" style="color: black; text-decoration: underline;">här</a> om du vill se alla sportresor!</p>
	</div>
	<div class="row row-cols-3">
<?php
if ( $sport_query->have_posts() ) :
    while ( $sport_query->have_posts() ) : $sport_query->the_post(); ?>
		<div class="row">
			<div class="col-2">
			<img src="../wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			</div>
            <div class="col-8">
				<a href="<?php the_permalink(); ?>">
                	<h3><?php the_title(); ?></h3>
				</a>
                <p><?php the_excerpt('50'); ?></p>
			</div>
		</div>
    <?php
    endwhile; endif; wp_reset_postdata();
?>
</div>
</div>

<?php
get_template_part('template-parts/latestnews');
get_footer();
?>