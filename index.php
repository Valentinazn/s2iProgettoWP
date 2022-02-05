<?php
/**
* Theme: nakedpress
*
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* Also it's used to display search results, category page, tag page and date page.
*
* @package nakedpress
*/

get_header();

?>

<div data-scroll-section class="grid page-min-height margin-top-big">

  <main class="col-70">


    <?php if ( is_search() ) { /* if is search page show words searched */ ?>

      <h1><?php esc_html_e('Result for:', 'nakedpress'); ?> <strong><i><?php echo $s ?></i></strong></h1>

    <?php } else if ( is_category() || is_tag() ) {  /* if is tag or category page show cat/tag title */ ?>

      <h1><?php echo single_cat_title() ?></h1>

    <?php } else if ( is_home() ){  /* if is home show home title */  ?>

      <h1><?php single_post_title(); ?></h1>

    <?php } else if ( is_date() ){ /* if is date show month title */ ?>

      <h1><?php single_month_title(' '); ?></h1>

    <?php } else if ( is_archive() ){ /* if is home show archive title */?>

      <h1><?php post_type_archive_title(); ?></h1>

    <?php } ?>


    <?php if (have_posts()) : /* if have post in loop */?>
      <?php while(have_posts()) : the_post(); /* START loop articles */ ?>

        <article <?php post_class(); /* insert post class */ ?>>

          <a href="<?php the_permalink(); /* insert link */ ?>">
            <?php the_post_thumbnail('nakedpress_quad', array('class' => 'img-res','alt' => get_the_title())); /* insert image with title */ ?>
          </a>

          <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); /* insert title */ ?></a></h3>

          <p>
            <strong><?php the_time('j M , Y'); /* insert date */ ?> &nbsp; <?php the_category(', '); /* insert categories */ ?></strong>
          </p>

          <?php the_excerpt(); /* insert article excerpt */?>

        </article>

      <?php endwhile; /* END loop after articles show pagination */ ?>

      <?php get_template_part('inc/pagination'); ?>

    <?php else : /* else if no article show message */ ?>

      <h3><?php esc_html_e('Sorry, no posts matched your criteria.', 'nakedpress'); ?></h3>
      <p><?php esc_html_e('Try to make a search...', 'nakedpress'); ?></p>

      <?php get_search_form(); /* include search form */ ?>

    <?php endif; /* end if */?>

  </main>

  <aside class="col-30">

    <?php get_sidebar(); /* insert sidebar */ ?>

  </aside>

</div>


<?php get_footer(); /* insert footer.php */ ?>
