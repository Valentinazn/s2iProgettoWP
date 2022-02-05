<?php
/**
* Template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site will use a
* different template.
*
* @package nakedpress
*/
get_header(); ?>

<?php if ( has_post_thumbnail() ) { ?>

    <?php get_template_part('inc/cover'); ?>

<?php } ?>

<main id="main" role="main">

  <?php if (have_posts()) :?>
    <?php while(have_posts()) : the_post(); ?>


      <article  <?php post_class(); ?>>

        <?php if ( has_post_thumbnail() ) { ?>

        <?php } else { ?>



          <div data-scroll-section class="grid">
            <div class="col-100">
            <div class="intro-text">
            <h1 class="headline">
              <span data-scroll class="text-reveal"><b class="delay-1"><?php the_title(); ?></b></span>
            </h1>
           </div>
          </div>
        </div>

          <?php
          if ( has_excerpt( $post->ID ) ) {
            echo ' <h2 class="text-center margin-bottom-big light">' . get_the_excerpt() . '</h2>';
          } ?>

        <?php } ?>

        <?php the_content(esc_html__('Read More...', 'nakedpress'));?>



      </article>


    <?php endwhile; ?>
  <?php else : ?>

    <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'nakedpress'); ?></p>

  <?php endif; ?>

</main>


<?php get_footer(); ?>
