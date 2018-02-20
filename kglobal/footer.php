<footer class="footer flex-container">
	<div class="flex-100 logo">
		<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-kglobal-main.svg" alt=""></a>
	</div>
	<div class="flex-1-4 flex-container column space-between info">
		<div>
			<p>kglobal</p>
			<p>Washington, DC</p>
			<p>Los Angeles, CA</p>
		</div>
		<div>
			<p>kglobal.com</p>
			<p><a href="mailto:hello@kglobal.com">hello@kglobal.com</a></p>
		</div>
	</div>
	<div class="flex-1-4 nav">
		<?php wp_nav_menu( array( 'menu' => '3', ) ); ?>
	</div>
	<div class="flex-1-4 nav">
		<?php wp_nav_menu( array( 'menu' => '12', ) ); ?>
	</div>
	<div class="flex-1-4 flex-container social">
		<a href="https://www.facebook.com/kglobal/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-facebook.svg" alt="kglobal Facebook" /></a>
		<a href="https://twitter.com/kglobaldc" target="_blank"><img class="twitter-icon" src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-twitter.svg" alt="kglobal Twitter" /></a>
		<a href="https://www.linkedin.com/company/kglobal" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-linkedin.svg" alt="kglobal LinkedIn" /></a>
	</div>
	<?php wp_footer(); ?>
	<div class="flex-100 flex-container justify-center copyright">
		<p>Copyright © 2017 kglobal | A division of <strong><a href="http://www.zenetex.com/" target="_blank">Zenetex</a></strong> | All rights reserved.</p>
	</div>
</footer>
<!-- <script type="text/javascript">
   var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'Replace-This']);
   _gaq.push(['_trackPageview']);
   (function() {
     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
   })();
 </script> -->
</body>
</html>
