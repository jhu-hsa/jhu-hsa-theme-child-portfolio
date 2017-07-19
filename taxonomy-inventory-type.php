<?php get_header(); ?>

<?php get_template_part('part', 'breadcrumbs'); ?>
<div class="wrap">

  <?php get_sidebar('nav'); ?>
    <section class="main">
   <div class="feed">
  <div class="wrap">
  <?php
  $taxonomy = get_queried_object();
  echo  '<h1>'.$taxonomy->name.' Inventory</h1>'; 
?>
  <?php
$args = array(
	'type'                     => 'inventory',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 0,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'inventory-type',
	'pad_counts'               => false );
$categories = get_categories($args);

echo '<div class="post-group"><strong>View:  </strong> ';

foreach ($categories as $category) {
    $url = get_term_link($category);?>
    <span class="post-tags"><a href="<?php echo $url;?>"><?php echo $category->name; ?></a></span>
<?php
}

echo '</div>';
?>

	 <ul>
	 <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	  $query = new WP_Query(array( 
	  'post_type' => 'inventory',
	  'inventory-type' => $taxonomy->name,
	'posts_per_page' => 9,
	'paged' => $paged,
	'orderby'=> $orderby, 
	'order' => $order )); 
     $wp_query = new WP_Query();
$wp_query->query('post_type=inventory&inventory-type='.$taxonomy->name.'&paged=' . $paged . '&posts_per_page=9&orderby=title&order=ASC');?>
      <?php if ( $query->have_posts() ) : $i=0;?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <li>
            <div class="feed__item feed__item--info">
              <?php if (has_post_thumbnail()) : ?>
                <div class="feed__image" style="background-image: url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-preview')[0]; ?>);"></div>
              <?php endif; ?>
              <div class="feed__item__content">
                <h4><?php the_title(); ?></h4>
               <p class="feed__more"><a href="<?php the_permalink(); ?>" style="text-decoration:none;">Read More...</a></p>
              
              </div>
            </div>
          </li>
        <?php $i++;
		endwhile; ?>
      <?php endif; ?>
	   
      <?php wp_reset_postdata(); ?>
     
    </ul><ul class="pagination">
             <li class="previous_posts"><?php echo get_previous_posts_link( 'Previous Page' ); ?></li>
             <li class="next_posts"><?php echo get_next_posts_link( 'Next Page' ); ?></li>
            
        </ul>
		
    </div>
 
          
  
   </div>
  </section>
   
  <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>