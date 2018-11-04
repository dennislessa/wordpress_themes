<?php  /* Template Name: Página de contato */
get_header();

if(have_posts()):
    while(have_posts()): the_post();
?>
<main class="content main-content main-content-desktop main-content-tablet main-content-mobile contato">
    <div class="wrapper">
        <div class="card-highlight card-highlight-desktop card-highlight-tablet card-highlight-mobile">
            <div class="card">
                <div class="card-half">
                    <div class="card-cover" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
                </div>

                <div class="card-half">
                    <div class="card-content">
                        <span class="card-title"><?php the_title();  ?></span>
                        <div>
                            <?php echo wpautop(get_the_content()); ?>
                        </div>
                        <?php echo do_shortcode('[ninja_form id=1]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
    endwhile;
endif;

get_footer();