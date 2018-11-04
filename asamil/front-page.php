<?php get_header();

// Get 4 ASAMIL news
$noticias = get_news( 4, 'noticias' );

if(have_posts()):
    while(have_posts()): the_post();
?>
<main class="content main-content main-content-desktop main-content-tablet main-content-mobile">
    <div id="main-banner" class="banner banner-desktop banner-tablet banner-mobile">
        <?php
        if (have_rows('banner_principal')):
            while (have_rows('banner_principal')): the_row();
                ?>
                <div style="background-image: url('<?php the_sub_field('imagem'); ?>');">
                    <div class="wrapper banner-wrapper">
                        <div class="banner-content">
                            <span class="slick-child banner-supertitle"><?php the_sub_field('super_titulo'); ?></span>
                            <span class="slick-child banner-title"><?php the_sub_field('titulo'); ?></span>
                            <a href="<?php the_sub_field('url'); ?>" class="slick-child btn btn-large btn-secondary"><?php the_sub_field('url_label'); ?></a>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>

    <div class="wrapper">
        <section class="section">
            <h2 class="section-title">
                <i class="fas fa-newspaper"></i>
                Últimas notícias
            </h2>

            <a href="<?php bloginfo('url'); ?>/category/noticias" class="btn btn-secondary">Ver todas</a>

            <div class="cards-list cards-list-size-4 cards-list-desktop cards-list-tablet cards-list-mobile">
                <?php foreach($noticias as $noticia): ?>
                    <div class="card">
                        <a href="<?php echo $noticia['link']; ?>">
                            <div class="card-cover" style="background-image: url('<?php echo $noticia['capa']; ?>');"></div>
                            <span class="card-title"><?php echo $noticia['title']; ?></span>
                            <span class="card-date"><i class="far fa-calendar-alt"></i><?php echo $noticia['date']; ?></span>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
        </section>
    </div>
    
    <div class="section bg-primary texto-destacado">
        <h2 class="font-semantic">Mensagem da ASAMIL</h2>
        
        <div class="wrapper">
            <?php 
            if ($texto = get_field('texto_destacado'))
                echo wpautop($texto);
            ?>
        </div>
    </div>

    <section class="section bg-secondary">
        <div class="wrapper">
            <h2 class="section-title">
                <i class="fas fa-briefcase"></i>
                Projetos em destaque
            </h2>

            <a href="<?php bloginfo('url'); ?>/category/projetos" class="btn btn-secondary">Ver todos</a>

            <div class="card-highlight card-highlight-desktop card-highlight-tablet card-highlight-mobile">
                <?php

                # Seleciona o primeiro projeto em destaque
                $primeiroProjeto = get_field('primeiro_projeto');

                if (!empty($primeiroProjeto)): ?>
                    <div class="card">
                        <div class="card-half">
                            <div class="card-cover" style="background-image: url('<?php echo $primeiroProjeto['capa']; ?>');"></div>
                        </div>

                        <div class="card-half">
                            <div class="card-content">
                                <span class="card-title"><?php echo $primeiroProjeto['titulo']; ?></span>
                                <p><?php echo $primeiroProjeto['resumo']; ?></p>
                                <a href="<?php $primeiroProjeto['link']; ?>" class="card-readmore btn btn-secondary">Leia mais</a>
                            </div>
                        </div>
                    </div>
                <?php 
                endif; 
                
                # Seleciona o segundo projeto em destaque
                $segundoProjeto = get_field('segundo_projeto');

                if (!empty($segundoProjeto)): ?>
                    <div class="card card-reverse">
                        <div class="card-half">
                            <div class="card-cover" style="background-image: url('<?php echo $segundoProjeto['capa']; ?>');"></div>
                        </div>

                        <div class="card-half">
                            <div class="card-content">
                                <span class="card-title"><?php echo $segundoProjeto['titulo']; ?></span>
                                <p><?php echo $segundoProjeto['resumo']; ?></p>
                                <a href="<?php $segundoProjeto['link']; ?>" class="card-readmore btn btn-secondary">Leia mais</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="section bg-dark">
        <div class="wrapper">
            <h2 class="section-title">
                <i class="far fa-images"></i>
                Vídeos
            </h2>
            
            <div class="cards-list cards-list-size-3 cards-list-desktop cards-list-tablet cards-list-mobile">
                <?php 
                $video = get_field('primeiro_video_destacado');

                if (!is_null($video) && !empty($video)):
                    $id_video = get_id_youtube_video($video);
                    ?>
                        <div class="card">
                            <a href="//youtube.com/embed/<?php echo $id_video; ?>" class="card-cover colorbox-link cboxElement" style="background-image: url('<?php thumb_youtube_video($id_video); ?>'); ">
                                <span class="player"></span>
                            </a>
                        </div>
                    <?php
                endif;
                ?>

                <?php 
                $video = get_field('segundo_video_destacado');

                if (!is_null($video) && !empty($video)):
                    $id_video = get_id_youtube_video($video);
                    ?>
                        <div class="card">
                            <a href="//youtube.com/embed/<?php echo $id_video; ?>" class="card-cover colorbox-link cboxElement" style="background-image: url('<?php thumb_youtube_video($id_video); ?>'); ">
                                <span class="player"></span>
                            </a>
                        </div>
                    <?php
                endif;
                ?>

                <?php 
                $video = get_field('terceiro_video_destacado');

                if (!is_null($video) && !empty($video)):
                    $id_video = get_id_youtube_video($video);
                    ?>
                        <div class="card">
                            <a href="//youtube.com/embed/<?php echo $id_video; ?>" class="card-cover colorbox-link cboxElement" style="background-image: url('<?php thumb_youtube_video($id_video); ?>'); ">
                                <span class="player"></span>
                            </a>
                        </div>
                    <?php
                endif;
                ?>

                <div class="gallery-button-wrapper">
                    <a href="https://www.youtube.com/channel/UCcRcAtuXtQpEV6pG3rJzY5A/featured" class="btn btn-secondary" target="_blank">Visite nosso canal no youtube</a>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section parceiros parceiros-desktop parceiros-tablet parceiros-mobile">
        <h2 class="font-semantic">Parceiros</h2>

        <div class="wrapper">
        <?php
        $parceiros = get_field('parceiros', 'option');
        if (is_array($parceiros) && (count($parceiros) > 0)):
            foreach($parceiros as $parceiro):
            ?>
                <a href="<?php echo $parceiro['link']; ?>" title="<?php echo $parceiro['nome']; ?>" target="_blank">
                    <img src="<?php echo $parceiro['imagem'] ?>" alt="<?php echo $parceiro['nome']; ?>"/>
                </a>
            <?php
            endforeach;
        endif;
        ?>
        </div>
    </section>
</main>
<?php 
    endwhile;
endif;

get_footer();