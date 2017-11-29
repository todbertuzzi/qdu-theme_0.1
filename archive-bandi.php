<?php get_template_part('templates/page', 'header'); ?>

<?php do_action('contenuto-bandi') ; ?>

<?php


if ( get_query_var('paged') ) $paged = get_query_var('paged');  
if ( get_query_var('page') ) $paged = get_query_var('page');
 
$query = new WP_Query( array( 'post_type' => 'bandi', 'paged' => $paged ) );
 
if ( $query->have_posts() ) : ?>
	<h6> Scarica tutti i file collegati al bando</h6>
	<div id="accordion" class="bandi-accordion" role="tablist">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
		
		<div class="card">
			<div class="card-header" role="tab" id="headingOne">
			  <h5 class="mb-0">
			    <a data-toggle="collapse" href="#<?php echo the_id(); ?>" aria-expanded="true" aria-controls="collapseOne">
			      <?php echo the_title(); ?>
			    </a>
			  </h5>
			</div>

			<div id="<?php echo the_id(); ?>" class="collapse hide" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
			  <div class="card-body">
			    <?php
			    the_content(); 
			    if( have_rows('singolo_bando') ){
			    	echo "<ul class='file-allegati'>";
				 	// loop through the rows of data
				    while ( have_rows('singolo_bando') ) : the_row();
				        // display a sub field value
				        $file = get_sub_field('file_allegati')
				       ?> <li><i class="fa fa-file" aria-hidden="true"></i><a href="<?php echo $file['url']; ?>"><?php  the_sub_field('nome_doc'); ?></a> </li><?php
				    endwhile;
				    echo "</ul>";
				}else{

				    // no rows found

				}
			    ?>
			  </div>
			</div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	</div>
	<!-- show pagination here -->
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>

<?php //the_posts_navigation(); ?>
