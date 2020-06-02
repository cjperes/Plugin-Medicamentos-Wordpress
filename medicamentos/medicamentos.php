<?php
/*Plugin Name: Medicamentos
Plugin URI: http://www.primedicin.com.br
Description: Módulo de Medicamentos
Author: primedicin
Version: 1.0
Author URI: primedicin.com.br
*/

class Medicamentos {
	var $meta_fields = array("valor","apresentacao");
	
	function Medicamentos(){
		// Registrar custom post types - http://codex.wordpress.org/Function_Reference/register_post_type
		register_post_type(
			'medicamento',
			array(
				'label' => __('Medicamentos'),
				'description' => 'Módulo de medicamentos',
				'singular_label' => __('Medicamento'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'_builtin' => false,
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => true,
				'rewrite' => array(
					"slug" => "medicamentos",
					"with_front" => true
				),
				'query_var' => "medicamento",
				'show_in_nav_menus' => false,
				'supports' => array(
					'title',
					'editor',
					'thumbnail','comments',
					'revisions'
				)
			)
		);
		
//		add_filter("manage_edit-medicamento_columns", array(&$this, "edit_columns"));
//		add_action("manage_posts_custom_column", array(&$this, "custom_columns"));

		// Registrar custom taxonomy - http://codex.wordpress.org/Function_Reference/register_taxonomy
		register_taxonomy(
			"patologias",
			array("medicamento"),
			array(
				"public" => true,
				"show_in_nav_menus" => true,
				"show_ui" => true,
				"show_tagcloud" => false,
				"hierarchical" => true,
				"query_var" => "patologias",
				"label" => "Patologias",
				"singular_label" => "Patologia",
				"rewrite" => array(
					"slug" => "patologias",
					"with_front" => true,
					"hierarchical" => true
				)
			)
		);
		register_taxonomy(
			"principioativo",
			array("medicamento"),
			array(
				"public" => true,
				"show_in_nav_menus" => true,
				"show_ui" => true,
				"show_tagcloud" => false,
				"hierarchical" => true,
				"query_var" => "principioativo",
				"label" => "Principios Ativos",
				"singular_label" => "Principio Ativo",
				"rewrite" => array(
					"slug" => "principio-ativo",
					"with_front" => true,
					"hierarchical" => true
				)
			)
		);
		register_taxonomy(
			"especialidades",
			array("medicamento"),
			array(
				"public" => true,
				"show_in_nav_menus" => true,
				"show_ui" => true,
				"show_tagcloud" => false,
				"hierarchical" => true,
				"query_var" => "especialidades",
				"label" => "Especialidades",
				"singular_label" => "Especialidade",
				"rewrite" => array(
					"slug" => "especialidades",
					"with_front" => true,
					"hierarchical" => true
				)
			)
		);

		// Inicializar a interface administrativa
		add_action("admin_init", array(&$this, "admin_init"));
		add_action("template_redirect", array(&$this, 'template_redirect'));
		
		// Gancho na inserção
		add_action("wp_insert_post", array(&$this, "wp_insert_post"), 10, 2);
		flush_rewrite_rules();
	}
	
	function edit_columns($columns){
		// Colunas que aparecem na listagem
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => __("Title"),
			"medicamento_clientes" => __("Clientes"),
			"date" => __("Date")
		);
		
		return $columns;
	}
	
	function custom_columns($column){
		// Customizar a saída das colunas
		global $post;
		switch ($column){
			case "medicamento_clientes":
				$tipos = get_the_terms(0, "cliente");
				$tipos_html = array();
				foreach ($tipos as $tipo)
					array_push($tipos_html, '<a href="' . get_term_link($tipo->slug, "cliente") . '">' . $tipo->name . '</a>');
				echo implode($tipos_html, ", ");
			break;
		}
	}
	
	// Seleção de template
	function template_redirect(){
		global $wp;
		if ($wp->query_vars["post_type"] == "medicamento" && is_singular()){
			if (file_exists(TEMPLATEPATH . "/single-medicamento.php")) {
				include(TEMPLATEPATH . "/single-medicamento.php");
				die();
			}
		}
	}
	
	// Quando um post é inserido ou atualizado
	function wp_insert_post($post_id, $post = null){
		if ($post->post_type == "medicamento"){
			// Loop nos dados do POST
			foreach ($this->meta_fields as $key){
				$value = @$_POST[$key];
				if (empty($value)){
					delete_post_meta($post_id, $key);
					continue;
				}

				// Se o valor é uma string, ele deve ser único
				if (!is_array($value)){
					// Atualizar meta
					if ($key == "dtInicio" || $key == "dtFim"){
						$arr = explode("/",$value);
						if (@$_POST["repeat"]) {
							$arr[2] = "xxxx";
						}else if($arr[2] == ""){
							$arr[2] = date("Y");
						}
						$value = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
					}
					if (!update_post_meta($post_id, $key, $value))
					{
						// Ou inserir meta
						add_post_meta($post_id, $key, $value);
					}
				}else{
					// Se o valor passado for um array, devemos remover todos os dados anteriores
					delete_post_meta($post_id, $key);
					
					// Loop no array adicionando os valores ao post meta como entradas diferentes com o mesmo nome
					foreach ($value as $entry)
						add_post_meta($post_id, $key, $entry);
				}
			}
		}
	}
	
	function admin_init(){
		// Adicionando box de datas - http://codex.wordpress.org/Function_Reference/add_meta_box
		add_meta_box("maisinfo", "Mais Informações", array(&$this, "maisinfo"), "medicamento", "normal", "high");
	}
	
	// Administrar conteúdo do post meta
	function maisinfo() {
		$custom = get_post_custom($post->ID);
		$valor = $custom["valor"][0];
		$apresentacao = $custom["apresentacao"][0];
		?>
		<label>Valor:</label><br /> <input type="text" name="valor" value="<?php echo $valor; ?>" style="width:100%;" /><br />
		<label>Apresentação:</label><br /> <input type="text" name="apresentacao" value="<?php echo $apresentacao; ?>" style="width:100%;" /><br />
		<?php
	}
}

class WP_Query_Medicamentos extends WP_Query {
	function WP_Query_Medicamentos($query = '') {
		if ( ! empty($query) ) {
			$query["post_type"] = "medicamento";
			add_filter('posts_where', array(&$this, 'filter_where'));
			$this->query($query);
			remove_filter('posts_where', array(&$this, 'filter_where'));
		}
	}
	//Create a new filtering function that will add our where clause to the query
	function filter_where($where = '') {
		if($this->query['letra']){
			$where .= " and post_title like '" . $this->query['letra'] . "%' ";
		}
		return $where;
	}
}

// Inicializar o plugin
add_action("init", "medicamentoInit");
function medicamentoInit() { global $e; $e = new Medicamentos(); }