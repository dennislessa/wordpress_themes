<?php get_header();

if (have_posts()):
    while(have_posts()): the_post();
        $fotos = get_field('galeria');
    ?>
    <article class="content main-content main-content-desktop main-content-tablet main-content-mobile">
        <div class="gallery-container gallery-featured">
            <?php foreach($fotos as $foto): ?>
                <div>
                    <div class="image" style="background-image: url('<?php echo $foto['url']; ?>');"></div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="gallery-container gallery-thumbnails">
            <?php foreach($fotos as $foto): ?>
                <div>
                    <div class="image" style="background-image: url('<?php echo $foto['url']; ?>');"></div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="gallery-loading open">
            <div class="spinner-wapper">
                <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
                <p>Carregando imagens</p>
            </div>
        </div>
    </article>
    <?php
    endwhile;
endif;

get_footer();