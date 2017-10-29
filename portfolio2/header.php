<!doctype html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title>
            <?php if( is_front_page() ):
                 bloginfo('name');  
            else:
               echo '<', wp_title(''), ' >';
            endif;
        ?>
        </title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    
    <?php if( is_front_page() ):
        $klasy = array( 'glowna');
    else:
        $klasy = array( 'menu-active' );
    endif; ?>
    <body <?php body_class( $klasy); ?>>
        <div class="se-pre-con"></div>

        <!-- Navigation -->
<nav>

    <?php if( is_front_page() ):
                 bloginfo('name');  
            else:
               echo '<', wp_title(''), ' >';
            endif;
        ?>
        <?php wp_nav_menu(array('theme_location'=>'głowne',
                                'container'=>false,
                                'menu_class' => 'navbar-nav',
                                'menu_id' => 'glowne-menu',
                                'walker' => new Walker_menu_bs()
                                )); 
                            ?>
</nav>
<!-- Content panel -->

<div id="content">
    <div id="preloader">
        <div id="loader"></div>
    </div>
    
	

        
        
        
        
                    
