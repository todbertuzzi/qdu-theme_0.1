<?php get_template_part('templates/page', 'header'); ?>
<?php
wp_reset_postdata();
global $query_string;
$args = array(
			'post_type' => 'docenti',
			'meta_key' => 'cognome',
			'orderby' => 'meta_value', 
			'order' => 'ASC',
			'posts_per_page' => -1
		);
	
	
$query = new WP_Query( $args );

 ?>
		<div id="content" class="columns twelve  fullDocentList">
			<!--<h1 class="archive-title titleLeft">PROFILI</h1>-->
			
				<?php
				/*	$the_query = new WP_Query( 'page_id=25772' );
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						the_content();
					endwhile;*/
				?>
			
			
			<?php
			wp_reset_postdata();
			$filtersCoursesArgs =array(
					'post_type' => 'courses',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1,
					'suppress_filters' => false /**/
				);
			$filtersCourses = get_posts($filtersCoursesArgs);
			/*var_dump($filtersCourses);*/
			?>
			<div class="row holder_select">
			<div class="col-sm-12">
			<?php


			echo '<select id="filterCourses" class="cs-select cs-skin-underline" aria-hidden="true">';
			//echo '<option value="">FILTRA PER CORSO</option>'; // Vedi tutti i docenti
			echo '<option value="singleDocentList">FILTRA I DOCENTI PER CORSO</option>';
			foreach( $filtersCourses as $filtersCourse ) {
				
				$docCorso =  get_field('docenti_corso', $filtersCourse->ID);
				
				if (!empty($docCorso)) {
					$string = preg_replace('/\s+/', '', $filtersCourse->post_title);
					$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
					if ($filtersCourse->post_title=="InteriorDesign"){
						echo '<option value="'.$string.'">'.$filtersCourse->post_title.'</option>'."\n";					
					}else{
						echo '<option value="'.$string.'">'.$filtersCourse->post_title.'</option>'."\n";
					}
				}
			}
			
			echo '</select>';
			?>
			</div>
			</div>
	<div class="row holder_grid">	
				
				<?php $count = 1;	
	while ($query->have_posts()) : $query->the_post();
	if($count%2 == 0) {
		$class = "equal";
	} else {
		//$class = "odd";
		$class = "equal";
	}
	
	if(get_field('foto_docente') == '') {
	$imgUrl = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'single-post-thumbnail' );
	$imageUrl = $imgUrl[0];
	} else {
		$imageUrl = get_field('foto_docente');
		//$imageUrl = $imageUrl['sizes']['quadrato'];
	}


	?>
	
	<?php
	$corsiDocente = get_posts(array(
							'post_type' => 'courses',
							'suppress_filters' => 0,
							'posts_per_page' => 4,
							'meta_query' => array(
								array(
									'key' => 'docenti_corso', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));
	$courses = '';	
	foreach( $corsiDocente as $corsoDocente ) {
		$string = preg_replace('/\s+/', '', $corsoDocente->post_title);
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
		$courses .=	htmlentities($string).' '; 
	}
	
	
	?>
		
	<div class="col-xl-4 col-lg-6 <?=$class?> <?=$courses?> singleDocentList" <?php /* style="border:1px red solid;float:left;" */ ?>>
		<article class="row fakeClick" id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Person">
		<meta itemprop="image" content="<?php echo $imageUrl;?>" />
				
				<div class="col-sm-12 titolo_col"><h3 class="entry-title">
						<a itemprop="url" title="Visualizza il profilo completo di <?php the_title();?>" rel="bookmark" href="<?php the_permalink();?>">
							<?php the_title();?>
						</a>
					</h3></div>
				<div class="columns six" style="padding-right: 10px;">
					<a class="" title="<?php the_title();?>" href="<?php the_permalink();?>">
						<img alt="<?php the_title();?>" src="<?php echo $imageUrl;?>?w=285&h=285">	
					</a> 
				</div>
				<div class="columns six textDocFullList" style="padding-left: 10px;">
					
							
					<h4 class="headDoc">CORSI</h4>
					<ul class="listCoursesDoc">
						<?php foreach( $corsiDocente as $corsoDocente ) {?>
							<li><?php echo $corsoDocente->post_title;?></li> 
						<?php }?>
					</ul>
					<!--<h4 class="headDoc">MATERIE INSEGNATE</h4> -->
					<!--<ul class="listMaterieDoc">-->
					<?php 
					/*
						$tests = split(",", get_field('materia_docente', $p->ID)); 
						$num = 0;
						foreach( $tests as $test ) {
							if ($num < 4) {
								echo "<li>".$test."</li>";
								$num++;
							}
						}
					*/
						
						
					?>
					<!--</ul>-->
									
					
				</div>
				<!---->

		</article><!-- #post-<?php the_ID(); ?> -->	

	</div><!-- /.columns -->
				
	

	<?php  
		$count++;
		endwhile;
		wp_reset_query(); wp_reset_postdata();
		

	?>
	
				
				
				
				<br style='clear:both; float:none' />
			<?php wp_reset_query(); ?>
		</div><!-- /.row -->
		<div class="clear"></div>
		</div><!-- #content -->
