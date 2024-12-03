


<?php get_header(); ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/archive-jobs.css"/>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page.css"/>




<!-- MAIN -->
<div class="careers-bnr">
  <div class="job-archive-banner-container">
    <div class="careers-bnr-contents">
      <h1 class="page-title">Explore Exciting Career Opportunities</h1>
    </div>
  </div>
</div> 
<div class="careers-form-snippet">
  <div class="careers-form-snippet-wrap container-width-1100">
    <div class="careers-form-snippet-one">
      <h3>Join Our Talent Network</h3>
      <p>Don't see a position that matches your skills? 
        Join our talent network to stay updated on </p>
    </div>
    <div class="careers-form-snippet-two">
      <a class="cta careers-form-snippet-cta" href="<?php echo home_url(); ?>/application-form">Join Now</a>
    </div>
    </div>
</div>
<div class="page-container">
  <div class="container-width-1100">
    <b class="ahcmt-subheading">Current openings</b>
    <div class="job-archive-wrap"> 
      <?php
    
      $the_query = new WP_Query( array(
        'posts_per_page'=>21,
        'tax_query' => array(
          //array(
          //    'taxonomy' => 'job-location',
          //    'field'    => 'slug',
          //    'terms'    =>  'qatar'
          //),
        ),
        'post_type'=>'jobs',
  
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1) 
      ); 
      ?>
      <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
  
        <div class="job-container">
          <div class="job-container-wrap">
            <a class="job-archive-post-title" href="<?php the_permalink(); ?>" class="file-title">
              <?php echo get_the_title(); ?>
            </a>
            <div class="job-taxonomy">
              <?php
              $jobtypeID = [];
              $jobtypes = get_the_terms( $post->ID, 'job-type');
              
              $joblocationID = [];
              $joblocations = get_the_terms( $post->ID, 'job-location'); ?>
  
              <span>
                <i class="fa-solid fa-suitcase"></i>
                <?php 
                    $i = 1;
                    if(is_array($jobtypes)) {
                        foreach ($jobtypes as $jobtype) {
                           $jobtypeID = $jobtype->name;
                   
                           echo '<p>'.$jobtypeID.'</p>';
                           //  Add comma (except after the last theme)
                           echo ($i < count($jobtypes))? ", " : "";
                           // Increment counter
                           $i++;
                        }
                    }
                ?>
              </span>
              <span>
                <i class="fa-solid fa-location-dot"></i>
                <?php 
                    $l = 1;
                    if(is_array($joblocations)) {
                        foreach ($joblocations as $joblocation) {
                           $joblocationID = $joblocation->name;
                   
                           echo '<p>'.$joblocationID.'</p>';
                
                           //  Add comma (except after the last theme)
                           echo ($l < count($joblocations))? ", " : "";
                           // Increment counter
                           $l++;
                        }
                    }
                ?>
              </span>
  
            </div>
         
            <b><a href="<?php the_permalink() ?>" rel="bookmark">More Details  →</a></b>
          </div>
        </div>
      
      <?php endwhile;?>
      
    </div> 
    <div class="job-archive-pagination">
        <?php 
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $the_query->max_num_pages
        ) );?>
    </div>
    <?php wp_reset_postdata(); ?>                              
  </div>
</div>


<script src="<?php echo get_template_directory_uri(); ?>/assets/ei.js"></script>
<script>      
document.getElementById('listofoptions').onchange = function(){
window.location='/tag' + '/' +this.value
}

function fetchSearch() {
  var keyword = jQuery('#keyword').val();
  var location = jQuery('#location').val();
  if ( keyword || location) {
      jQuery.ajax({
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
          type: 'post',
          data: {
            action: 'data_fetch',
            keyword: keyword
          },
          
          success: function(data) {
            console.log(data)
              jQuery('.job-archive-wrap').html( data );
          }
      });
  } else {
      jQuery('.job-archive-wrap').html( '' );
  }
}

$('#tax-filter').change(function() {
    var filter = $('#tax-filter');
    $.ajax({
        url:filter.attr('action'),
        data:filter.serialize(),
        type:filter.attr('method'),
        beforeSend:function(xhr){
            $('#spinner').toggle();
        },
        success:function(data){
            $('#spinner').toggle();
            $('#sortedPosts').html(data);
        }
    });
    //debugging
    //console.log(filter.attr('method'));
    return false;
});
</script>

<?php get_footer();?>