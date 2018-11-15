<?php  /* Template Name: Página de contato */
get_header();

if(have_posts()):
    while(have_posts()): the_post();
?>
<main class="content main-content main-content-desktop main-content-tablet main-content-mobile contato">
    <div class="contact-columns">
        <div class="contact-col-half">
            <div class="contact-cover" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
        </div>
        
        <div class="contact-col-half contact-form">
            <span class="contact-title"><?php the_title();  ?></span>
            <div>
                <?php echo wpautop(get_the_content()); ?>
            </div>
            <?php echo do_shortcode('[ninja_form id=1]'); ?>
        </div>
    </div>
</main>
<?php 
    endwhile;
endif;

get_footer();