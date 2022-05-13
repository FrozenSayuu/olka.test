<?php

get_header();

$camp_query = new WP_Query
([
	'post_type' => 'travel_camp',
	'posts_per_page' => 9
]);
?>

<div class="training-cont">
	<div id="slider-cont">
		<div class="slider">
			<?php
			echo do_shortcode('[smartslider3 slider="3"]');
			?>
		</div>
		<div id="slider-txt">
			<h1>Välkommen till våra träningsläger!</h1>
			<p>Sugen på träningsläger? Här nedan hittar du alla olika sorters läger för alla åldrar, kön och sporter. Här kan du titta runt och spana in de olika lägren vi har om du är osäker på vad du är ute efter. Om du redan vet vad du vill boka så kan du trycka på knappen och säkra din plats på lägret!</p>
            <button>Boka nu</button>
        </div>
	</div>

	<div class="heading-det">
        <div id="heading-title">
            <h2>Välkommen till våra träningsläger!</h2>
            <p>I vårt utbud hittar du läger för flickor och pojkar, små som tonåring samt de flesta sporter som finns. Padel, tennis, fotboll, yoga, ishockey och fler! På denna sida hittar du inspiration på olika läger som finns, få information och boka de som du eller dina barn vill delta på! Vare sig favorit sport eller prova på något nytt så har vi lägret för dig!</p>
        </div>
        <div id="heading-imgs">
			<div class="row row-cols-2">
<?php
	if ( $camp_query->have_posts() ) :
		$camp4_query = new WP_Query
		([
			'post_type' => 'travel_camp',
			'posts_per_page' => 4
		]);
    while ( $camp4_query->have_posts() ) : $camp4_query->the_post(); ?>
		
		<div class="col heading-img">
			<?php the_post_thumbnail('travel-gallery'); ?>
		</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
	</div>

<?php get_template_part('template-parts/reviewbox'); ?>

 <div class="trip-det container">
		<div>
			<h2>Utvalda läger</h2>
			<p>Tryck <a href="../camp" style="color: black; text-decoration: underline;">här</a> om du vill se alla läger!</p>
		</div>
		<div class="row row-cols-3">
<?php
if ( $camp_query->have_posts() ) :
    while ( $camp_query->have_posts() ) : $camp_query->the_post(); ?>
		<div class="row">
			<div class="col-2">
			<img src="../wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			</div>
            <div class="col-8">
				<a href="<?php the_permalink(); ?>">
                	<h3><?php the_title(); ?></h3>
				</a>
                <p><?php the_excerpt(); ?></p>
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