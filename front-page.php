<?php

get_header();

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
		<a href="traningsresor">TRÄNINGSLÄGER</a>
		<a href="cupper">CUPPER</a>
		<a href="fotbollsresor">FOTBOLLSLÄGER</a>
		<a href="sportresor">SPORTLÄGER</a>
	</div>

	<div class="featured-cont">
		<h2>Sista minuten!</h2>
		<div class="featured">
			<img src="./wp-content/uploads/2022/05/mig.jpeg">
			<h4>Resemål</h4>
			<p>blablabla</p>
			<button>Visa</button>
		</div>
		<div class="featured">
			<img src="./wp-content/uploads/2022/05/mig.jpeg">
			<h4>Resemål</h4>
			<p>blablabla</p>
			<button>Visa</button>
		</div>
		<div class="featured">
			<img src="./wp-content/uploads/2022/05/mig.jpeg">
			<h4>Resemål</h4>
			<p>blablabla</p>
			<button>Visa</button>
		</div>
	</div>

	<div class="featured-cont">
		<h2>Heta ställen just nu!</h2>
		<div class="featured">
			<img src="./wp-content/uploads/2022/05/mig.jpeg">
			<h4>Resemål</h4>
			<p>blablabla</p>
			<button>Visa</button>
		</div>
		<div class="featured">
			<img src="./wp-content/uploads/2022/05/mig.jpeg">
			<h4>Resemål</h4>
			<p>blablabla</p>
			<button>Visa</button>
		</div>
		<div class="featured">
			<img src="./wp-content/uploads/2022/05/mig.jpeg">
			<h4>Resemål</h4>
			<p>blablabla</p>
			<button>Visa</button>
		</div>
	</div>

	<div class="trip-det">
		<div>
			<h2>Res Detaljer</h2>
			<p>blublsdhkasjd</p>
		</div>
		<div class="trip-cont">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
		</div>
		<div class="trip-cont2">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
		</div>
		<div class="trip-cont3">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
		</div>
		<div class="trip-cont4">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
		</div>
		<div class="trip-cont5">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
		</div>
		<div class="trip-cont6">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
		</div>
		<div class="trip-cont7">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
		</div>
		<div class="trip-cont8">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
		</div>
		<div class="trip-cont9">
			<img src="./wp-content/uploads/2022/05/output-onlinepngtools-1.png">
			<div class="trip-txt">
				<h3>Resemål</h3>
				<p>blablabla</p>
			</div>
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