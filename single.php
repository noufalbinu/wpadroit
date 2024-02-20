<?php get_header(); ?>

<div class="blog-container">
    <div class="blog-header">
    	<h1>Wpadroit Blog</h1>
        <p>WordPress Tutorials, Tips, and Resources to Help Grow Your Business</p>
    </div>	
    <div class="blog-container-wrap container-width-1100">			
        <div class="blog-post-content">
            <div class="blog-post">
                <h1 class="post-title" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
                <!-- WordPress Loop -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                     <!-- article -->
                     <article>
                         <div class="entry <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
                             <p class="blogdate">Last updated on : <?php the_time('F jS') ?>, <?php the_time('Y') ?></p>
                             <div class='author-bio'>
                                 <?php echo get_avatar( get_the_author_meta( 'ID' ) , 72 ); ?>
                                 <p class='author-name'>Written by <b><?php the_author(); ?></b></p>
                                 <p class='author-description'><?php echo get_the_author_meta('description'); ?></p>
                             </div>
                             <div class="entrybody">
                                 <?php the_content(__('Read more'));?>
                             </div>
                         </div>
                         <?php endwhile; else: ?>
                         <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
                     </article>
                <!-- /article -->
                <?php endif; ?>
                <!-- End WordPress Loop -->
                <div class="blogcategory">
                     <div class='cat-title'><b>Categories:</b></div><p><?php the_category( '&rarr;' ); ?></p>
                </div>
                <div class="blogtags">
                     <div class='tag-title'>
                         <b>Tags: </b></div><p><?php the_tags( '', '', '<br />' ); ?></p>
                     </div>
                </div>
                <?php trackback_rdf(); ?>
                <?php edit_post_link(__('<strong>Edit</strong>'));?>
                <?php comments_template(); ?>
            </div>
            <div class="blog-post-sidebar-wrap">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end middle content area -->
<?php get_footer(); ?>