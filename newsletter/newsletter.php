<div class="newsletter">
	<h2>Prenumerera på vårt nyhets-brev!</h2>
	<p>Få melj skickad till dig med de senaste nyheterna så du aldrig missar ett spännande erbjudande!</p>

	<div class="newsletter-opt">
        <form action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" id="newsletter_form">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( "newsletter_nonce" ); ?>"/>
            <?php wp_nonce_field( 'nonce', 'newsletter_nonce' ); ?>
        
            <input type="hidden" name="action" value="newsletter_action" />

			<label for="opt1">Träningsläger</label>
			<input type="checkbox" name="opt1" id="opt1" value="Träningsläger">

			<label for="opt1">Cupp</label>
			<input type="checkbox" name="opt1" id="opt2" value="Cupp">

			<label for="opt1">Fotbollsläger</label>
			<input type="checkbox" name="opt1" id="opt3" value="Fotbollsläger">

			<label for="opt1">Sportläger</label>
			<input type="checkbox" name="opt1" id="opt4" value="Sportläger">
	</div>
			<div class="newsletter-mail">
				<input type="mail" name="mail" placeholder="Din mail" required>
				<input type="submit">
		</form>
			</div>
            <p id="success"></p>
</div>