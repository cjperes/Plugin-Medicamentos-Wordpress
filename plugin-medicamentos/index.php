<?php

/**

 * Plugin Name: Página de busca Medicamentos

 * Plugin URI: http://www.primedicin.com.br

 * Description: Plugin que habilita a funcionalidade de busca de medicamentos por letra.

 * Version: 2.0

 * Author: Henrique da Penha e Caio Peres

 * Author URI: http://www.henriquedapenha.com.br
 * * Author URI: http://www.nork.digital

 */

 /*

 function pagina_medicamentos(){

 

 return include( plugin_dir_path( __FILE__ ) . 'plugin-medicamentos/page-medicamentos.php');

 }

 

 add_shorcode('carregar_medicamentos', "pagina_medicamentos");*/

 

 add_filter( 'page_template', 'wpa3396_page_template' );

function wpa3396_page_template( $page_template )

{

    if ( is_page( 'medicamentos' ) ) {

        $page_template = dirname( __FILE__ ) . '/page-medicamentos.php';

    }

    return $page_template;

}

 

 

 ?>