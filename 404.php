<?php
/**
* Template for displaying 404 pages (Not Found)
*
* @package nakedpress
*/

get_header(); ?>

<main>

  <article <?php post_class(); ?>>

    <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nakedpress' ); ?></h1>
    <h2><?php esc_html_e( '404 Error', 'nakedpress' ); ?></h2>

    <p><?php esc_html_e( 'The page you are trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'nakedpress' ); ?></p>

    <?php get_search_form(); ?>

  </article>

</main>

<?php get_footer(); ?>
