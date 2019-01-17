<?php

function portafolio() {

    $labels = array(
        'name'                  => _x( 'Portafolios', 'Post Type General Name', 'usaveganmag' ),
        'singular_name'         => _x( 'Portafolio', 'Post Type Singular Name', 'usaveganmag' ),
        'menu_name'             => __( 'Portafolio', 'usaveganmag' ),
        'name_admin_bar'        => __( 'Portafolio', 'usaveganmag' ),
        'archives'              => __( 'Archivo de Portafolio', 'usaveganmag' ),
        'attributes'            => __( 'Atributos de Portafolio', 'usaveganmag' ),
        'parent_item_colon'     => __( 'Portafolio Padre:', 'usaveganmag' ),
        'all_items'             => __( 'Todos los Items', 'usaveganmag' ),
        'add_new_item'          => __( 'Agregar Nuevo Item', 'usaveganmag' ),
        'add_new'               => __( 'Agregar Nuevo', 'usaveganmag' ),
        'new_item'              => __( 'Nuevo Item', 'usaveganmag' ),
        'edit_item'             => __( 'Editar Item', 'usaveganmag' ),
        'update_item'           => __( 'Actualizar Item', 'usaveganmag' ),
        'view_item'             => __( 'Ver Item', 'usaveganmag' ),
        'view_items'            => __( 'Ver Portafolio', 'usaveganmag' ),
        'search_items'          => __( 'Buscar en Portafolio', 'usaveganmag' ),
        'not_found'             => __( 'No hay Resultados', 'usaveganmag' ),
        'not_found_in_trash'    => __( 'No hay Resultados en la Papelera', 'usaveganmag' ),
        'featured_image'        => __( 'Imagen Destacada', 'usaveganmag' ),
        'set_featured_image'    => __( 'Colocar Imagen Destacada', 'usaveganmag' ),
        'remove_featured_image' => __( 'Remover Imagen Destacada', 'usaveganmag' ),
        'use_featured_image'    => __( 'Usar como Imagen Destacada', 'usaveganmag' ),
        'insert_into_item'      => __( 'Insertar dentro de Item', 'usaveganmag' ),
        'uploaded_to_this_item' => __( 'Cargado a este item', 'usaveganmag' ),
        'items_list'            => __( 'Listado del Portafolio', 'usaveganmag' ),
        'items_list_navigation' => __( 'Navegación de Listado del Portafolio', 'usaveganmag' ),
        'filter_items_list'     => __( 'Filtro de Listado del Portafolio', 'usaveganmag' ),
    );
    $args = array(
        'label'                 => __( 'Portafolio', 'usaveganmag' ),
        'description'           => __( 'Portafolio de Desarrollos', 'usaveganmag' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'trackbacks', 'custom-fields', ),
        'taxonomies'            => array( 'custom_portafolio' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'portafolio', $args );

}
add_action( 'init', 'portafolio', 0 );
