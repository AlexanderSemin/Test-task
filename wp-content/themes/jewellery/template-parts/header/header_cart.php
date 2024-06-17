<a href="<?php echo home(); ?>/cart/" class="header__cart">
	<?php
        $items_count = 0;
        $price_total = get_woocommerce_currency_symbol() . '0.00';
        if(!empty(WC()->cart->cart_contents)) {
            $items_count = WC()->cart->get_cart_contents_count();
            $price_total = wc_price(WC()->cart->get_cart_contents_total());
        }
	?>

	<div class="header__cart_ico">
		<span class="header__cart_product_count"><?php echo $items_count ? $items_count : '0'; ?></span>
	</div>
    <p class="header__cart_checkout_total">
       <?php echo $price_total; ?>
    </p>
</a>

