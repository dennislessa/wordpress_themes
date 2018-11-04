<?php

class Publicacao
{
    
    private $postType;
    private $categories;
    private $posts;
    
    function __construct($postType, $taxonomy = null)
    {
        $this->posts    = array();
        $this->postType = $postType;
        $this->taxonomy = $taxonomy;
        
        $this->__init();
    }
    
    private function __init()
    {
        $loop = new WP_Query(array(
            'post_type' => $this->postType, 
            'posts_per_page' => -1
        ));
        
        while ($loop->have_posts()):
		    $loop->the_post();
            
            $categories = array();
            $taxonomies = wp_get_post_terms($loop->post->ID, $this->taxonomy);
            
            foreach ($taxonomies as $taxonomy):
                $categories[] = $taxonomy->slug;
            endforeach;
        
            $this->posts[] = array(
                'titulo'    => get_the_title(),
                'capa'      => get_field('capa'),
                'paginas'   => get_field('numero_de_paginas'),
                'arquivo'   => get_field('arquivo'),
                'data'      => get_the_date('d/m/Y'),
                'categoria' => $categories
            );
        endwhile;
    }
    
    public function getPosts()
    {
        return $this->posts;
    }
}