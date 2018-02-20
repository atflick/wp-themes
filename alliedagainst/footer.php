<footer class="footer column <?php echo get_the_title(); ?> flex-container">
<!-- Quantcast Tag -->
<script type="text/javascript">
var _qevents = _qevents || [];

(function() {
var elem = document.createElement('script');
elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
elem.async = true;
elem.type = "text/javascript";
var scpt = document.getElementsByTagName('script')[0];
scpt.parentNode.insertBefore(elem, scpt);
})();

_qevents.push({
qacct:"p-BXn6h4QT7QQf9"
});
</script>

<noscript>
<div style="display:none;">
<img src="//pixel.quantserve.com/pixel/p-BXn6h4QT7QQf9.gif" border="0" height="1" width="1" alt="Quantcast"/>
</div>
</noscript>
<!-- End Quantcast tag -->
	<div class="footer-main-container flex-container">

		<div class="frequently-asked-questions flex-60 flex-container column">
			<p> Frequently Asked Questions </p>
			<div class="questions-container flex-container column">
				<?php wp_nav_menu(array('theme_location' => 'footer') ); ?>
			</div>
		</div>

		<div class="additional-footer-resources flex-container flex-30  column justify-center">
			<a href="/about-us">About Us</a>
			<a href="/resources">Resources</a>
			<a href="/disposal-locations">Find a Disposal Location</a>
			<a href="/contact">Contact Us</a>
			<div class="button-container">
				  <a class="twitter-follow button"  href="//twitter.com/intent/follow?original_referer=<?php echo get_site_url(); ?>&region=follow_link&screen_name=AAOA_tweets&tw_p=followbutton&variant=2.0">Follow Us On Twitter <i><img src="<?php echo get_template_directory_uri();?>/dist/images/icon-twitter.svg" class="cta-icon" /></i></a>
			</div>
		</div>
	</div>
	<div class="flex-container flex-100 copyright column center-center">
		<p> © <?php echo date("Y"); ?> Allied Against Opioid Abuse  </p>
		<div class="flex-container">
			<a target="_blank" href="https://hda.org/privacy-policy">Privacy Policy</a>
			<a target="_blank" href="https://hda.org/terms-of-use">Terms of Use</a>
		</div>
	</div>
	<?php wp_footer(); ?>
</footer>

<!-- .site-footer -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111786845-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-111786845-1');
</script>
</body>
</html>
