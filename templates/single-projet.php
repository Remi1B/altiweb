<?php
/*
Template Name: projet
*/ 
get_template_part( 'template_parts/header' ); ?>

<main id="main-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post_article'); ?>>
                <div class="post_infos">
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
                                <h2><?php the_field('nom'); ?></h2>
                            <?php endif; ?>

                            <?php if (get_field('contexte')) : ?>
                                <div class="post_field-p">
                                    <h3 class="toggle-title">Contexte :<i class="fa fa-chevron-down"></i></h3>
                                    <div class="toggle-content"><?php the_field('contexte'); ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if (get_field('description')) : ?>
                                <div class="post_field-p">
                                    <h3 class="toggle-title">Description :<i class="fa fa-chevron-down"></i></h3>
                                    <div class="toggle-content"><?php the_field('description'); ?></div>
                                </div>
                            <?php endif; ?>
                            <div class="post_link">
                                <?php if (get_field('lien_github')) : ?>
                                    <a href="<?php the_field('lien_github'); ?>" target="_blank" class="btn-link">
                                        <i class="fab fa-github"></i>
                                        <span>Voir sur GitHub</span>
                                    </a>
                                <?php endif; ?>

                                <?php if (get_field('lien_site')) : ?>
                                    <a href="<?php the_field('lien_site'); ?>" target="_blank" class="btn-link">
                                        Visiter le site : <i class="fas fa-globe"></i>
                                    </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; 
    endif; ?>
</main>

<?php get_template_part( 'template_parts/footer' ); ?>