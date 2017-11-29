<?php
  // For use with Sagextras (https://github.com/storm2k/sagextras)
?>


<header class="banner" role="banner">
  <div class="wrapper-vertical-menu">
    <div class="wrapper-vertical-menu-inner">
      <a class="shiftnav-toggle shiftnav-toggle-button stretto" data-shiftnav-target="shiftnav-main">
       <!--  <span class="vertical-text">MENU</span> -->
        <span class="holderSVG_header">
          <svg viewBox="0 0 48 64" width="48" height="64" xmlns="http://www.w3.org/2000/svg">
            <g transform="matrix(0, 1, -1, 0, 55, 0)">
              <path class="dxPath" fill="none" stroke="#fff" stroke-width="3" stroke-linejoin="bevel" d="m 5.0916789,20.818994 53.8166421,0"/>
              <path class="centerPath" fill="none" stroke="#fff" stroke-width="3" stroke-linejoin="bevel" d="m 5.1969746,31.909063 53.8166424,0"/>
              <path class="sxPath" fill="none" stroke="#fff" stroke-width="3" stroke-linejoin="bevel" d="m 5.0916788,42.95698 53.8166422,0"/>
            </g>
          </svg>
        </span>
       <!-- <span class="vertical-text">MAIN</span> -->
      </a>     
    </div>
  </div> 
</header>
<div class="wrapper-vertical-header">
  <div class="wrapper-vertical-header-inner">
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><div class="logoHolderVertical"><?php get_template_part('templates/svg/inline','qdu_logo_banner.svg'); ?></div></a>     
      <nav>
    <?php
          if (has_nav_menu('vertical_navigation')) :
            wp_nav_menu(['theme_location' => 'vertical_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'pull-md-right nav navbar-nav ']);
          endif;
          ?>
</nav>
  </div>
</div>




<!--
 <nav class="navbar-vertical-layout">
   
          
      <div class="inner-nav-addon-vertical" id="navbarCollapse">
          <?php
          if (has_nav_menu('vertical_navigation')) :
            wp_nav_menu(['theme_location' => 'vertical_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'pull-md-right nav navbar-nav ']);
          endif;
          ?>
          <div class="navbar-footer-inner" >
             <span class="navbar-footer-holder">info@quasar.university</span>
             <span class="navbar-footer-holder">+39 0685301487</span>
          </div>
      </div>
    </nav>

-->

