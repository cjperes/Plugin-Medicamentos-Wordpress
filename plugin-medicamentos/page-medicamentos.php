<?php header("Content-type: text/html; charset=utf-8"); /* Template Name: MEDICAMENTO_PLUGIN */ 

/* ESTE PLUGIN UTILIZA/AGREGA CÓDIGOS DAS SEGUINTES PÁGINAS:

Plugin>medicamentos.php
Theme>Bridge>Templates>blog_single-loop.php
Theme>Bridge>Templates>blog_mansory-loop.php
*/

function getTermos($termo = 'patologias',$base = ''){



    if(empty($base))



    $base = $termo;



    $terms = get_terms($termo);



    $count = count($terms); $i=0;



    if ($count > 0) {



    $ul = '<ul>';



    foreach ($terms as $term) {



    $li ='<li>';



    $li .= '<a href="'.site_url().'/'.$base.'/' . $term->slug . '" title="' . sprintf(__('Ver todos os medicamentos que servem para tratar %s', 'my_localization_domain'), $term->name) . '">' . $term->name . '</a>';



    $li .='</li>';



    $ul .=  $li;



    }



    $ul .= '</ul>';



    }



    return $ul;



    }

?>

<?php get_header(); ?>
<style>
/*table td, table th {
  display: block !important;
  height: auto !important;
  width: auto !important;
  text-align: left;
}*/
.navMed {
  display: block !important;

    height: auto;

    overflow: hidden;

    clear: both;

    margin: 0 auto 20px auto;

	width:100%

}

.navMed ul li {

    float: left;

    overflow: hidden;

    border-left: 1px solid rgb(255, 255, 255);

    background: rgb(255, 71, 0);

    padding: 6px;

}

.navMed ul li a {

    font-size: 13px;

    color: white;

    font-weight: bold;

    display: block;

    padding: 0 6px;

    text-decoration: none;

}

.listaMedicamentos ul li {
  display: block !important;
  height: auto !important;
  width: auto !important;
  margin: 5px !important;
  float: left;

}

.listaMedicamentos.listagem ul li a {

    font-size: 12px;

}

.listaMedicamentos ul li a {

    color: #1E385D;

    font-size: 14px;

    text-decoration: none;

    background: #ebebeb;

    display: block;

    padding: 5px 10px;

    width: 169px;

    height: 40px;

   line-height: 40px;

}
/*
ul {
  list-style: none; 
}

ul li::before {
  content: "\2022";  
  color: #f63b0c; 
  font-weight: bold; 
  display: inline-block; 
  width: 1em; 
  margin-left: -1em; 
}
*/


</style>



<?php

$bridge_qode_id = bridge_qode_get_page_id();

$bridge_qode_sidebar = get_post_meta($bridge_qode_id, "qode_show-sidebar", true); 



if ( get_query_var('paged') ) { $bridge_qode_paged = get_query_var('paged'); }

elseif ( get_query_var('page') ) { $bridge_qode_paged = get_query_var('page'); }

else { $bridge_qode_paged = 1; }



$bridge_qode_blog_hide_comments = "";

if (isset($bridge_qode_options['blog_hide_comments']))

	$bridge_qode_blog_hide_comments = $bridge_qode_options['blog_hide_comments'];



?>

	

	<?php get_template_part( 'title' ); ?>

	<?php

		$bridge_qode_revslider = get_post_meta($bridge_qode_id, "qode_revolution-slider", true);

		if (!empty($bridge_qode_revslider)){ ?>

			<div class="q_slider"><div class="q_slider_inner">

			<?php echo do_shortcode($bridge_qode_revslider); ?>

			</div></div>

		<?php

		}

		?>	

	<div class="container">

        <?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>

            <div class="overlapping_content"><div class="overlapping_content_inner">

        <?php } ?>

		<div class="container_inner default_template_holder clearfix">
<h1>Prestamos serviços de assessoria <br/>completa para importação</h1>
			<p>Abaixo temos uma lista exemplificativa dos medicamentos cuja importação pode ser assessorada pela Primedicin,<br/> em hipótese alguma se configura como anúncio ou comercialização. Não somos fabricantes.</p>
<br/>
				<?php 

					//get_template_part('templates/blog', 'structure');

				?>

			<div class="navMed">



	<h5 style="font-weight:bold">Medicamentos por nome:</h5>



	<ul>



		<li class="brd"><a href="<?php print site_url()?>/medicamentos/?letra=A" title="A">A</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=B" title="B">B</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=C" title="C">C</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=D" title="D">D</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=E" title="E">E</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=F" title="F">F</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=G" title="G">G</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=H" title="H">H</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=I" title="I">I</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=J" title="J">J</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=K" title="K">K</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=L" title="L">L</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=M" title="M">M</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=N" title="N">N</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=O" title="O">O</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=P" title="P">P</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=Q" title="Q">Q</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=R" title="R">R</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=S" title="S">S</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=T" title="T">T</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=U" title="U">U</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=V" title="V">V</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=W" title="W">W</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=X" title="X">X</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=Y" title="Y">Y</a></li>



		<li><a href="<?php print site_url()?>/medicamentos/?letra=Z" title="Z">Z</a></li>



	</ul>



</div>



<?php



function mam_posts_where ($where) {



   global $mam_global_where;



   if ($mam_global_where) $where .= " $mam_global_where";



   return $where;



}



$letter = '';



$letter = $_GET['letra'];



if(!empty($letter)):

$querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_type = 'medicamento' and  $wpdb->posts.post_status = 'publish' and $wpdb->posts.post_title like '".$letter."%' ORDER BY $wpdb->posts.post_title ASC";
$posts = $wpdb->get_results($querystr, OBJECT);


 

 
 endif; ?>

<script>

$(document).ready(function(){

$("[title=<?php print strtoupper($letter);?>]").parents('li').addClass('ativo');

});

</script>

<?php if(empty($letter)): ?>



  <div class="listaMedicamentos listagem">



    <div class="baseTit">



      <h5>Medicamentos por patologias:</h5>



    </div>



    <div style="clear:both"></div>



    <?php print getTermos('patologias'). "<br/>";   ?>



    <div style="clear:both"></div>



  </div>
  <br/>
  <br/>

  <div class="listaMedicamentos listagem">

    <div class="baseTit">



      <h5>Medicamentos por princípio ativo:</h5>



    </div>


    <div style="clear:both"></div>



    <?php print getTermos('principioativo','principio-ativo');   ?>


    <div style="clear:both"></div>



    <div class="baseTit">



      <h5>Medicamentos por Especialidades:</h5>



    </div>



    <div style="clear:both"></div>



    <?php print getTermos('especialidades');   ?>



    <div style="clear:both"></div>
    <br/>

</div>
<div class="call_to_action normal" style="background-color: #f63b0c;padding-top: 42px;padding-bottom: 37px;"><div class="container_inner"><div class="two_columns_75_25 clearfix"><div class="text_wrapper column1"><div class="call_to_action_text " style="">
<h2><span style="color: #ffffff;">Não encontrou o medicamento?</span></h2>
<p><span style="color: #ffffff;">Alguns medicamentos disponíveis não estão cadastrados em nosso site,<br/> consulte o seu agora mesmo pelo <a style="color: #ffffff;" href="http://extranet.nork.com.br/primedicin/contato/"><strong>formulário</strong></a> ou&nbsp;entre em contato pelo&nbsp;<strong><a style="color: #ffffff;" href="https://api.whatsapp.com/send?phone=5511947485506&amp;text=">WhatsApp</a></strong></span></p></div></div><div class="column2"><a itemprop="url" href="http://extranet.nork.com.br/primedicin/contato" class="qbutton white " target="_self" style="color: #ffffff;border-color: #002940;background-color: #002940;" data-hover-background-color="#ffffff" data-hover-border-color="#ffffff" data-hover-color="#002940">Entrar em contato</a></div></div></div></div>



  <?php else: ?>


<?php if (!empty($posts)): ?>
<div class="content content_top_margin_none" style="min-height: 267px;">
<div class="blog_holder masonry" style="position: relative !important; height: 676.594px !important; opacity: 1 !important;">    
<div class="blog_holder_grid_sizer"></div>
<div class="blog_holder_grid_gutter"></div>
<?

//usort($posts,'$wpdb->posts.post_title');
uasort($posts,'post_title') ;
//wp_list_sort( $posts, 'post_title', 'ASC', true );



foreach($posts as $post){
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post_image">
					<a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail($bridge_qode_thumb_size); ?>
					</a>
				</div>
			<?php } ?>
			<div class="post_text">
				<div class="post_text_inner">
					<h5 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					<?php bridge_qode_excerpt(); ?>
 
<td>
<ul>
<? echo '<strong style="color: #f63b0c;">Patologias:</strong>'; ?>
<? foreach(get_the_terms( $post->ID, 'patologias' ) as $term){ 
echo '<li><a href="'.get_term_link($term->slug, 'patologias').'">'.$term->name.'</a></li>';
} ?>
</ul>
</td>
<td>
<ul>
<? echo '<strong style="color: #f63b0c;">Princípio ativo:</strong>'; ?>
<? foreach(get_the_terms( $post->ID, 'principioativo' ) as $term){ 
echo '<li><a href="'.get_term_link($term->slug, 'principioativo').'">'.$term->name.'</a></li>';
} ?>
</ul>
</td>
<td>
<ul>
<? echo '<strong style="color: #f63b0c;">Especialidades:</strong>'; ?>
<? foreach(get_the_terms( $post->ID, 'especialidades' ) as $term){ 
echo '<li><a href="'.get_term_link($term->slug, 'especialidades').'">'.$term->name.'</a></li>';
} ?>
</ul>
</td>
					<div class="post_info">
         
    


         
						<?php if($bridge_qode_blog_hide_comments != "yes"){ ?>
							 / <a itemprop="url" class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . esc_html__('Comments','bridge'), '1 '.esc_html__('Comment','bridge'), '% '.esc_html__('Comments','bridge') ); ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</article>

<?
  //$cont = $cont + 1;
  //if ($cont == 3) {
    //echo "<br clear=\"all\" /><br clear=\"all\" />";
   //$cont = 0;
  }
//}
?>
    </div>    
    </div>

  <?php else: ?>



    <div class="call_to_action normal" style="background-color: #f63b0c;padding-top: 42px;padding-bottom: 37px;"><div class="container_inner"><div class="two_columns_75_25 clearfix"><div class="text_wrapper column1"><div class="call_to_action_text " style="">
<h2><span style="color: #ffffff;">Não encontrou o medicamento?</span></h2>
<p><span style="color: #ffffff;">Alguns medicamentos disponíveis não estão cadastrados em nosso site, consulte o seu agora mesmo pelo <a style="color: #ffffff;" href="http://extranet.nork.com.br/primedicin/contato/"><strong>formulário</strong></a> ou&nbsp;entre em contato pelo&nbsp;<strong><a style="color: #ffffff;" href="https://api.whatsapp.com/send?phone=5511947485506&amp;text=">WhatsApp</a></strong></span></p></div></div><div class="button_wrapper column2"><a itemprop="url" href="http://extranet.nork.com.br/primedicin/contato" class="qbutton white " target="_self" style="color: #ffffff;border-color: #002940;background-color: #002940;" data-hover-background-color="#ffffff" data-hover-border-color="#ffffff" data-hover-color="#002940">Entrar em contato</a></div></div></div></div>



<?php endif;?>



</div> <!--fim listagemItens-->



<?php endif; ?>







    <div class="pagination">



      <?php if ( $the_query->max_num_pages > 1 ) : ?>



   <nav class="oldernewer">



      <div class="older">



         <?php next_posts_link('Older entries') ?>



      </div><!--.older-->



      <div class="newer">



         <?php previous_posts_link('Newer entries') ?>



      </div><!--.newer-->



   </nav><!--.oldernewer-->



   <?php endif; ?>



    </div><!--.pagination-->	

			

		</div>

        <?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>

            </div></div>

        <?php } ?>

	</div>

<?php get_footer(); ?>





