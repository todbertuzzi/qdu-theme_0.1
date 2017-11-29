<?php
  // For use with Sagextras (https://github.com/storm2k/sagextras)
?>
<a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><div class="container testata"><?php get_template_part('templates/svg/inline','qdu_logo_banner.svg'); ?></div></a>      
<!--<div id="wrapperMask"></div>-->
<header class="banner" role="banner">
 <div class="container">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        &#9776;
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <a class="shiftnav-toggle shiftnav-toggle-button" data-shiftnav-target="shiftnav-main"><i class="fa fa-bars"></i>Menu</a>
          <?php get_search_form(true); ?>
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'pull-md-right nav navbar-nav']);
          endif;
          ?>
      </div>
    </nav>
  </div>
</header>

<!--
<div class="shape-wrap">
          <svg class="shape" width="100%" height="100vh" preserveAspectRatio="none" viewBox="0 0 1440 800" xmlns:pathdata="http://www.codrops.com/">
            <path id="shape"  d="M -44,-50 C -52.71,28.52 15.86,8.186 184,14.69 383.3,22.39 462.5,12.58 638,14 835.5,15.6 987,6.4 1194,13.86 1661,30.68 1652,-36.74 1582,-140.1 1512,-243.5 15.88,-589.5 -44,-50 Z" pathdata:id="M -44,-50 C -137.1,117.4 67.86,445.5 236,452 435.3,459.7 500.5,242.6 676,244 873.5,245.6 957,522.4 1154,594 1593,753.7 1793,226.3 1582,-126 1371,-478.3 219.8,-524.2 -44,-50 Z"></path>
          </svg>
</div>

<div class="morph-shape" data-morph-open="M260,500H0c0,0,8-120,8-250C8,110,0,0,0,0h260c0,0-8,110-8,250C252,380,260,500,260,500z">
              <svg width="100%" height="100%" viewBox="0 0 260 500" preserveAspectRatio="none">
                <path fill="none" d="M260,500H0c0,0,0-120,0-250C0,110,0,0,0,0h260c0,0,0,110,0,250C260,380,260,500,260,500z"/>
              </svg>
            </div>
            -->