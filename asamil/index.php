<?php get_header(); ?>
<main class="content main-content main-content-desktop main-content-tablet main-content-mobile">
    <div class="wrapper">
        <section class="section">
            <div class="cards-list cards-list-size-4 cards-list-desktop cards-list-tablet cards-list-mobile">
                <?php 
                if(have_posts()):
                    while(have_posts()): the_post();
                        ?>
                        <div class="card">
                            <a href="<?php the_permalink(); ?>">
                                <div class="card-cover" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                                <span class="card-title"><?php the_title(); ?></span>
                                <span class="card-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date('d/m/Y'); ?></span>
                            </a>
                        </div>
                        <?php 
                    endwhile;
                endif;
                ?>
            </div>
        </section>
    </div>
</main>
<?php get_footer();