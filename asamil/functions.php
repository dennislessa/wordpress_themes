<?php

# Enfileira scripts e estilos
if (!function_exists('asamil_scripts')) {
    function asamil_scripts() {
        wp_enqueue_style('icons', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css');
        wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,500,700');
        wp_enqueue_style('style', get_stylesheet_uri());
        wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.min.css?' . time());
		wp_enqueue_style('relatorio', get_template_directory_uri() . '/assets/css/relatorio.css?' . time());
		wp_enqueue_script('mainjs', get_template_directory_uri() . '/assets/js/main.js?' . time(), array('jquery'), '2.6', true);
        wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js?' . time(), array('jquery'), '2.6', true);
		
        // Front page
        if (is_front_page()) {
            wp_enqueue_style('frontpage', get_template_directory_uri() . '/assets/css/frontpage.css?' . time());
        }
        
        // Contact page
        if (is_page_template('templates/contact.php')) {
            wp_enqueue_style('contato', get_template_directory_uri() . '/assets/css/contact.css?' . time());
        }
		
		// Gallery page
		if (is_singular('galeria')) {
            wp_enqueue_style('galeria', get_template_directory_uri() . '/assets/css/gallery.css?' . time());
            wp_enqueue_script('galeria', get_template_directory_uri() . '/assets/js/gallery.js?' . time(), array('jquery'), '2.6', true);
        }
		
		// Search page
		if (is_search()) {
			wp_enqueue_style('search', get_template_directory_uri() . '/assets/css/search.css?' . time());
		}
		
		// 404 page
		if (is_404()) {
			wp_enqueue_style('404', get_template_directory_uri() . '/assets/css/404.css?' . time());
            wp_enqueue_script('size-main-content', get_template_directory_uri() . '/assets/js/size-main-content.js?' . time(), array('jquery'), '2.6', true);
		}
    }
}
add_action('wp_enqueue_scripts', 'asamil_scripts');
add_theme_support('menus');
add_theme_support( 'post-thumbnails' );

if (!function_exists('get_thumb_youtube_video')) {
    function thumb_youtube_video( $id ) {
        echo "https://img.youtube.com/vi/{$id}/hqdefault.jpg";
    }
}

include __DIR__.'/includes/Publicacao.php';
include __DIR__.'/includes/Galeria.php';
include __DIR__.'/includes/Minify.php';

if (!function_exists('get_id_youtube_video')) {
    function get_id_youtube_video($url) {
        $url = urldecode(rawurldecode($url));
        $pattern = 
            '%^# Match any youtube URL
            (?:https?://)?  # Optional scheme. Either http or https
            (?:www\.)?      # Optional www subdomain
            (?:             # Group host alternatives
            youtu\.be/    # Either youtu.be,
            | youtube\.com  # or youtube.com
            (?:           # Group path alternatives
                /embed/     # Either /embed/
            | /v/         # or /v/
            | /watch\?v=  # or /watch\?v=
            )             # End path alternatives.
            )               # End host alternatives.
            ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
            $%x'
            ;
        $result = preg_match($pattern, $url, $matches);

        return $result ? $matches[1] : false;
    }
}


if (!function_exists('get_news')) {
    function get_news($amount = -1, $category = null, $post_type = 'post') {
        $posts = array();
		
		$args = array( 
            'post_type' => $post_type,
            'posts_per_page' => $amount
        );
		
		if (!is_null($category))
			$args['category_name'] = $category;
        
        $loop = new WP_Query($args);
        
        if ($loop->have_posts()):
            while ($loop->have_posts()): $loop->the_post();
                $posts[] = array(
                    'capa' => get_the_post_thumbnail_url(),
                    'title' => get_the_title(),
                    'link' => get_permalink(),
                    'date' => get_the_date('d/m/Y')
                );
            endwhile;
        endif;
        
        wp_reset_postdata();
        
        return $posts;
    }
}

function create_post_type_gallery() {
	register_post_type( 'galeria',
	    array(
            'labels' => array(
                'name' => __( 'Asamil Galeria' ),
                'singular_name' => __( 'Asamil Galeria' )
            ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => 'galeria'),
            'supports' => array( 'title', 'thumbnail' )
	    )
	);
}
add_action( 'init', 'create_post_type_gallery' );

function create_post_type_publications() {
	register_post_type( 'publicacoes',
	    array(
            'labels' => array(
                'name' => __( 'Asamil Publicações' ),
                'singular_name' => __( 'Asamil publicação' )
            ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => 'publicacoes'),
            'supports' => array( 'title', 'thumbnail' )
	    )
	);
}
add_action( 'init', 'create_post_type_publications' );

function categories_publications() {
	register_taxonomy(
		'publicacoes-categorias',
		'publicacoes',
		array(
			'label' => __( 'Tipos de publicação' ),
 			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'publicacao' )
		)
	);
}
add_action( 'init', 'categories_publications' );

// Create options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações ASAMIL',
		'menu_title'	=> 'Configurações ASAMIL',
		'menu_slug' 	=> 'options'
	));
}

// Get data site
if( !function_exists('data_site') ) {
	function get_data_site( $dado ) {
		$informacoes = array(
			'telefone' => get_field('telefone', 'option'),
			'email' => get_field('email', 'option'),
			'endereco' => get_field('endereco', 'option'),
			'maps' => get_field('url_google_maps', 'option'),
			'facebook' => get_field('facebook', 'option'),
			'youtube' => get_field('youtube', 'option'),
			'twitter' => get_field('twitter', 'option'),
			'instagram' => get_field('instagram', 'option')
		);
		
		return array_key_exists($dado, $informacoes) ? $informacoes[$dado] : null;
	}
	
	function data_site( $dado ) {
		echo get_data_site($dado);
	}	
}

function create_post_type_relatorios() {
	register_post_type( 'relatorios',
	    array(
            'labels' => array(
                'name' => __( 'Asamil Relatórios' ),
                'singular_name' => __( 'Asamil Relatório' )
            ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => 'relatórios'),
            'supports' => array( 'title' )
	    )
	);
}
add_action( 'init', 'create_post_type_relatorios' );

function categories_relatories() {
	register_taxonomy(
		'relatorios-categorias',
		'relatorios',
		array(
			'label' => __( 'Tipos de relatórios' ),
 			'hierarchical' => true,
			'rewrite' => array( 'slug' => 'relatorio' )
		)
	);
}
add_action( 'init', 'categories_relatories' );

if ( !function_exists( 'get_youtube_videos_channel') ) {
	function get_youtube_videos_channel( $channel_id, $split = null ) {
		$youtube = file_get_contents('https://www.youtube.com/feeds/videos.xml?channel_id=' . $channel_id);
		$xml 	 = simplexml_load_string($youtube, "SimpleXMLElement", LIBXML_NOCDATA);
		$json 	 = json_encode($xml);
		$youtube = json_decode($json, true);
        
		if ( is_array( $youtube ) && (count( $youtube ) > 1) ) {
			if ( !is_null( $split ) && is_numeric( $split ) )
				$youtube = array_chunk( $youtube['entry'], $split, true )[0];
			else
				$youtube = $youtube['entry'];

			return $youtube;
		}

		return null;
	}
}