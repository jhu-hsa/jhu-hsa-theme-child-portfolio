<?php get_header(); ?>

<?php get_template_part( 'part', 'breadcrumbs' ); ?>

<div class="wrap">

  <?php get_sidebar('nav'); ?>

  <section class="main">
<?php  echo '<h1>Member Profiles</h1>';?>





 <?php 
                $sort= esc_attr($_GET['sort']); 
            
                if($sort == "date" ||$sort == "") { $order= "ASC"; $order_by="date"; } 
			
                if($sort == "datedsc" ) { $order= "DESC"; $order_by="date"; } 
                ?>
				<div class="elementsToFilter">
                <p><strong>View:</strong> <a  href="<?php bloginfo('url'); ?>/category/creative-tech/?sort=datedsc">Creative Tech</a> |
				<a  href="<?php bloginfo('url'); ?>/category/events/?sort=datedsc">Events</a> |
                <strong>Member Profiles</strong> | 			
				<a  href="<?php bloginfo('url'); ?>/category/projects/?sort=datedsc">All Projects</a></p>
					
				<?php /* ?> <strong>Sort By:</strong> <a class="sortasc" href="?sort=date" <?php if ($sort == "date"){ echo 'style="color:gray"'; } ?>>Sort By Date</a> | 
				  <a class="sortdsc" href="?sort=datedsc" <?php if ($sort == "datedsc"){ echo 'style="color:gray"'; } ?>>Sort By Date</a>
                <?php */ ?>
                
                </div>

     <?php 

// Finally, we'll set the query arguments and instantiate WP_Query
$query_args = array(
  'post_type'  =>  'post',
  
  'category__and'=>array( 6,72 ),
  /*'orderby'    =>  $order_by,
  'order'      =>  $order,*/
 'posts_per_page' => 33,
 'category__not_in' => array( 4 )
);
  
  
  
   $query = new WP_Query ( $query_args );?>
    <div class="feed"> 

    <ul>
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
    <?php endwhile; endif;
wp_reset_postdata(); ?>

	  </ul>
  
   </div>
  </section>

  <?php get_sidebar(); ?>

</div>

<?php get_template_part( 'part', 'related-links' ); ?>

<?php get_template_part( 'part', 'resource-finder' ); ?>

<?php get_footer(); ?>