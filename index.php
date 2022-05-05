    <?php get_header(); ?>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        $args = array('post_type' =>'slider' , 'showposts' => 3 );
        $my_slyder = get_posts( $args );
        $count = 0 ; if($my_slyder) : foreach ($my_slyder as $post) : setup_postdata( $post );

        ?>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?php echo $count ?>" <?php if($count == 0) : ?>
                class="active" aria-current="true" aria-label="Slide 1"<?php endif; ?>></button>
        <?php
        $count ++;
        endforeach;
        endif;

        ?>
    </div>
    <div class="carousel-inner">
        <?php

        $cont = 0 ; if($my_slyder) : foreach ($my_slyder as $post) : setup_postdata( $post );

        ?>
        <div class="carousel-item <?php if($cont == 0) echo "active"; ?>" data-bs-interval="10000">
            <?php the_post_thumbnail('full'); ?>

            <div class="carousel-caption d-none d-md-block">

                <h2><?php the_title(); ?></h2>
                <a class="leia-mais" href="<?php the_field ('link_do_slider'); ?>">LEIA MAIS</a>
            </div>
        </div>
        <?php
        $cont ++;
        endforeach;
        endif;


        ?>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="servicos">
  <div class="container">
    <div class="row">
        <?php
        $args = array('post_type' =>'servicos' , 'showposts' => 3 );
        $my_servicos = get_posts( $args );
        if($my_servicos) : foreach ($my_servicos as $post) : setup_postdata( $post );

        ?>
        <div class="col-md-4 col-lg-4">
            <i class="<?php the_field('icones'); ?>"></i>
            <h2><?php the_title(); ?></h2>
           <?php the_excerpt(); ?>

        </div>

        <?php

        endforeach;
        endif;

        ?>


    </div>

  </div>

</div>

    <div class="sobre">
        <div class="container">
            <div class="row">

                <?php
                $args = array('post_type' =>'page' , 'pagename' => 'sobre' );
                $my_sobre = get_posts( $args );
                if($my_sobre) : foreach ($my_sobre as $post) : setup_postdata( $post );

                    ?>
                    <div class="col-md-12 col-lg-12">
                    <h2><?php the_title(); ?></h2>
                    </div>

                    <div class="col-md-6 col-lg-6">

                        <?php the_content(); ?>

                    </div>

                    <div class="col-md-6 col-lg-6">
                        <?php the_post_thumbnail(false , array( 'class' => 'img-fluid')); ?>
                    </div>



                <?php

                endforeach;
                endif;

                ?>

            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <h2 class="title-blog">BLOG</h2>
            <div class="row">

                <?php
                $args = array('post_type' =>'post' , 'showposts' => 3 );
                $my_posts = get_posts( $args );
                if($my_posts) : foreach ($my_posts as $post) : setup_postdata( $post );

                    ?>
                    <div class="col-md-4 col-lg-4">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(false , array('class' => 'img-fluid')); ?></a>
                        <h2 class="titulo-posts-blog"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>

                    </div>

                <?php

                endforeach;
                endif;

                ?>
                <div class="clear"></div>
                <div class="link"><a class="leia-mais" href="">VEJA TODOS</a></div>

            </div>
        </div>

    </div>

<?php get_footer(); ?>
