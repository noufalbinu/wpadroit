


<?php get_header(); ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/base.css"/>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/archive-jobs.css"/>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jobarchive-responsive.css"/>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page.css"/>



<!-- MAIN -->
<div class="container-100">
  <div class="job-archive-banner-container">
    <h1 class="page-title">FInd Job Openings</h1>
    <div class="search-input-button-group">
      <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        
        
        
            
        
        <input type="hidden" name="post_type" value="business" />
      
        

      <input type="text" name="keyword" id="keyword" onkeyup="fetchSearch()"></input>
      <?php $location_args = array('taxonomy' => 'job-location', 'value_field' => 'slug', 'name' => 'location', 'show_option_none' => __( 'Select County' ),'option_none_value' => '0', 'order' => 'ASC', 'hide_empty' => 0); ?> 
            <?php wp_dropdown_categories($location_args); ?>
      <button class="archive-job-serach-button">Search Jobs</button>
      </form>
    </div> 
  </div> 

  <div class="container-width-1100">
    <div id='main' class="portfolio-archive-container">
    <!--Gallary filter Links-->
    <div class="gallery-filter">
      <span class="filter-item active" data-filter="all">All</span>
      <?php 
        $args = array('taxonomy' => 'category','orderby' => 'name', 'order'   => 'ASC');
        $category = get_categories($args);
        foreach($category as $cat) {
          echo '<span class="filter-item" data-filter="' . $cat->term_id . '" >' . $cat->name . '</span>';
        } 
       ?> 
		</div>   
    <!--Gallary Images-->
      <div class="masonry">
      <div id="datafetch">Search results will appear here</div>
        <?php 

          // args
          $args = array(
            'post_type'    => 'jobs',
            'posts_per_page' => '5',
          );

          // query
          $the_query = new WP_Query( $args );

          if($the_query->have_posts()) : while($the_query->have_posts()) : $the_query->the_post();
            
            //wp theme CPT loop loaded by category taxonamy filter
            $categoriess = get_the_terms( get_the_ID(), 'category' );
            // get_the_terms returns false, a wp error, or an array of term objects.
            if ( $categoriess && ! is_wp_error( $categoriess ) ) { 
                foreach ( $categoriess as $categoryy ) {
                    // get_term_link requires taxonomy slug as the second parameter.
                    ?>
                    <div class="gallery-item <?php echo $categoryy->term_id;  ?>">
                      <div class="job-snippet">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                        <div class="job-snippet-wrap">                          
                          <b><?php the_title(); ?></b>
                          <div class="job-snippet-content">
                            <p class='author-name'><b><?php the_author(); ?></b></p><?php echo get_the_date(); ?>
                          </div>
                        </div>
                      </div>
                      <a href="<?php the_permalink() ?>" rel="bookmark">VIew more Details</a>
                    </div>
                  <?php 
                }
            }
     
         endwhile; ?>
         </div>
        <div class="wpp-pagination">
         <!-- Start the pagination functions after the loop. -->
         <div class="nav-previous alignleft"><?php next_posts_link( '<b>Next </b><img src="'.get_template_directory_uri() .'/assets/images/next.png">' ); ?></div>
         <div class="nav-next alignright"><?php previous_posts_link( '<img src="'.get_template_directory_uri() .'/assets/images/back.png"><b> Previous</b>' ); ?></div>
         <!-- End the pagination functions after the loop. -->  
         </div>      
         
         <?php else : ?>

          <?php _e( 'Sorry, no posts matched your criteria.' ); ?>
        
        <?php endif; ?>
                    
</div></div>


<script src="<?php echo get_template_directory_uri(); ?>/assets/ei.js"></script>
<script>      
  const filterContainer = document.querySelector(".gallery-filter"),
  galleryItems = document.querySelectorAll(".gallery-item");
  filterContainer.addEventListener("click", (event) =>{
    if(event.target.classList.contains("filter-item")){
    	 // deactivate existing active 'filter-item'
    	 filterContainer.querySelector(".active").classList.remove("active");
    	 // activate new 'filter-item'
    	 event.target.classList.add("active");
    	 const filterValue = event.target.getAttribute("data-filter");
    	  galleryItems.forEach((item) =>{
        if(item.classList.contains(filterValue) || filterValue === 'all'){
        	item.classList.remove("hide");
        	 item.classList.add("show");
        }
        else{
        	item.classList.remove("show");
        	item.classList.add("hide");
        }
    	 });
    }
  });

function fetchSearch() {
  var keyword = jQuery('#keyword').val();
  var Location = jQuery('#Location').val();
  if ( keyword ) {
      jQuery.ajax({
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
          type: 'post',
          data: {
            action: 'data_fetch',
            keyword: keyword
          },
          success: function(data) {
              jQuery('#datafetch').html( data );
          }
      });
  } else {
      jQuery('#datafetch').html( '' );
  }
}
</script>
<?php get_footer();?>