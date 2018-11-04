<?php

class Galeria extends Publicacao
{
    
    private function __init()
    {
        $loop = new WP_Query(array(
            'post_type' => $this->postType, 
            'posts_per_page' => -1
        ));
        
        while ($loop->have_posts()):
		    $loop->the_post();
        
            $this->posts[] = array(
                'titulo'    => get_the_title(),
                'capa'      => get_the_post_thumbnail_url(),
                'link'      => get_the_permalink(),
                'fotos'     => get_field('numero_de_fotos'),
                'data'      => get_the_date('d/m/Y'),
            );
        endwhile;
    }
    
}