<?php get_header(); 

$soccer_query = new WP_Query
([
    'post_type' => 'travel_soccer',
	'tax_query' => [
		'taxonomy' => 'travel_sport_type',
		'field' => 'slug',
		'terms' => 'fotboll',
	],
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

	<div class="fotboll container">
		<h2>Utvalda fotbollsresor</h2>
		<p>Klicka <a href="../soccer">här</a> för att se fler!</p>
    	<div class="row row-cols-3">
<?php
if ( $soccer_query->have_posts() ) :
    while ( $soccer_query->have_posts() ) : $soccer_query->the_post(); ?>
    <div class="col fotboll-body">
        <div class="card" style="width: 18rem;">
			<div class="card-img-top"><?php the_post_thumbnail('travel-gallery'); ?></div>
            <div class="fotboll-text">
                <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
                <?php the_excerpt() ?>
            </div>
		</div>
		<div class="fotboll-btn">
			<a href="<?php the_permalink();?>" class="btn btn-primary">Visa mer</a>
		</div>
    </div>
    <?php
    endwhile; endif; wp_reset_postdata();
?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
