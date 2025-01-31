<?php
/*
Template Name: projet
Template Post Type: page
*/
get_template_part( 'template_parts/header' ); ?>

<main id="main-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post_article'); ?>>
                <div class="post_infos">
                    <div class="elementor-content">
                        <?php the_content(); ?>
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <div class="post_description">
                    <?php if (get_field('image_1')): 
                        $image_1 = get_field('image_1');
                    ?>
                        <div class="post_image">
                            <img src="<?php echo esc_url($image_1['url']); ?>" alt="<?php echo esc_attr($image_1['alt']); ?>" />
                    <?php endif; ?>

                    <?php if (get_field('image_2')): 
                        $image_2 = get_field('image_2'); 
                    ?>
                            <img src="<?php echo esc_url($image_2['url']); ?>" alt="<?php echo esc_attr($image_2['alt']); ?>" />
                        </div>
                    <?php endif; ?>
                        <!-- Champs personnalisés -->
                         <div class="post_field">
                            <?php if (get_field('nom')) : ?>
                                <h2><?php echo get_field('nom'); ?></h2>
                            <?php endif; ?>

                            <?php if (get_field('contexte')) : ?>
                                <div class="post_field-p">
                                    <h3 class="toggle-title">Contexte :<i class="fa fa-chevron-down"></i></h3>
                                    <div class="toggle-content"><?php echo get_field('contexte'); ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if (get_field('description')) : ?>
                                <div class="post_field-p">
                                    <h3 class="toggle-title">Description :<i class="fa fa-chevron-down"></i></h3>
                                    <div class="toggle-content"><?php echo get_field('description'); ?></div>
                                </div>
                            <?php endif; ?>
                            <div class="post_link">
                                <?php if (get_field('lien_github')) : ?>
                                    <a href="<?php echo get_field('lien_github'); ?>" target="_blank" class="btn-link">
                                        <i class="fab fa-github"></i>
                                        <span>Voir sur GitHub</span>
                                    </a>
                                <?php endif; ?>

                                <?php if (get_field('lien_site')) : ?>
                                    <a href="<?php echo get_field('lien_site'); ?>" target="_blank" class="btn-link">
                                        Visiter le site : <i class="fas fa-globe"></i>
                                    </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="post_related">
                        <?php 
                        $adjacent_posts = get_adjacent_posts_with_loop(get_the_ID());

                        // Article précédent
                        if ($adjacent_posts['previous']) :
                            $prev_post = $adjacent_posts['previous'];
                            $prev_post_thumbnail = get_the_post_thumbnail($prev_post->ID, 'thumbnail');
                            $prev_post_link = get_permalink($prev_post->ID);
                        ?>
                            <div class="post_related-previous">
                                <a href="<?php echo esc_url($prev_post_link); ?>">
                                    <i class="fa-solid fa-arrow-left-long arrow_left"></i>
                                </a>
                                <div class="post_related-left">
                                    <?php echo $prev_post_thumbnail; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php 
                        // Article suivant
                        if ($adjacent_posts['next']) :
                            $next_post = $adjacent_posts['next'];
                            $next_post_thumbnail = get_the_post_thumbnail($next_post->ID, 'thumbnail');
                            $next_post_link = get_permalink($next_post->ID);
                        ?>
                            <div class="post_related-next">
                                <a href="<?php echo esc_url($next_post_link); ?>">
                                <i class="fa-solid fa-arrow-right-long arrow_right"></i>
                                </a>
                                <div class="post_related-right">
                                    <?php echo $next_post_thumbnail; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        <?php endwhile; 
    endif; ?>
</main>

<?php get_template_part( 'template_parts/footer' ); ?>