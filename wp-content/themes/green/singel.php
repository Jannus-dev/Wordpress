<?php get_header(); ?>
<div id="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="post">
            <header>
                <div class="title">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_excerpt(); ?></p>
                </div>
                <div class="meta">
                    <time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                    <a href="#" class="author">
                        <span class="name"><?php the_author(); ?></span>
                        <?php echo get_avatar(get_the_author_meta('ID'), 50); ?>
                    </a>
                </div>
            </header>
            <?php if (has_post_thumbnail()) : ?>
                <span class="image featured"><?php the_post_thumbnail(); ?></span>
            <?php endif; ?>
            <p><?php the_content(); ?></p>
        </article>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
