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
                    <h2><?php the_title(); ?></h2>
                    <div class="post_description">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        <!-- Champs personnalisés -->
                         <div class="field">
                            <?php if (get_field('nom')) : ?>
                                <h2>Nom du projet : <?php the_field('nom'); ?></h2>
                            <?php endif; ?>

                            <?php if (get_field('contexte')) : ?>
                                <div class="contexte"><h3>Contexte : </h3><div class="contexte_p"><?php the_field('contexte'); ?></div></div>
                            <?php endif; ?>

                            <?php if (get_field('description')) : ?>
                                <div class="description"><h3>Description : </h3><div class="description_p"><?php the_field('description'); ?></div></div>
                            <?php endif; ?>

                            <?php if (get_field('lien_github')) : ?>
                                <p><strong>Lien GitHub : </strong><a href="<?php the_field('lien_github'); ?>" target="_blank">Voir le dépôt</a></p>
                            <?php endif; ?>

                            <?php if (get_field('lien_site')) : ?>
                                <p><strong>Lien du site : </strong><a href="<?php the_field('lien_site'); ?>" target="_blank">Visiter le site</a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; 
    endif; ?>
</main>

<?php get_template_part( 'template_parts/footer' ); ?>