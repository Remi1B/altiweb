<?php
/* Template Name: Page des Projets */
get_template_part( 'template_parts/header' ); ?>

<main class="container">
    <div class="elementor-content">
        <?php the_content(); ?>
    </div>
    <?php
    $args = array(
        'post_type'      => 'projet',
        'posts_per_page' => 10
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="swiper-slide">
                        <article class="project-card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <h2><?php the_title(); ?></h2>
                            </a>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination et navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    <?php else : ?>
        <p>Aucun projet pour le moment.</p>
    <?php endif;
    wp_reset_postdata(); ?>
</main>

<?php get_template_part( 'template_parts/footer' ); ?>
