<?php

/**
* Header template for our theme
*
* Displays all of the <head> section and everything up till <div class="container">.
*
* @since nakedpress
*/

?>

<!DOCTYPE html>

<html <?php language_attributes(); /* add attributes */ ?>>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo( 'description' );   /* insert wp blog description */ ?>" />

  <!-- Meta for IE support -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php wp_head(); /* insert scripts and tags in header */ ?>

</head>
<body <?php body_class(); /* add class to body */  ?>>

  <div class="preloader"></div>

 <div class="fixed">

   <div class="header">

     <div class="header__logo">
       <a href="<?php echo home_url();?>" class="logo">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/svg/superfineGreyLogo.svg" alt="<?php bloginfo('title'); ?>">
       </a>
     </div>

     <div class="header__menu" id="main-menu">



       <?php
       wp_nav_menu(array(
         'theme_location' => 'header',
         'walker' => new Clean_Walker_Nav(),
         'container' => false,
         'items_wrap' => '<ul class="site-nav">%3$s</ul>'
       ));
       ?>

       <div class="line-menu"></div>

     </div>

     <div class="header__cta">
       <a href="http://s2iprogettowpcopia.local/ordina-ora/" class="button">Ordina</a>
     </div>

     <div class="header__icon">
       <div class="icon-hamburger">
         <span></span>
       </div>
     </div>



   </div>

 </div>


 <div class="scroll-container" data-scroll-container>


   <main id="swup" class="transition-fade">




  <?php if (is_page_template( 'page-templates/home-page.php' )) { /* if is home page template show the code inside */ ?>

    <!-- seo title home -->
    <h1 class="home-title"><?php bloginfo('name'); /* insert blog name */ ?> -  <?php bloginfo('description'); /* insert blog description */  ?></h1>

  <?php } /* end if */ ?>
