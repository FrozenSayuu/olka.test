<?php

get_header();

$sport_query = new WP_Query
([
    'post_type' => 'wcm_travel',
	'posts_per_page' => 9
]);
?>

<div class="container">
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