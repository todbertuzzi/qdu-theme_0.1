<?php
  // For use with Sagextras (https://github.com/storm2k/sagextras)
?>
<a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><div class="container testata"><div class="logoHolder"><?php get_template_part('templates/svg/inline','qdu_logo_banner.svg'); ?></div><div class="logo_30_holder"><?php get_template_part('templates/svg/inline','qdu_30_anni_banner.svg'); ?></div></div></a> 
<header class="banner" role="banner">
  <a class="shiftnav-toggle shiftnav-toggle-button" data-shiftnav-target="shiftnav-main"><i class="fa fa-bars"></i>MENU</a>
    <div class="container">
    <?php ubermenu( 'main' , array( 'menu' => 6 ) ); ?>
    </div>
</header>
