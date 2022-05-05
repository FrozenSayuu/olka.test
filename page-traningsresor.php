<?php

get_header();

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
   get_template_part('template-parts/tripdet');
   get_template_part('template-parts/latestnews');
   get_template_part('template-parts/reviewbox');
   
   ?>

</div>

<?php 

get_footer();

?>