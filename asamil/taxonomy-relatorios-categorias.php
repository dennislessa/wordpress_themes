<?php get_header(); ?>
<main class="content main-content main-content-desktop main-content-tablet main-content-mobile">
    <div class="article-header">
        <div class="image background" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/footer-background.jpg');"></div>
        <div class="wrapper">
            <h2 class="article-title">Relatórios e Prestação de contas</h2>
        </div>
    </div>
	
    <div class="wrapper">
        <section class="section">
            <div class="cards-list cards-list-size-4 cards-list-desktop cards-list-tablet cards-list-mobile">
				<ul>
					<?php 
					$i = 0;
					
					if (have_posts()):
						while (have_posts()):
							the_post(); ?>
							<li><span class="relatorio-ano <?php if($i === 0) echo 'open'; ?>"><?php the_title(); ?></span>

							<?php if(have_rows('relatorios')): ?>
								<ul class="relatorios">
									<?php while(have_rows('relatorios')): the_row(); ?>
										<li>
											<a class="relatorio-link" href="" target="_blank">
												<p class="relatorio-titulo"><?php echo the_sub_field('titulo'); ?></p>
												<p class="relatorio-descricao"><?php echo the_sub_field('descricao'); ?></p>
											</a>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php 
							endif;

							$i++;
						endwhile; 
					else: 
					
						get_template_part('template-parts/no-content');
					
					endif; ?>
						</li>
				</ul>
            </div>
        </section>
    </div>
</main>
<?php get_footer();