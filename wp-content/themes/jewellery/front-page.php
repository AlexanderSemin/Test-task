<?php
get_header();

?>
<section class="hero section" <?php echo get_acf_background_image('hero_section_background_image') ?> >
    <div class="container">
        <div class="hero__inner">
                <p class="hero__subtitle subtitle"><?php the_field('hero_subtitle'); ?></p>
                <h1><?php the_field('hero_title'); ?></h1>
                <p class="hero__description"><?php the_field('hero_description'); ?></p>
                <div class="hero__buttons">
                    <?php get_acf_button_group('hero_buttons'); ?>
                    <?php get_acf_button_group('hero_buttons_second'); ?>
                </div>
        </div>
        <?php get_field('hero_section_background_image'); ?>
    </div>
</section>

<section class="featured-products section">
    <div class="container">
        <div class="section-title">
            <p class="featured_product__subtitle subtitle"><?php the_field('featured_product_subtitle'); ?></p>
            <h2><?php the_field('featured_product_title'); ?></h2>
            <p class="featured_product__description"><?php the_field('featured_product_description'); ?></p>
        </div>

        <div class="featured-products__inner">
            <div class="card-product-ad">

                <?php
                $product_ad_id = get_field('product_ad');
                $product = wc_get_product( $product_ad_id['product'] );
                ?>

                <?php echo get_the_post_thumbnail( $product_ad_id['product'], 'full'); ?>

                <div class="card-product-ad__inner">
                    <h2 class="card-product-ad__title"><?php echo $product->get_title(); ?></h2>

                    <p><?php echo $product_ad_id['details_ad']; ?></p>

                    <a class="card-product-ad__permalink single_add_to_cart_link"
                       data-attr-qty='1' data-attr-id='<?php echo $product_ad_id['product']; ?>'
                       href="#"><?php _e('Shop Now', 'jewellery'); ?>
                    </a>

                </div>
            </div>


            <div class="swiper_custom_arrow">
                <div class="swiper-button-prev swiper-button-prev-product"></div>
                <div class="featured-products__swiper swiper">
                    <div class="featured-products__swiper-inner swiper-wrapper">

                        <?php

                        $featured_product_slider = get_field('featured_product_slider');
                        $featured_product_slider_category = $featured_product_slider['featured_product_slider_category'];
                        $featured_items_count = $featured_product_slider['featured_product_slider_items'];

                        $args = array(
                            'numberposts' => $featured_items_count,
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => $featured_product_slider_category,
                                ),
                            ),
                        );
                        $products = get_posts( $args );

                        foreach ( $products as $post ) : setup_postdata( $post ); ?>

                            <div class="swiper-slide">

                                <div class="product-card">
                                    <?php global $product; ?>

                                    <div class="product-card__image">
                                        <?php echo get_the_post_thumbnail( $post->ID, 'product_middle'); ?>

                                        <div class="product-card__buttons">
                                            <a href='#' class='single_add_to_cart_link' title="Add to cart"
                                               data-attr-qty='1' data-attr-id='<?php echo $post->ID; ?>' ></a>
                                        </div>
                                    </div>

                                    <div class="product-card__caption">
                                        <a class="product-card__title h5" href="<?php echo the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>

                                        <?php $terms = get_the_terms( $post->ID, 'product_cat' ); ?>

                                        <p><?php echo $terms[0]->name; ?></p>

                                        <p class="product-card__price price"><?php  echo $product->get_price_html(); ?></p>
                                    </div>
                                </div>

                            </div>

                        <?php endforeach;

                        wp_reset_postdata();
                        ?>

                    </div>
                </div>
                <div class="swiper-button-next swiper-button-next-product"></div>
            </div>

        </div>
    </div>
</section>

<section class="special-offer section">
    <div class="container">
        <div class="special-offer__inner">

            <?php

            $special_offer = get_field('special_offer');

            if( $special_offer ):
                while( have_rows('special_offer') ): the_row();
                    ?>

                    <div class="special-offer__card" style="background-image: url('<?php echo $special_offer['special_offer_image']['url'] ?>') ">
                        <div class="special-offer__card_inner">
                            <p class="special-offer__card_subtitle subtitle"><?php echo $special_offer['special_offer_subtitle']; ?></p>

                            <p class="special-offer__card_title h1"><?php echo $special_offer['special_offer_title']; ?></p>

                            <p class="special-offer__card_description h3"><?php echo $special_offer['special_offer_description']; ?></p>

                            <?php get_acf_button_group('special_offer_button'); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <div class="special-offer__products">
                <div>
                    <h3 class="special-offer__title"><?php the_field('special_offer_featured_products_title'); ?></h3>

                    <div class="products-list">

                        <?php
                        $args = array(
                            'numberposts' => '3',
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'featured',
                                ),
                            ),
                        );
                        $products = get_posts( $args );

                        foreach ( $products as $post ) : setup_postdata( $post ); ?>

                            <div class="products-list__item">
                                <?php global $product; ?>

                                <a href="<?php the_permalink(); ?>" class="products-list__item_image">
                                    <?php echo get_the_post_thumbnail( $post->ID, 'product_thumbnail'); ?>
                                </a>

                                <div class="products-list__item_caption">
                                    <a class="products-list__item_title h5" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <p class="products-list__item_price price"><?php echo $product->get_price_html(); ?></p>
                                </div>

                            </div>

                        <?php endforeach;

                        wp_reset_postdata();
                        ?>

                    </div>
                </div>

                <div>
                    <h3 class="special-offer__title"><?php the_field('special_offer_new_products_title'); ?></h3>

                    <div class="products-list">

                        <?php
                        $args = array(
                            'posts_per_page' => '3',
                            'post_type' => 'product',
                            'post_status' => 'publish',

                        );
                        $products = get_posts( $args );

                        foreach ( $products as $post ) : setup_postdata( $post ); ?>

                            <div class="products-list__item">
                                <?php global $product; ?>

                                <a href="<?php the_permalink(); ?>" class="products-list__item_image">
                                    <?php echo get_the_post_thumbnail( $post->ID, 'product_thumbnail'); ?>
                                </a>

                                <div class="products-list__item_caption">
                                    <a class="products-list__item_title h5" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <p class="products-list__item_price price"><?php echo $product->get_price_html(); ?></p>
                                </div>

                            </div>

                        <?php endforeach;

                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="blog-section section">
    <div class="container">
        <div class="section-title">
            <p class="subtitle"><?php the_field('jewelry_design_blog_subtitle'); ?></p>
            <h2><?php the_field('jewelry_design_blog_title'); ?></h2>
            <p><?php the_field('jewelry_design_blog_description'); ?></p>
        </div>

        <div class="swiper_custom_arrow">
            <div class="swiper-button-prev swiper-button-prev-post"></div>
            <div class="posts-swiper swiper">
                <div class="posts-swiper__inner swiper-wrapper">
                    <?php
                    if (get_field('jewelry_design_blog_post')){
                        $ids = get_field('jewelry_design_blog_post');
                        $args= [
                            'post_type' => 'post',
                            'post__in' => $ids
                        ];
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {

                            while ( $query->have_posts() ) :
                                $query->the_post();
                                ?>
                                <div class="swiper-slide">
                                    <?php
                                    get_template_part( 'template-parts/front-page/post' );
                                    ?>
                                </div>
                            <?php
                            endwhile;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="swiper-button-next swiper-button-next-post"></div>
        </div>

    </div>
</section>

<?php
get_footer();
?>