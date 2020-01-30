</main>		
	<?php wp_footer(); // intégre des éléments indispensable à WP. Comme les fichiers css, js, la barre d'administration côté FrontEnd, etc.. ?>
	<footer class="container">
	<?php dynamic_sidebar('region-footer'); ?>
	  <p>&copy; Domostore Tous droit réservé</p>
	</footer>
	
	
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>  
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/script.js"></script>
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/front.js"></script>
	</body>
</html>