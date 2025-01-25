<?php get_header(); ?>
<div id="main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
                    <a href="<?php the_permalink(); ?>" class="image featured"><?php the_post_thumbnail(); ?></a>
                <?php endif; ?>
                <p><?php the_content(); ?></p>
                <footer>
                            <ul class="actions">
                                <li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
                            </ul>
                            <ul class="stats">
                                <li><?php the_category(', '); ?></li>
                                <li><a href="#" class="icon solid fa-heart">0</a></li>
                                <li><a href="#" class="icon solid fa-comment"><?php comments_number('0', '1', '%'); ?></a></li>
                            </ul>
                        </footer>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.', 'greentech-solutions'); ?></p>
    <?php endif; ?>
</div>


<?php get_footer(); ?>
