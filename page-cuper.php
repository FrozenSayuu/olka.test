<?php

get_header();
?>

<div class="cup">
<?php
$cup_query = new WP_Query
([
    'post_type' => 'travel_cup',
    'tax_query' => [
        [
            'taxonomy' => 'travel_type',
            'field' => 'slug',
            'terms' => 'cuper',
            'meta_key' => 'on_startpage',
            'meta_value' => true
        ],
    ],
]);

get_template_part('template-parts/headingfourpics');

if ( $cup_query->have_posts() ) :
    while ( $cup_query->have_posts() ) : $cup_query->the_post(); ?>
        <article <?php
        post_class(); ?> id="post-<?php
        the_ID(); ?>">
            <a href="<?php
            the_permalink(); ?>"><h2><?php
                    the_title(); ?></h2></a>
            <div id="our-post-thumbnail">
                <?php
                the_post_thumbnail( 'travel-gallery' ); ?>
            </div>
            <?php
            the_content(); ?>
        </article>
    <?php
    endwhile; endif; wp_reset_postdata();
?>

</div>

<?php

get_footer();

?>