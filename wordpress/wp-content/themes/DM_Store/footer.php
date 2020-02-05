</main>		
	<?php wp_footer(); // intégre des éléments indispensable à WP. Comme les fichiers css, js, la barre d'administration côté FrontEnd, etc.. ?>
	<div class="back_to_top">
		<a href="#top_from_page">Retour en haut</a>
	</div>
	<footer class="container-fluid">
		<div class="row">
			<div class="nav_footer">
		<?php
             wp_nav_menu( 
              array( 
            'theme_location' => 'footer-menu',
            'container'      => false,
            'menu_class'     => 'footer_menu'        
            ) ); 
		  ?> 
		  <span class="ligne"></span>
		  </div>  
		</div>
	
	<div class="last_footer">
	<span class="custom_logo">
            <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo();}?>
          </span>
		<p>&copy; <?php bloginfo( 'name' );?> 2019-2020</p>
	</div>
	</footer>
	
	
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>  
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/script.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/single-product.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/my-account.js"></script>
	<script src="https://unpkg.com/scrollreveal"></script>
	</body>
</html>