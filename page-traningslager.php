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
			echo do_shortcode('[smartslider3 slider="2"]');
			?>
		</div>
		<div id="slider-txt">
			<h1>sälj rubrik här</h1>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit ullam iste nisi velit?</p>
            <button>Boka nu</button>
        </div>
	</div>
<?php

get_template_part('template-parts/headingfourpics');
get_template_part('template-parts/latestnews');
get_template_part('template-parts/reviewbox');

?>
 <div class="container">
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
			<img style="height: 50px; width: 50px; border-radius: 50%; margin: auto;" src="../wp-content/uploads/2022/05/output-onlinepngtools-1.png">
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

<?php 

get_footer();

?>