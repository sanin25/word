<?php
/**
 * The Front Page template file.
 *
 * This is the front page template file, use to display static page
 * when set 'Front page displays' to a page in Reading Settings
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Brawny
 */
if ( 'posts' == get_option( 'show_on_front' ) ) {
	include get_home_template();
} else {
	get_header();
      	$output = '';
      	$output .= '<div class="flex-container">';
		$output .= '<div class="flexslider">';
		$output .= '<ul class="slides">';
		if ( brawny_slide_exists() ) {                    
			for( $slide_count = 1 ;  $slide_count < 6; $slide_count++ ) {   
				
				if ( get_theme_mod( 'image_upload-' . $slide_count ) ) {
					$output .= '<li>';	
					$slide_image = get_theme_mod( 'image_upload-' . $slide_count );
					$output .= '<div class="flex-image"><img src="' . esc_url( $slide_image ) . '" alt="" ></div>';
				}
				

				if ( get_theme_mod( 'flexcaption-' . $slide_count ) ) {
					$slide_description =  get_theme_mod( 'flexcaption-' . $slide_count );
					$output .= '<div class="flex-caption">' . $slide_description . '</div>';
				} 

				$output .= '</li>';
				
			}
		}
		else {
			$output .= '<li>';
			$slide_image = BRAWNY_PARENT_URL .'/images/slide1.png';
			$output .= '<div class="flex-image"><img src="' . esc_url( $slide_image ) . '" alt="" ></div>';
			$slide_description = sprintf( __('<h1>The Most Modern WordPress Theme</h1><h3> Slider Setting </h3><p>You haven\'t created any slider yet. Go to Customizer and click Home => FlexSlider Settings, edit or add  your images and Caption.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'brawny'),  admin_url('customize.php') );
			$output .= '<div class="flex-caption">' . $slide_description . '</div>';
			$output .= '</li>';
		}

		$output .= '</ul>';
		$output .= '</div><!-- .flexslider -->';
		$output .= '</div><!-- .flex-container -->';

		echo $output;

		$output = '';
		$output = '<div class="services">';
		$output .= '<div class="container">';    

	

		if ( get_theme_mod('service-icon-1') || get_theme_mod('service-title-1') || get_theme_mod('service-description-1') ) {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-1') ) . '"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">' . '<h3>' . esc_html( get_theme_mod('service-title-1') ) . '</h3>'. get_theme_mod('service-description-1') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} else {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">';
			$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -1.</p>', 'brawny' ), admin_url('customize.php') );
			$output .= '</div></div><!-- .one-third -->';
		}

		if ( get_theme_mod('service-icon-2') || get_theme_mod('service-title-2') || get_theme_mod('service-description-2') )  {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-2') ) . '"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">' . '<h3>' . esc_html( get_theme_mod('service-title-2')  ) . '</h3>' . get_theme_mod('service-description-2') . '</div>';
			$output .= '</div><!-- .one-third -->'; 
		} else {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">';
			$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -2.</p>', 'brawny' ), admin_url('customize.php') );
			$output .= '</div></div><!-- .one-third -->';
		}
		if ( get_theme_mod('service-icon-3') || get_theme_mod('service-title-3') || get_theme_mod('service-description-3') )  {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-3') ) . '"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">' . '<h3>' . esc_html( get_theme_mod('service-title-3')  ) . '</h3>'. get_theme_mod('service-description-3') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} else {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">';
			$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -3.</p>', 'brawny' ), admin_url('customize.php') );
			$output .= '</div></div><!-- .one-third -->';
		}

		$output .= '</div><!-- .container -->';
		$output .= '</div><!-- .services -->';

		echo $output;

?>
		<div class="container">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<h3 class="rp-title"><?php _e('Recent Posts','brawny'); ?></h3>
						<?php brawny_recent_posts(); ?>

	<?php
	
?>

				</main><!-- #main -->
			</div><!-- #primary -->
<?php
	get_footer();
}
?>
