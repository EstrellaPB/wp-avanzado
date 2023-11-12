<?php
/*
Plugin Name: Gourmet Artist GaMetaboxes CMB2
Plugin URI:
Description: Agrega Custom GaMetaboxes CMB2 al sitio Gourmet Artist
Version: 1.0
Author: Juan Pablo De la torre Valdez
Author URI:
License: GLP2
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
if (file_Exists(dirname(__FILE__) . '/CMB2/init.php')) {
  require_once dirname(__FILE__) . '/CMB2/init.php';
}
add_action('cmb2_admin_init', 'campos_eventos');
function campos_eventos()
{
  $prefix = 'ga_campos_eventos_';
  $metabox_eventos = new_cmb2_box(array(
    'id' => $prefix . 'metabox',
    'title' => __('Campos Eventos', 'cmb2'),
    'object_types' => array('eventos'),
  ));

  $metabox_eventos->add_field(array(
    'name' => __('Ciudad', 'cmb2'),
    'desc' => __('Ciudad en la que sera el evento', 'cmb2'),
    'id' => $prefix . 'ciudad',
    'type' => 'text',
  ));
  $metabox_eventos->add_field(array(
    'name' => __('Lugares Disponibles', 'cmb2'),
    'desc' => __('Campos disponibles para el evento', 'cmb2'),
    'id' => $prefix . 'lugares',
    'type' => 'text',
  ));
  $metabox_eventos->add_field(array(
    'name' => __('Fecha de evento', 'cmb2'),
    'desc' => __('Fecha en la que sera el evento', 'cmb2'),
    'id' => $prefix . 'fecha',
    'type' => 'text_datetime_timestamp',
  ));
  $metabox_eventos->add_field(array(
    'name' => __('Temas del curso', 'cmb2'),
    'desc' => __('Temas que se veran en el curso evento', 'cmb2'),
    'id' => $prefix . 'temas',
    'type' => 'text',
    'repeatable' => true,
  ));
}

// add_action('cmb2_admin_init', 'metaboxes_recetas');
// function metaboxes_recetas() {

// }

function consulta_eventos_proximos($texto)
{
  $args = array(
    'post_type' => 'eventos',
    'posts_per_page' => -1,
    'meta_key' => 'ga_campos_eventos_fecha',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'ga_campos_eventos_fecha',
        'value' => time(),
        'compare' => '>=',
        'type' => 'NUMERIC',
      )
    )

  );
  echo '<h2 class="text-center">' . $texto['texto'] . '</h2>';
  $eventos = new WP_Query($args);

  echo '<ul id="eventos" class="no-bullet">';
  while ($eventos->have_posts()) : $eventos->the_post();
    echo '<li>';
    the_title('<h3 class="text-center">', '</h3>');
    echo '<p> <b> Lugares disponibles: </b>' . get_post_meta(get_the_ID(), 'ga_campos_eventos_lugares', true) . ' </p>';
    echo "<p><b>Ciudad: </b>" . get_post_meta(get_the_ID(), 'ga_campos_eventos_ciudad', true) . "</p>";
    $fecha_evento = get_post_meta(get_the_ID(), 'ga_campos_eventos_fecha', true);
    echo "<p><b>Fecha: </b>" . gmdate('d-m-Y', $fecha_evento) . "</p> <b>Hora: </b>" . gmdate("H:i", $fecha_evento);
  endwhile;
  echo '</ul>';
  wp_reset_postdata();
}
add_shortcode('proximos-eventos', 'consulta_eventos_proximos');
