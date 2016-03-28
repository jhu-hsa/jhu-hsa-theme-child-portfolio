<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'part', 'breadcrumbs' ); ?>


<div class="wrap">

  <?php get_sidebar('nav'); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="main">
      <h1><?php the_title(); ?></h1>
     
          <?php the_content(); ?>
    
        
 <?php endwhile; endif; ?>
   
  
   <div class="feed">
  
    <ul>
          <?php 

// Finally, we'll set the query arguments and instantiate WP_Query
$query_args = array(
  'post_type'  =>  'post',
  
    'category__and'=>array( 6,73 ),

 'posts_per_page' => 12,
 'category__not_in' => array( 4 )
);
  
  
  
   $query = new WP_Query ( $query_args );?>
     
      <?php if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <li>
            <div class="feed__item feed__item--info">
              <?php if (has_post_thumbnail()) : ?>
               <a href="<?php the_permalink(); ?>" style="text-decoration:none;"> <div class="feed__image" style="background-image: url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-preview')[0]; ?>);"></div></a>
              <?php endif; ?>
              <div class="feed__item__content">
                <h4><a href="<?php the_permalink(); ?>" style="text-decoration:none;"><?php the_title(); ?></a></h4>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
     
    </ul><a class="button button--blue" style="display: block; margin: 0 auto 1rem auto; width:22%; text-align:center; min-width:180px;" href="<?php bloginfo('url'); ?>/category/projects/">See all projects</a>

 
            
  
   </div>
   

			  
			  
			  
              
         
     
    </section>
 

  <?php get_sidebar(); ?>

</div>







<?php get_template_part( 'part', 'resource-finder' ); ?>

<?php get_footer(); ?>