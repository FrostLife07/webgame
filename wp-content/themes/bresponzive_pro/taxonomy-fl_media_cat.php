<?php get_header(); ?>		
<?php global $data; ?>

<div id="blocks-wrapper" class="clearfix">

    <!--Archive content-->
    <!-- .blogposts-wrapper-->

    <h2 class="blogpost-wrapper-title">
        <?php if (is_tax('fl_media_cat')): ?>
            <?php printf(__('%s', 'iz_theme'), single_term_title('', false)) ?>
        <?php endif; ?>
    </h2> 
    <?php //include_once('includes/blog_loop.php'); ?>


    <?php if (have_posts()): ?> 
            
    <div id="main-active-media">
        <?php while (have_posts()): the_post(); ?>
                <div class="slide media" >
                    
                        <div class="image">
                            <?php if(wp_attachment_is_image()){ ?>
                            <a href="<?php  the_permalink() ?>"><?php echo wp_get_attachment_image(get_the_ID(), '') ?></a>
                            <?php }else{ ?>
                            <video controls="controls">
                                <source src="<?php echo wp_get_attachment_url(get_the_ID()) ?>" />
                            </video>
                            <?php } ?>
                        </div>
                </div>
                <?php
            endwhile;
            ?>
    </div>
    
        <div class="list-medias">
            <?php $i=0; while (have_posts()): the_post(); ?>
                <div class="slide media" >
                    <a data-slide-index="<?php echo $i ?>" href="<?php the_permalink() ?>">
                        <div class="image">
                            <?php if(wp_attachment_is_image()){ ?>
                            <?php echo wp_get_attachment_image(get_the_ID(), '') ?>
                            <?php }else{ ?>
                            <video controls="controls">
                                <source src="<?php echo wp_get_attachment_url(get_the_ID()) ?>" />
                            </video>
                            <?php } ?>
                        </div>
                    </a>
                </div>
                <?php
                $i++;
            endwhile;
            ?>
        </div>

        <?php
    else:
        ?>

<?php endif; ?>

</div>
<!-- END MAIN -->
<?php get_footer(); ?>