<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php // the_title(); ?></h1>
      <?php //get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
     <?php // wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
     <nav id="nav-single">
      <span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">←</span>', 'qdu-theme_0.1' ) ); ?></span>
      <span class="nav-next"><?php next_post_link( '%link', __( '<span class="meta-nav">→</span>', 'qdu-theme_0.1' ) ); ?></span>
    </nav><!-- #nav-single -->
    <!--
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  -->
    <?php  //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
