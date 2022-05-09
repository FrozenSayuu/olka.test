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
    
<?php

get_template_part('template-parts/headingfourpics');
?>
<div class="container">
    <h2>Våra cupper</h2>
    <div class="row row-cols-3">
<?php
if ( $cup_query->have_posts() ) :
    while ( $cup_query->have_posts() ) : $cup_query->the_post(); ?>
    <div class="col" style="margin: 1rem 0;">
        <div class="card" style="width: 18rem;">
            <img src="../wp-content/uploads/2022/05/mig.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php the_excerpt() ?></p>
                <a href="<?php the_permalink();?>" class="btn btn-primary">Visa mer</a>
            </div>
        </div>
    </div>
    <?php
    $count = $cup_query->found_posts();
    endwhile; endif; wp_reset_postdata();
?>
</div>
</div>

<?php

get_footer();

?>