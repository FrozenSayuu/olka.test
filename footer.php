    <footer class="site-footer">
        <div class="footer-txt">
            <h2><?php bloginfo('name') ?></h2>
            <p><?php bloginfo( 'description' ); ?></p>

        </div>

        <div class="footer-menu">
            <h3>Meny</h3>
            <?php wp_nav_menu(['theme_location' => 'footer', 'container' => 'nav']) ?>
        </div>
        <div class="footer-secmenu">
            <h3>Meny</h3>
           <?php wp_nav_menu(['theme_location' => 'footer-sec', 'container' => 'nav']) ?>
           </div>
    
        <div class="footer-rights">
            <p>© 2022 <?php bloginfo( 'name' ) ?>. All Rights Reserved.</p>
            <a href="../privacy-policy/">Privacy Policy</a>
            <a href="#">Terms of Service</a>
        </div>
    </footer>
</div> <!-- closes <div class=container"> -->
<?php wp_footer() ?>
</body>
</html>