

<?php
/* Image */
$image_url =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'nakedpress_big' );
?>

<div data-scroll-section class="cover cover__page" style="background: url(<?php echo  $image_url[0]; ?>) center center; background-size: cover;">

  <div class="cover__content">

    <h1 class="headline">

      <span data-scroll class="text-reveal"><b class="delay-2"><?php the_title(); ?></b></span>

    </h1>


  </div>



 </div>
