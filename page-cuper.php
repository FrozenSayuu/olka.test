<?php

get_header();

$cup_query = new WP_Query
([
    'post_type' => 'travel_cup',
    'tax_query' => [
        [
            'taxonomy' => 'travel_type',
            'field' => 'slug',
            'terms' => 'cuper'
        ],
    ],
]);
?>

<div class="cup">
    <div class="heading-det container">
        <div id="heading-title">
            <h2>Vårt utbud av cuper för alla åldrar</h2>
            <h5>Fotboll? Ishockey? Simning? Ja, vi har det! Kolla igenom våra cuper för att hitta just den perfekta för dig eller för ditt lag.</h5>
        </div>
        <div id="heading-imgs">
			<div class="row row-cols-2">
<?php
	if ( $cup_query->have_posts() ) :
		$cup4_query = new WP_Query
		([
			'post_type' => 'travel_cup',
			'posts_per_page' => 4,
            'tax_query' => [
                [
                    'taxonomy' => 'travel_type',
                    'field' => 'slug',
                    'terms' => 'cuper'
                ],
            ],
		]);
    while ( $cup4_query->have_posts() ) : $cup4_query->the_post(); ?>
		
		<div class="col heading-img">
			<?php the_post_thumbnail('travel-gallery'); ?>
		</div>
<?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
	</div>

    <div class="cuper container">
        <h2>Våra cupper</h2>
        <p>Visa alla våra cupper <a href="../cupps"  style="color: black; text-decoration: underline;">här</a></p>
        <div class="row row-cols-3">
<?php
if ( $cup_query->have_posts() ) :
    while ( $cup_query->have_posts() ) : $cup_query->the_post(); ?>
    <div class="col cuper-body">
        <div class="card" style="width: 18rem;">
            <div class="card-img-top"><?php the_post_thumbnail('travel-gallery'); ?></div>
            <div class="cup-text">
                <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
                <?php the_excerpt() ?>
            </div>
        </div>
        <div class="cup-btn">
            <a href="<?php the_permalink();?>" class="btn btn-primary">Visa mer</a>
        </div>
    </div>
    <?php
    endwhile; endif; wp_reset_postdata();
?>
</div>
</div>

<?php
get_template_part('template-parts/reviewbox');

get_footer();

?>