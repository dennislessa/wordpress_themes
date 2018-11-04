<?php get_header(); ?>
<main class="content main-content main-content-desktop main-content-tablet main-content-mobile">
    <div class="article-header">
        <div class="image background" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/footer-background.jpg');"></div>
        <div class="wrapper">
            <h2 class="article-title">Galeria de fotos</h2>
        </div>
    </div>
    
    <div class="wrapper">
        <section class="section">
            <div class="cards-list cards-list-size-4 cards-list-desktop cards-list-tablet cards-list-mobile">
                <?php 
					$loop = new WP_Query(array(
						'post_type' => 'galeria', 
						'posts_per_page' => -1
					));

				if($loop->have_posts()):
					while ($loop->have_posts()):
						$loop->the_post();
						?>
						<div class="card">
							<a href="<?php the_permalink(); ?>">
								<div class="card-cover" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
								<span class="card-title"><?php the_title(); ?></span>
								<span class="card-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date('d/m/Y'); ?></span>
								<span class="card-date"><i class="far fa-images"></i><?php the_field('numero_de_fotos'); ?> foto(s)</span>
							</a>
						</div>
						<?php
					endwhile;
				else: 

					get_template_part('template-parts/no-content');

				endif; ?>
            </div>
        </section>
    </div>
</main>
<?php get_footer();