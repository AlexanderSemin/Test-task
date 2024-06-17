<?php

function get_acf_img($field = '', $class = ''){
    $image = get_field($field);
    if( !empty( $image ) ) {
        return '<img src="'.esc_url($image['url']).'" class="' .$class.'" alt="'.esc_attr($image['alt']).'" />';
    }
}

function get_acf_sub_img($field = '', $class = ''){
    $image = get_sub_field($field);
    if( !empty( $image ) ) {
        return '<img src="'.esc_url($image['url']).'" class="' .$class.'" alt="'.esc_attr($image['alt']).'" />';
    }
}

function get_acf_background_image($fieldname){
    $background_image = '';
    if(get_field($fieldname)){
        $url = get_field($fieldname);
        $background_image = 'style="background-image: url('.$url.') "';
    }
    return $background_image;
}

function get_acf_button_group($fieldname){
    if( have_rows($fieldname) ):
        while( have_rows($fieldname) ): the_row();
            $hide = get_sub_field('hide_button');
            $button_title = get_sub_field('button_title');
            $button_url = get_sub_field('button_url');
            $button_style = get_sub_field('button_style');
            if(!$hide):
                ?>
                <a class="<?php echo $button_style; ?>" href="<?php echo $button_url; ?>">
                    <?php echo $button_title; ?></a>
            <?php
            endif;
        endwhile;
    endif;
}

