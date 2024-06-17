<?php


function single_add_to_cart_link(){
	global $woocommerce;

	$product_id = htmlspecialchars($_POST['product_id']);
	$qty = htmlspecialchars($_POST['qty']);

	$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $qty );
	$product_status    = get_post_status( $product_id );

	if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $qty ) && 'publish' === $product_status ) {
		do_action( 'woocommerce_ajax_added_to_cart', $product_id );
		wc_add_to_cart_message( $product_id );

	} else {
		$data = array(
			'error'       => true,
			'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
		);

		wp_send_json( $data );
	}
}
add_action('wp_ajax_single_add_to_cart_link', 'single_add_to_cart_link');
add_action('wp_ajax_nopriv_single_add_to_cart_link', 'single_add_to_cart_link');



function mini_cart(){
    global $woocommerce;

	$count = 0;
	$price_total = '';
	 if(!empty(WC()->cart->cart_contents)){
		 $count = WC()->cart->get_cart_contents_count();
         $price_total = wc_price(WC()->cart->get_cart_contents_total());
    }


	 echo json_encode(array('count' => $count, 'price_total' => $price_total ));
	die();
}
add_action('wp_ajax_mini_cart', 'mini_cart');
add_action('wp_ajax_nopriv_mini_cart', 'mini_cart');




