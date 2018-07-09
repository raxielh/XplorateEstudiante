<?php get_header(); ?>

	<div class="vid">
	   <iframe src="<?php bloginfo('stylesheet_directory') ?>/banner/index.html" width="640px" height="360px" frameborder="0" scrolling="no"></iframe>
	</div>

	<div class="clear"></div>

	<section class="video">
	    <div class="content">
	        <div class="row">

	            <div class="columns small-12 large-12">
	                <div class="cont-video">
	                   <!-- <video src="{{ info.video }}"loop controls width="100%"></video>-->
	                   <?php
						    $args = array('p' => 1);
						    $post = new WP_Query($args);
						    if($post->have_posts()) :
						        $post->the_post();
						?>
						        <?php the_content() ?>
						<?php
						   else:
						?>
						      Vaya, no hay entradas.
						<?php
						   endif;
						?>
	                </div>
	            </div>
	            <div class="columns small-12 large-12">
	                <div class="text">
	                   <?php
						    $args = array('p' => 12);
						    $post = new WP_Query($args);
						    if($post->have_posts()) :
						        $post->the_post();
						?>
						    <?php the_content() ?>
						<?php
						   else:
						?>
						      Vaya, no hay entradas.
						<?php
						   endif;
						?>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	<div class="clear"></div>

<?php
   $args = array('cat' => 2);
   $category_posts = new WP_Query($args);
 
   if($category_posts->have_posts()) :
      	while($category_posts->have_posts()) :
        	$category_posts->the_post();
            $thumbID = get_post_thumbnail_id( $post->ID );
        	$imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' );
?>

	<section class="Physical global nth" style="background-image:url(<?php echo $imgDestacada[0] ?>)">
	    <div class="content">
	        <div class="physicalInt">
	            <div class="cont-text">
	                <h2 style="color:#fff"><?php the_title() ?></h2>
	                <p style="color:#fff"><?php the_content() ?></p>
	            </div>
	        </div>
	    </div>
	</section>

<?php
 
      endwhile;
   else:
?>
      Vaya, no hay entradas.
<?php
   endif;
?>


</div>
<?php get_footer(); ?>
