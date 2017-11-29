<?php
  // For use with Sagextras (https://github.com/storm2k/sagextras)
?>
<a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><div class="container testata"><div class="logoHolder"><?php get_template_part('templates/svg/inline','qdu_logo_banner.svg'); ?></div><div class="logo_30_holder"><?php get_template_part('templates/svg/inline','qdu_30_anni_banner.svg'); ?></div></div></a>     
<header class="banner" role="banner">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
      <!--<button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        &#9776;
      </button>-->
      <a class="shiftnav-toggle shiftnav-toggle-button" data-shiftnav-target="shiftnav-main"><i class="fa fa-bars"></i>MENU</a>
          
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <?php get_search_form(true); ?>
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'pull-md-right nav navbar-nav ']);
          endif;
          ?>
      </div>
      </div>
    </nav>

</header>

<div class="morph-shape"  data-morph-1="M0,0L0,400 550,400 550,0Q273.19,210.13 0,0" data-morph-2="M0,381.95L0,400 550,400 550,381.95 0,381.95" data-morph-3="M550.45,108L550.45,0 0.45,0 0.45,175Q84.98,208.36 274.65,224.45 440.34,238.67 550.45,1">
             <svg width="100%" height="100%"  transform="scale(1,-1)" viewBox="0 0 550 400" preserveAspectRatio="none">
                <path  id="pathMorph" fill="none" d="M0,0L0,400 550,400 550,0 0,0"/>
              </svg> 
</div>

