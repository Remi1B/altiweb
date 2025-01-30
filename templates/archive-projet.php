<?php
/* Template Name: Page des Projets */
get_template_part( 'template_parts/header' ); ?>

<main class="container">
    <h1>Mes Projets</h1>

    <?php
    $args = array(
        'post_type'      => 'projet',
        'posts_per_page' => 10
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <div class="grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="project-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <h2><?php the_title(); ?></h2>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php echo paginate_links(array('total' => $query->max_num_pages)); ?>
        </div>

    <?php else : ?>
        <p>Aucun projet pour le moment.</p>
    <?php endif;
    wp_reset_postdata(); ?>

</main>

<?php get_template_part( 'template_parts/footer' ); ?>
