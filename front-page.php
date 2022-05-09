<?php

get_header();

$conf_query = new WP_Query
([
	'post_type' => 'netr_team',
	'posts_per_page' => 3
]);

$travel_query = new WP_Query
([
	'post_type' => 'wcm_travel',
	'posts_per_page' => 9
]);

$camp_query = new WP_Query
([
	'post_type' => 'travel_camp',
	'posts_per_page' => 3
]);

?>

<div class="index-cont">
	<div id="slider-cont">
		<div class="slider">
			<?php
			echo do_shortcode('[smartslider3 slider="2"]');
			?>
		</div>
		<div id="slider-txt">
			<h1>OLKA Sportresor</h1>
			<p><?php the_content() ?></p>
		</div>
		<div class="slider-search">
			<h1>Sök här efter din nya resa</h1>
			<?php
			echo get_search_form();
			?>
		</div>
	</div>

	<div class="quick-btn">
		<a href="traningslager">TRÄNINGSLÄGER</a>
		<a href="cuper">CUPPER</a>
		<a href="fotbollsresor">FOTBOLLSLÄGER</a>
		<a href="sportresor">SPORTLÄGER</a>
	</div>

	<div class="container">
		<h2>Sista minuten!</h2>
		<div class="row" style="margin-bottom: 5rem;">
<?php
if ( $camp_query->have_posts() ) :
    while ( $camp_query->have_posts() ) : $camp_query->the_post(); ?>
		<div class="col">
			<img src="./wp-content/uploads/2022/05/mig.jpeg">
			<h4><?php the_title() ?></h4>
			<p><?php the_excerpt() ?></p>
			<a href="<?php the_permalink();?>" class="btn btn-primary">Visa mer</a>
		</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</div>

<div class="container">
	<h2>Heta ställen just nu!</h2>
	<div class="row" style="margin-bottom: 5rem;">
<?php
if ( $conf_query->have_posts() ) :
    while ( $conf_query->have_posts() ) : $conf_query->the_post(); ?>
		<div class="col">
			<img src="./wp-content/uploads/2022/05/mig.jpeg">
			<h4><?php the_title() ?></h4>
			<p><?php the_excerpt() ?></p>
			<a href="<?php the_permalink();?>" class="btn btn-primary">Visa mer</a>
		</div>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
	</div>

	<div class="container" style="margin-bottom: 5rem;">
		<div>
			<h2>Res Detaljer</h2>
			<p>Tryck <a href="../travel" style="color: black; text-decoration: underline;">här</a> om du vill se alla resor!</p>
		</div>
		<div class="row row-cols-3">
<?php
if ( $travel_query->have_posts() ) :
    while ( $travel_query->have_posts() ) : $travel_query->the_post(); ?>
		<div class="row" style="margin-bottom: 1rem;">
			<div class="col-2">
			<img style="height: 50px; width: 50px; border-radius: 50%; margin: auto;" src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			</div>
            <div class="col-8">
				<a href="<?php the_permalink(); ?>" style="color: black;">
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

	<div class="newsletter">
		<h2>Prenumerera på vårt nyhets-brev!</h2>
		<p>blablablabla</p>

		<div class="newsletter-opt">
			<form>
				<label for="opt1">Träningsläger</label>
				<input type="checkbox" name="opt1" value="Träningsläger">
				<label for="opt1">Cupp</label>
				<input type="checkbox" name="opt1" value="Cupp">
				<label for="opt1">Fotbollsläger</label>
				<input type="checkbox" name="opt1" value="Fotbollsläger">
				<label for="opt1">Sportläger</label>
				<input type="checkbox" name="opt1" value="Sportläger">
			</div>
			<div class="newsletter-mail">
				<input type="mail" value="Din mail" required>
				<input type="submit">
			</form>
		</div>
	</div>
</div>

<?php 

get_footer();

?>