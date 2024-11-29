<?php get_header(); 
  echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri(). '/css/single-job.css">'."\n";
  echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri(). '/css/form.css">'."\n";
  ?>
  <!-- MAIN -->
<div class="careers-bnr">
  <div class="job-archive-banner-container">
    <div class="careers-bnr-contents">
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </div>
</div> 
<div class="job-post-content-sidebar-coatainer">
  <div class="job-post-content-sidebar-coatainer-wrap">
    <div class="job-post-content">
      <div class="job-post-content-wrap">
      <div class="tags-bio">
        <div class="tags-bio-wrap">
          <p class="sidebar-date"><i class="fa-solid fa-calendar-days"></i><?php the_time('F jS') ?>, <?php the_time('Y') ?></p>
          <?php
              $jobcategoryID = [];
              $jobcategorys = get_the_terms( $post->ID, 'job-category'); 
          ?>
          <div class="job-cat-wrap">
              <i class="fa-solid fa-tags"></i>
                <?php 
                    $i = 1;
                    if(is_array($jobcategorys)) {
                        foreach ($jobcategorys as $jobcategory) {
                           $jobcategoryID = $jobcategory->name;
                           echo '<p>'.$jobcategoryID.'</p>';
                           //  Add comma (except after the last theme)
                           echo ($i < count($jobcategorys))? ", " : "";
                           // Increment counter
                           $i++;
                        }
                    }
                ?>
          </div>
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
        </div>
      </div>
          <div class="blog-post">
            <!-- WordPress Loop -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                 <!-- article -->
                 <article>
                     <div class="entry <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
                         
                         
                         <div class="entrybody">
                             <?php the_content(__('Read more'));?>
                         </div>
                     </div>
                     <?php endwhile; else: ?>
                     <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
                 </article>
            <!-- /article -->
            <?php endif; ?>
            <div class="job-form-container">
              <div class="recent-jobs-sidebar">
                 <h2>Recent Jobs</h2>
                 <ul>
                    <?php
                        $recent_posts = wp_get_recent_posts(array('post_type'=>'jobs'));
                        foreach( $recent_posts as $recent ){
                            echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
                        }
                    ?>
                 </ul>
              </div>
          </div>
        </div>
      </div>
      <!-- End WordPress Loop -->      
      <?php trackback_rdf(); ?>
      <?php comments_template(); ?>
    </div>
    <div class="job-sidebar">
      <?php echo do_shortcode('[application-form]'); ?>
      
      
    </div>
  </div>
</div>
    

  
</div>



<!-- Footer -->
<?php include (TEMPLATEPATH . '/footer.php'); ?>
<!-- Footer -->






