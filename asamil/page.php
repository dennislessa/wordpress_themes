<?php get_header();

if (have_posts()):
    while(have_posts()): the_post();
    ?>
    <article class="content main-content main-content-desktop main-content-tablet main-content-mobile">
        <header class="article-header">
            <div class="image background" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
            <div class="wrapper">
                <h2 class="article-title"><?php the_title(); ?></h2>
            </div>
        </header>
        
        <div class="article-content">
            <div class="wrapper no-flex">
                <?php the_content(); ?>
            </div>
        </div>
    </article>
    <?php
    endwhile;
endif;

get_footer();