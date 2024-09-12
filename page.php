

<div class="main-banner">
    <!-- Header --><?php include (TEMPLATEPATH . '/header.php'); ?> <!-- End Header -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page.css"/>
    <div class="main-banner-wrap container-width-1100">
        <div class="text-content">
           <h1><?php the_title(); ?></h1>
        </div>    
    </div>
</div>
    
<div class='page-container' id='page-container'>
    <div class='page-container-wrap container-width-1100'>
        <!-- WordPress Loop -->
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <?php else : ?>
        <h6 class="center">Not Found</h6>
        <p class="center">Sorry, but you are looking for something that isn't here.</p>
        <?php include (TEMPLATEPATH . "/searchform.php"); ?>
        <?php endif; ?>
        <!-- End WordPress Loop -->
    </div><!-- End page Container -->
</div>
<!-- Footer --><?php include (TEMPLATEPATH . '/footer.php'); ?> <!-- Footer -->