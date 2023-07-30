<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.5.1
 */

defined( 'ABSPATH' ) || exit; 

 get_header( 'shop' ); ?>
	
		<h1 class="page-title bloggerwp_shop_banner_sec"><?php woocommerce_page_title(); ?></h1>


<?php 
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
?>
<div class="bloggerwp_shop_main_sec container">
		<div class="shop_listing">
			
			<div class="shop_grid">
				<?php
				if ( woocommerce_product_loop() ) {

					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) { the_post();
							do_action( 'woocommerce_shop_loop' );
							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					do_action( 'woocommerce_after_shop_loop' );
					
				} else {
					
					do_action( 'woocommerce_no_products_found' );
				}
				
				do_action( 'woocommerce_after_main_content' );?>
			</div>
		</div>
</div>
<?php 
get_footer( 'shop' );