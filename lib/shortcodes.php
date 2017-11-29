<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;




function getVideoPillola(){
  ob_start();
  ?>
  <div class="embed-container">
      <?php the_field('video_pillola'); ?>
  </div>
  <?php
   $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('get-video-pillola', __NAMESPACE__ . '\\getVideoPillola');


function getContenuto(){
  ob_start();
   $pageURL = 'http'; 
  ?>
   <p><?php
   global $wp;
   $current_url = home_url(add_query_arg(array(),$wp->request));
    if (strpos($current_url, "fl-builder-template") !== false){
      //echo $current_url = home_url(add_query_arg(array(),$wp->request));
    }else{
      the_content();
    }
   ?></p>
  <?php
   $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('get-contenuto', __NAMESPACE__ . '\\getContenuto');


function getDocentiCorsi(){
  ob_start();
  $corso_docenti = get_field('docenti_corso');

  if( $corso_docenti ): 
  ?>
    <ul class="formatted_ul">
    <?php foreach( $corso_docenti as $p ): // variable must NOT be called $post (IMPORTANT) ?>
        <li>
          <a target="_blank" href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?> </a>
        </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <?php
   $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('get-docenti-corso', __NAMESPACE__ . '\\getDocentiCorsi');


function getDocentiProgetti(){
  ob_start();
  $corsi = get_field('progetto_docenti');

  if( $corsi ): 
  ?>
    <ul class="formatted_ul">
    <?php foreach( $corsi as $p ): // variable must NOT be called $post (IMPORTANT) ?>
        <li>
          <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <?php
   $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('get-docenti-progetto', __NAMESPACE__ . '\\getDocentiProgetti');


function getCorsiProgetti(){
  ob_start();
  $corsi = get_field('progetto_corso');

  if( $corsi ): 
  ?>
    <ul class="formatted_ul">
    <?php foreach( $corsi as $p ): // variable must NOT be called $post (IMPORTANT) ?>
        <li>
          <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <?php
   $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('get-corsi-progetto', __NAMESPACE__ . '\\getCorsiProgetti');



function getPhotoVideo(){
  ob_start();
  $images = get_field('gallery-q');
  $daie = "";
  if( $images ): ?>
      <div id="slider" class="flexslider">
          <ul class="slides">
             <?php if( get_field('video_slide') ): ?>
                  <li>
                    <div class="embed-container">
                      <?php the_field('video_slide'); ?>
                    </div>
                  </li>
             <?php endif; ?>
             
              <?php foreach( $images as $image ): ?>
                  <li>
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                      <p><?php echo $image['caption']; ?></p>
                  </li>
              <?php endforeach; ?>
          </ul>
      </div>
      <!--
      <div class="custom-navigation">
          <a href="#" class="flex-prev">Precendente</a>
          <div class="custom-controls-container"></div>
          <a href="#" class="flex-next">Successiva</a>
      </div>
     -->
  <?php endif; 
  if( ! $images ): ?>
     <div id="slider" class="flexslider">
              <ul class="slides">
                 <?php if( get_field('video_slide') ): ?>
                      <li>
                        <div class="embed-container">
                          <?php the_field('video_slide'); ?>
                        </div>
                      </li>
                 <?php endif; ?>
                 
                     <li>
                         <?php 
                          if( get_field('progetto_immagine') ){
                         
                              $image = get_field('progetto_immagine');
                              $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                if( $image ) {
                                   echo wp_get_attachment_image( $image, $size );
                                }
                          }else{
                               the_post_thumbnail( 'full' ); 
                          }
                        ?>
                      </li>
                  
              </ul>
        </div>
  <?php endif;

  $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('get-photo-video', __NAMESPACE__ . '\\getPhotoVideo');

// Use shortcodes in form like Landing Page Template.
function getAccordionBandi(){
  $daie = "";

  $file = get_field('bandi_allegato');

  if( $file ){
    
    $daie='<a href="'.$file['url'].'" target="_blank">filename</a>';

  }

  return $daie;
 
}
add_shortcode('get-accordion-bandi', __NAMESPACE__ . '\\getAccordionBandi');



function getLinkUtiliNews($atts, $content = null){
  ob_start();
  if( have_rows('link_utile') ):
  // loop through the rows of data
    echo '<div class="uabb-module-content uabb-info-list infoLinkNews">';
    echo '<ul class="uabb-info-list-wrapper uabb-info-list-left">';
    while ( have_rows('link_utile') ) : the_row();
        // display a sub field value
        ?>
        <li class="uabb-info-list-item info-list-item-dynamic0">
            <div class="uabb-info-list-content-wrapper fl-clearfix uabb-info-list-left">
              <div class="uabb-info-list-icon info-list-icon-dynamic0">
                <div class="uabb-module-content uabb-imgicon-wrap">
                  <span class="uabb-icon-wrap">
                    <span class="uabb-icon">
                      <i class="fa fa-link"></i>
                    </span>
                  </span>
                </div>
              </div>
              <div class="uabb-info-list-content uabb-info-list-left info-list-content-dynamic0">
                <h5 class="uabb-info-list-title"><a href="<?php the_sub_field('link-url'); ?>" target="_blank"><?php the_sub_field('link'); ?></a></h5>
              </div>
            </div>
         </li>
        <?php
        
    endwhile;
    echo '</ul>';
    echo '</div>';
  else :
     echo  '<h5 class="alert_no_link">Nessun link aggiunto per adesso</h5>';
      // no rows found
  endif;
  $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('get-link-utili-news', __NAMESPACE__ . '\\getLinkUtiliNews');


function getCustomTaxonomyTerm($atts, $content = null){
  ob_start();
  $terms = get_the_terms( $post->ID, 'area-news' );  
  if ( $terms && ! is_wp_error( $terms ) ) {
   $areaNotizia = array();
   foreach ( $terms as $term ) {
      $areaNotizia[] = $term->name;
   }
   $areaNotizia = join( ", ", $areaNotizia );
   ?>   
   <p class="customTaxonomy"><span class="customTaxonomy-inner"><?php echo $areaNotizia; ?></span></p>
    <?php 
   }   
  $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('get-termtax', __NAMESPACE__ . '\\getCustomTaxonomyTerm');


function getCorsiDocente($atts, $content = null){
  ob_start();
  $corsiDocente = get_posts(array(
              'post_type' => 'courses',
              'suppress_filters' => 0,
              'meta_query' => array(
                array(
                  'key' => 'docenti_corso', // name of custom field
                  'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                  'compare' => 'LIKE'
                )
              )
  ));
  ?>
  <div class="label_corsi_singolo_docente">
    <h5>CORSI</h5>
    <hr>
  </div>
  <ul class="lista_corsi_docente_singolo">  
  <?php
  foreach( $corsiDocente as $corsoDocente ) {
    ?>
    <li><a href="<?php echo get_permalink($corsoDocente->ID);?>"><?php echo $corsoDocente->post_title;?></a></li> 
    <?php
  }
  ?>
  </ul>
  <?php
  $myvariable = ob_get_clean();
  return $myvariable; 
}

add_shortcode('corsi-docente', __NAMESPACE__ . '\\getCorsiDocente');




function box_html_render($atts, $content = null) {
   extract(shortcode_atts(array(
      “type” => “info”
   ), $atts));
   return '<div class="alert alert-'.$type.'">'.$content.' '.get_the_ID().'</div>';
}
add_shortcode('box', __NAMESPACE__ . '\\box_html_render');



function getAccordionSingoloCorso($atts, $content = null){
  ob_start();
 
  ?>
    <div id="docentiCorso" class="docentiSmall">
                      
                      <div class="columns twelve wpb_column column_container"> 
                        <div class="wpb_wrapper">     
                        <a href="<?php echo get_post_permalink($docente['ID']); ?>" itemprop="url" style="font-size:16px;"><?php echo $docente['post_title']; ?></a>
                        </div>
                      </div>
                           
                    
                    <div class="clear"></div>
                    </div>
  <?php
  $myvariable = ob_get_clean();
  return $myvariable; 
}
add_shortcode('corso-accordion', __NAMESPACE__ . '\\getAccordionSingoloCorso');

function getTipoCorso($atts, $content = null){
   ob_start();
  $terms = get_the_terms(get_the_ID(), 'aree-corsi'); 
   foreach( $terms as $term ) {
            echo "<h3>".$term->name." ROMA</h3>"; 
          } 
   $myvariable = ob_get_clean();
  return $myvariable;        
}
add_shortcode('tipologia-corso', __NAMESPACE__ . '\\getTipoCorso');


 
