<header class="banner navbar navbar-default navbar-absolute-top" role="banner">
  <div class="container hidden-sm hidden-md hidden-lg">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <div class="logo hidden-sm hidden-md hidden-lg"><img src="<?=get_stylesheet_directory_uri()?>/assets/img/icon.png" class="img-responsive"/></div>
      <a href="javascript:;" class="menu-label hidden-xs hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target=".navbar-collapse">menu</a>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"></a>
    </div>
  </div>
  <div class="nav-container">
  	<div class="logo hidden-xs"></div>
    <nav class="collapse navbar-collapse main-menu" role="navigation">
		<?php
            //Main menu
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav', 'depth' => 0));
            endif;

        ?>
    </nav>
  </div>
</header>
