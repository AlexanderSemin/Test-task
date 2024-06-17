<div class="post-card">

    <div class="post-card__image">
        <div class="post-card__date">
            <span class="post-card__date_day"><?php echo get_the_date('d'); ?></span>
            <?php echo  get_the_date('M'); ?>
        </div>

        <?php echo get_the_post_thumbnail() ?>

    </div>

    <?php
    $categories = get_the_category();

    if( $categories[0] ) {
        echo '<a class="post-card__category" href="' . get_category_link( $categories[0]->term_id ) . '">' . $categories[0]->name . '</a>';
    }

    ?>

    <a href="<?php the_permalink(); ?>" class="h2 post-card__title">
        <?php the_title(); ?>
    </a>

    <div class="post-card__posted_by">
        <p class="post-card__posted_by-text">
            <?php _e('Posted by', 'jewellery');?>
        </p>

        <?php $author_id = get_the_author_meta('ID'); ?>
        <?php $user_photo = get_field('user_photo', 'user_'. $author_id); ?>

        <img class="post-card__posted_by-avatar" src="<?php echo $user_photo['sizes']['user_logo']; ?>" alt="<?php echo get_the_author(); ?>">

        <p class="post-card__posted_by-text">
            <?php echo get_the_author(); ?>
        </p>
    </div>

    <div class="post-card__expert">
        <?php theme_excerpt(); ?>
    </div>

    <a class="post-card__permalink" href="<?php the_permalink(); ?>">
        <?php _e('Continue reading', 'jewellery'); ?>
    </a>

</div>

