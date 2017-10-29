<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
    <header>
        <?php the_title( sprintf('<h1 class="tytuł"><a href="%s">', esc_url(get_permalink() ) ),'</a></h1>' ); ?>
    </header>
    
    
    <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?> </div>

    <p><?php the_content(); ?></p>

</article>