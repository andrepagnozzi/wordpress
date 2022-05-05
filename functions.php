<?php

/************************
THEME SUPORT
 ************************/

function add_suport_theme(){
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','add_suport_theme');

/****************************
Registro Menu Personalizado
 *****************************/

add_theme_support('menus');
register_nav_menus( array(
    'primary' => __( 'Menu Header', 'menu-header' ),
) );

/*****************************
Scripts / CSS
 *****************************/

function wp_responsivo_scripts()
{
    //Carregando css header
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());


    //Carregando scripts header
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'));
}
//Carregando no Footer
add_action('wp_enqueue_scripts', 'wp_responsivo_scripts');

/*****************************
Registro Custom Post type Slider
 *****************************/

add_action('init','slider_register');
        function slider_register()
        {
            $labels = array(
                'name' => _x('Slider', 'post type general name'),
                'singular_name' => _x('Slider', 'post type singular name'),
                'add_new' => _x('Adicionar slider', 'slider'),
                'add_new_item' => __('Adicionar slider'),
                'edit_item' => __('Editar slider'),
                'new_item' => __('Novo slider'),
                'view_item' => __('Ver item'),
                'search_items' => __('Procurar slider'),
                'not_found' => __('Nada encontrado'),
                'not_found_in_trash' => __('Nada encontrado no lixo'),
                'parent_item_colon' => ''
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => true,
                'menu_icon' => 'dashicons-media-code',
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => 6,
                'supports' => array('title', 'thumbnail'),
            );
            register_post_type('slider', $args);
        }

/*****************************
Registro custom post type Serviços
 *****************************/

add_action('init' , 'servicos_register' );
function servicos_register(){

    $labels = array(

        'name' => _x('Serviços', 'post type general name'),
        'singular_name' => _x('Serviços', 'post type singular name'),
        'add_new' => _x('Adicionar serviço', 'serviço'),
        'add_new_item' => __('Adicionar serviço'),
        'edit_item' => __('Editar serviço'),
        'new_item' => __('Novo serviço'),
        'view_item' => __('Ver serviço'),
        'search_items' => __('Procurar serviço'),
        'not_found' => __('Nada encontrado'),
        'not_found_in_trash' => __('Nada encontrado no lixo'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'has archive' => true,
        'menu_icon' => 'dashicons-admin-tools',
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'servicos'),
        'menu_position' => 6,
        'supports' => array('title','editor', 'thumbnail'),
    );
    register_post_type('servicos', $args);

}


/*****************************
Registro de sidebar da footer
 *****************************/

if(function_exists('register_sidebar'))
{
    register_sidebar (array (
        'name' => 'Sidebar footer',
        'id' => 'sidebar-footer',
        'before_widget' => '<div class="col-md-4 col-lg-4">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',

    ));
}





