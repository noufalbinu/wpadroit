<?php include (TEMPLATEPATH . '/header.php'); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/fp-responsive.css"/>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/front-page.css"/>

<div class="fp-container">
    <div class="main-banner-wrap">
        <div class="main-banner container-width-1100">
            <div class="text-content">
                <h1 class="custom-header-border-bottom">Secure, high-performance WordPress solutions<br>Engineered for your business</h1>
                <p>At WPadroit, we embody a dynamic and creative spirit, boasting a team of developers and designers who are genuinely passionate about curating extraordinary themes and plugins.
                </p>
                <div class="cta-container-banner">
                    <a class="cta cta-banner-fp" href="https://crunchthemes.com">Services</a>
                    <a class="cta cta-border-solid-fp" href="https://crunchthemes.com">Products</a>
                </div>
            </div>
            <div class="bnr-container"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bnr.png" alt=""></div>
        </div>
    </div>
    <div class="service-blocks">
        <div class="service-blocks-wrap  container-width-1100">
            <span class="s-block">
                <b>Find Our Services</b>
                <p>"We’ve assisted over 100+ Business with WordPress, offering solutions for everything from creating a new site to enhancing your existing one. WPAdroit supports your business every step of the way."
                </p>
            </span>
            <span class="s-block">
                <i class="fa-solid fa-file-code"></i><br>
                <b>Custom Wordpress Website</b>
                <p>Building Custom themes & plugins for your business needs</p>
            </span>
            <span class="s-block">
                <i class="fa-solid fa-chart-simple"></i><br>
                <b>SEO</b>
                <p>Building Custom themes & plugins for your business needs</p>
            </span>
            <span class="s-block">
                <i class="fa-solid fa-wand-magic-sparkles"></i><br>
                <b>Custom Wordpress Website</b>
                <p>Building Custom themes & plugins for your business needs</p>
            </span>
        </div>
    </div>
    <div class="trio">
        <div class="trio-wrap container-width-1100">
            <h2 class="custom-header-border-bottom">Expert Services & Solutions from WPadroit</h2>
            <p>Turn your dream WordPress projects into reality. Whether you're looking to create a stunning website, 
                optimize site performance, or simply need expert support for ongoing maintenance, we're here to help every step of the way."</p>
        </div>
    </div>
<!-- MAIN CONTAINER -->
    <div id='main-container'>
        <div class="resources-container">
            <div class="resources container-width-1100">
                <h2>Blog & Resources</h2>
                <div class="resourec-doc-wrap">
                    <div class='blog-resources'>
                       <div class='resources-wrap'>
                            <h3>Resources</h3>
                            <i class="fa-brands fa-leanpub"></i>
                            <p>You can explore our resources, plugins, and theme documentation by clicking the button below.</p>
                            <a class="cta cta-resources-fp" href="#">Get Adroit Booking Now</a>
                        </div>
                    </div>
                    <div class='sc'>
                         <?php $args = array( 'posts_per_page' => 3, 'order' => 'DESC' );
                         $rp = new WP_Query( $args );
                         if($rp->have_posts()) :
                         while($rp->have_posts()) : $rp->the_post(); ?>
                         <div class='web'>
                             <div class='scub'>
                                 <div class="excerpt-image"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( array(300, 200) );  } ?></div>
                                 <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></h3></a>
                             </div>
                         </div>
 
                        <?php endwhile; wp_reset_postdata(); endif;?>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div><!-- MAIN END-->

<?php include (TEMPLATEPATH . '/footer.php'); ?>