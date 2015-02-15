<section class="full-width-container">
  <img id="mainImg1" class="bg" 
  	data-bttrlazyloading-animation="fadeIn"
  	data-bttrlazyloading-xs-src="<?=get_stylesheet_directory_uri()?>/assets/img/project-banner.jpg" 
  	data-bttrlazyloading-sm-src="<?=get_stylesheet_directory_uri()?>/assets/img/project-banner.jpg"
    data-bttrlazyloading-md-src="<?=get_stylesheet_directory_uri()?>/assets/img/project-banner.jpg"
    data-bttrlazyloading-lg-src="<?=get_stylesheet_directory_uri()?>/assets/img/project-banner.jpg" />
  <div class="pageHeadingAbsolute hidden-sm hidden-md hidden-lg">
	<h1>HALODOME</h1>
	<h3>Spectacular Space</h3>
  </div>
  <div class="overlayContent">
	  <div class="pageHeading hidden-xs">
		<h1>HALODOME</h1>
		<h3>Spectacular Space</h3>
	  </div>
	</div>
</section>
<?
	$args = array( 'numberposts' => -1, 'post_type' => 'page', 'post_status' => 'publish', 'order' => 'ASC', 'orderby' => 'menu_order', 'post_parent' => $post->ID);
	$results = get_posts( $args );
	$i=0;
	foreach( $results as $result ){
		$args1 = array(
	     'post_type' => 'attachment',
	     'numberposts' => -1,
	     'post_status' => null,
	     'post_parent' => $result->ID,
	     'order' => 'ASC',
	     'orderby' => 'menu_order'
	    );
		$attachments = get_posts( $args1 );
		$j=0;
		foreach ( $attachments as $attachment ) {
          $meta = wp_get_attachment_image_src( $attachment->ID, "full" );
?>
			<section class="full-width-container">
			<img class="bg project-img" 
		  	data-bttrlazyloading-animation="fadeIn"
		  	data-bttrlazyloading-xs-src="<?=$meta[0]?>" 
		  	data-bttrlazyloading-sm-src="<?=$meta[0]?>"
		    data-bttrlazyloading-md-src="<?=$meta[0]?>"
		    data-bttrlazyloading-lg-src="<?=$meta[0]?>" />
<?
		    if($j==0){
		    	if($i%2==0){
		    		$class="leftContent";
		    	}
		    	else{
		    		$class="rightContent";
		    	}
?>
				<div class="<?=$class?>">
				  <div class="image-caption">
					<p>The space is completely flexible an can be offered, as in the example shown as a 160m<sup>2</sup> of usable space on two levels with a half size mezzanine floor and central spiral staircase.</p>
				  </div>
				</div>
<?
		    }
?>
			</section>
<?
		    $j++;
        }
	$i++;
    }
?>