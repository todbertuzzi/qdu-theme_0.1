<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php

  	// get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
   ?>
<?php endwhile; ?>

<?php do_action('contenuto-taxonomy') ?>
<?php the_posts_navigation(); ?>

 <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        //bcn_display();
    }?>
</div>