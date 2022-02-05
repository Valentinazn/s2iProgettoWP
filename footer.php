<?php

/**
* Template for displaying the footer
*
* Contains the closing of the class=container div and all content
* after.
*
* @package nakedpress
*/
?>

<footer data-scroll-section class="footer margin-top">
			<div class="grid">
				<div class="col-100 margin-bottom">
					<div class="horizontal-separator"></div>
				</div>
				<div class="col-25">

					<h4>Orari e contatti</h4>
					<p>lun.-sab. 8/19 <br>dom. Chiuso</p>
					<p>222 - 222 - 222</p>

				</div>

				<div class="col-25">
					<h4>Info</h4>

					<a href="#">Policy Privacy</a>
					<a href="#">Cookie Privacy</a>
					<a href="#">Termini e condizioni</a>

				</div>
				<div class="col-25">

					<h4>Seguici sui social</h4>
					<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/facebook.svg" alt="logo facebook"></a>
					<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/instagram.svg" alt="logo instagram"></a>
					<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/twitter.svg" alt="logo twitter"></a>

				</div>



				<div class="col-25">
					<h4>Dove siamo</h4>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2812.039919231546!2d9.148944814939329!3d45.186288159966324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4787265aa603408d%3A0x5eba6a64a8f50838!2sCorso%20Camillo%20Benso%20Cavour%2C%2027100%20Pavia%20PV!5e0!3m2!1sit!2sit!4v1643547787035!5m2!1sit!2sit" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
				<div class="col-100 footer__final-text">
					<p>	<?php esc_html_e('&copy; Copyright ', 'nakedpress');?>
						<?php echo date("o");?>
						<?php bloginfo('name'); ?> P.iva 0000000000000
					</p>

				</div>
			</div>


		</footer>

	</main>

</div>



<?php wp_footer();?>

</body>
</html>
