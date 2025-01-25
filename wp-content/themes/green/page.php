<?php get_header(); ?>
<div id="main">
    <article class="page">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>
        <section>
            <?php the_content(); ?>
        </section>
    </article>
</div>
<?php get_footer(); ?>
