        <footer class="footer main-footer main-footer-desktop main-footer-tablet main-footer-mobile">
            <div class="image" style="background-image: url('<?php bloginfo('template_url') ?>/assets/img/footer-background.jpg');"></div>
            
            <div class="wrapper">
                <div class="card-highlight card-highlight-desktop card-highlight-tablet card-highlight-mobile">
                    <div class="card">
                        <div class="card-half contactus">
                            <a href="tel:<?php echo preg_replace('/[^0-9]/', '', get_data_site('telefone')); ?>" class="contact" target="_top" role="button">
                                <i class="fa fa-phone"></i>
                                <?php data_site('telefone'); ?>
                            </a>

                            <a href="mailto:<?php data_site('email'); ?>" class="contact" target="_top" role="button">
                                <i class="fa fa-envelope"></i>
                                <?php data_site('email'); ?>
                            </a>

                            <a href="<?php data_site('maps'); ?>" class="contact" target="_blank">
                                <i class="fa fa-map-marker-alt"></i>
                                <?php data_site('endereco'); ?>
                            </a>
                        </div>

                        <div class="card-half card-half-social-medias">
                            <p class="card-title aligncenter">ASAMIL nas redes sociais</p>
                            
                            <div class="social-medias">
                                <a href="<?php data_site('facebook'); ?>" class="social-media" target="_blank">
                                    <i class="fab fa-facebook"></i>Facebook ASAMIL
                                </a>

                                <a href="<?php data_site('youtube'); ?>" class="social-media" target="_blank">
                                    <i class="fab fa-youtube"></i>Youtube ASAMIL
                                </a>

                                <a href="<?php data_site('instagram'); ?>" class="social-media" target="_blank">
                                    <i class="fab fa-instagram"></i>Instagram ASAMIL
                                </a>

                                <a href="<?php data_site('twitter'); ?>" class="social-media" target="_blank">
                                    <i class="fab fa-twitter"></i>Twitter ASAMIL
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="disclaimer">
                <div class="wrapper">
                    <p>Asamil &copy; <?php echo date('Y'); ?> Todos os direitos reservados.</p>
                    <p>
                        <a href="<?php bloginfo('url'); ?>/mapa-do-site">Mapa do site</a> | <a href="<?php bloginfo('url'); ?>/politica-de-privacidade">Política de privacidade</a> | <a href="https://webmail-seguro.com.br/asamil.org/" target="_blank">Webmail</a> | <a href="<?php bloginfo('url'); ?>/wp-admin">Área restrita</a>
                    </p>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
<?php

ob_end_flush();