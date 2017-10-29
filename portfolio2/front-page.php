<?php get_header(); ?>
	<header>
		<div class="intro">
			<h1 class="slideIn">Witam</h1>
		</div>
		<div class="intro2">
			<canvas id="stars"></canvas>
			<h1 class="slideIn">Na mojej stronie</h1>
		</div>
	</header>
	<article>
		<?php
		$post_id = 103;
		$queried_post = get_post($post_id);
		$title = $queried_post->post_title;
		echo "<h1 class='slideIn'>",$title,"</h1>";
		echo "<p class='slideIn'>",$queried_post->post_content,"</p>";
		?>
	</article>
<div id="js-carousel" class="carousel slide" data-ride="carousel">                   
          <div class="carousel-inner" role="listbox">   
              <?php 

                $args = array(
                    'type' => 'posts',
                    'posts_per_page' => 3,
                    'category_name' => 'Karuzela',
                );

                $lastBlog = new WP_Query($args);
                if( have_posts() ):
                
                    $licz = 0;
                    $znacznik = '';

                    while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

                     <div class="carousel-item <?php if($licz == 0): echo 'active'; endif; ?>">
                        <?php the_post_thumbnail(); ?>
                        <div class="carousel-caption d-none d-md-block">
                            <?php the_title( sprintf('<h1 class="slider-title"><a href="%s">', esc_url(get_permalink() ) ),'</a></h1>' ); ?>
                        </div>
                    </div>
                   <?php $znacznik .= '<li data-target="#js-carousel" data-slide-to="'.$licz.'" class="'; ?>
                   <?php if($licz == 0): $znacznik .='active'; endif; ?> 
                    <?php $znacznik .='"></li>'; ?>
               <?php  $licz++;  endwhile;

            endif;    

            wp_reset_postdata(); 
              
             
            ?>               
            <ol class="carousel-indicators">
                <?php echo $znacznik; ?>
            </ol>

          </div>
            
          <a class="carousel-control-prev" href="#js-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#js-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

    
<?php get_footer(); ?>
