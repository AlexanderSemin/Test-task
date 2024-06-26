( function( $ ) {
    $( document ).ready(function() {
        $('.navbar_toggler').on('click',function (){
            $('.header__nav').addClass('active')
            $('body').addClass('hidden_body');
            $('.navbar_overlay').show();
        })

        $('.header__nav_close').on('click',function (){
            $('.header__nav').removeClass('active')
            $('body').removeClass('hidden_body');
            $('.navbar_overlay').hide();
        })

        $(".navbar_overlay").on('click',function (){
            $('body').removeClass('hidden_body');
            $(this).hide();
            $('.header__nav').removeClass('active');
        });

        $('.js-open_search').click(function (event) {
            $(".header__search-form").hasClass("open")
                ? $(".header__search-form").removeClass('open')
                : $(".header__search-form").addClass('open');

        });

        $('.header__search-form_input').on('keyup keypress blur change', function (event) {
            $(this).val() != ''
                ? $(".header__search-form_button").css('z-index', '12')
                : $(".header__search-form_button").css('z-index', '1');

        });

        const featuredProductsSwiper = new Swiper(".featured-products__swiper", {
            slidesPerView: 1,
            spaceBetween: 12,
            navigation: {
                prevEl: ".swiper-button-prev-product",
                nextEl: ".swiper-button-next-product",
            },
            breakpoints: {
                992: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                1201: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                }
            }
        });

        const postsSwiper = new Swiper(".posts-swiper", {
            slidesPerView: 1,
            spaceBetween: 12,
            navigation: {
                prevEl: ".swiper-button-prev-post",
                nextEl: ".swiper-button-next-post",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1201: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            }
        });

        function showOverlay(){
            $('.main_overlay').addClass('active');
        }

        function hideOverlay(){
            $('.main_overlay').removeClass('active');
        }


        $('.single_add_to_cart_link').click(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: front_ajax_object.ajax_url,
                dataType: 'json',
                data: {
                    'action': 'single_add_to_cart_link',
                    'product_id' : $(this).attr('data-attr-id'),
                    'qty' : $(this).attr('data-attr-qty'),
                },
                beforeSend: function (){
                    showOverlay();
                },
                success: function (response) {

                    hideOverlay();
                    $( document.body ).trigger( 'updated_cart_totals' );
                }
            });

        });


        jQuery(document.body).on('removed_from_cart updated_cart_totals', function () {

            $.ajax({
                type: 'POST',
                url: front_ajax_object.ajax_url,
                dataType: 'json',
                data: {
                    'action': 'mini_cart',
                },
                success: function (response) {

                    $('.header__cart_product_count').html(response.count)
                    $('.header__cart_checkout_total').html(response.price_total)

                }
            });
        });


    });
}( jQuery ) );


