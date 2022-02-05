<?php get_header(); ?>

<div data-scroll-section class="grid page-min-height margin-top-big margin-bottom-big">

  <main class="col-70">

	<?php if (have_posts()) :?>
		<?php while(have_posts()) : the_post(); ?>

			<article <?php post_class(); ?>>


					<div class="intro-text">
					<h1 class="headline">
						<span data-scroll class="text-reveal"><b class="delay-1"><?php the_title(); ?></b></span>
					</h1>
				 </div>
			

				<?php
				if ( has_excerpt( $post->ID ) ) {
					echo ' <h2>' . get_the_excerpt() . '</h2>';
				} ?>

				<p><strong> <?php the_time('j M , Y') ?></strong>	 <?php the_category(', '); ?></p>

				<?php the_post_thumbnail('nakedpress_single', array('class' => 'img-res','alt' => get_the_title())); ?>

				<?php the_content(esc_html__('Read More...', 'nakedpress'));?>

				<?php wp_link_pages('pagelink=Page %'); ?>

				<?php $post_tags = wp_get_post_tags($post->ID); if(!empty($post_tags)) {?>
					<p><span> <i class="fa fa-tag"></i> <?php the_tags('', ', ', ''); ?> </span></p>
				<?php } ?>

				<?php comments_template(); ?>

			</article>

		<?php endwhile;?>
	<?php else : ?>

		<p><?php esc_html_e('Sorry, no posts matched your criteria.', 'nakedpress'); ?></p>

	<?php endif; ?>

</main>


<aside class="col-30">

	<?php get_sidebar(); ?>

</aside>

</div>


<?php get_footer(); ?>
