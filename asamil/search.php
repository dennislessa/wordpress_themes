<?php get_header(); ?>
<main class="content main-content main-content-desktop main-content-tablet main-content-mobile">
    <div class="article-header">
        <div class="wrapper">
            <h2 class="article-title">Search</h2>
        </div>
    </div>
    
    <div class="wrapper">
        <section class="section">
            <?php 
            if(have_posts()):
                while(have_posts()): the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="search-result">
                        <strong class="search-title"><?php the_title(); ?></strong>
                        <p class="search-link"><?php the_permalink(); ?></p>
                        <div class="search-excerpt"><?php the_excerpt(); ?></div>
                        <p class="search-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date('d/m/Y'); ?></p>
                    </a>
                    <?php 
                endwhile;
            endif;
            ?>
        </section>
    </div>
</main>
<?php get_footer();