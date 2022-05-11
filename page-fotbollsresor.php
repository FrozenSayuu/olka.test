<?php get_header(); 

$soccer_query = new WP_Query
([
    'post_type' => 'travel_soccer',
	'tax_query' => [
		'taxonomy' => 'travel_sport_type',
		'field' => 'slug',
		'terms' => 'fotboll',
		'meta_key' => 'on_startpage',
		'meta_value' => 'true'
	]
]);

?>

<div class="soccer">

	<div id="slider-cont">
		<div class="slider">
			<?php
			echo do_shortcode('[smartslider3 slider="4"]');
			?>
		</div>
		<div id="slider-txt">
			<h1>Stadium paket</h1>
			<p>Fotboll + resa = Fotbollsresa! Här hittar du alla fotbolls relaterade resor, vare sig matcher eller cuper hittar du här.</p>
            <button>Boka nu</button>
        </div>
	</div>

	<div class="container" style="margin: 5rem 0;">
		<h2>Utvalda fotbollsresor</h2>
		<p>Klicka <a href="../soccer">här</a> för att se fler!</p>
    	<div class="row row-cols-3">
<?php
if ( $soccer_query->have_posts() ) :
    while ( $soccer_query->have_posts() ) : $soccer_query->the_post(); ?>
    <div class="col" style="margin: 1rem 0;">
        <div class="card" style="width: 18rem;">
			<div class="card-img-top" id="our-post-thumbnail"><?php the_post_thumbnail('travel-gallery'); ?></div>
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php the_excerpt() ?></p>
                <a href="<?php the_permalink();?>" class="btn btn-primary">Visa mer</a>
            </div>
        </div>
    </div>
    <?php
    endwhile; endif; wp_reset_postdata();
?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
