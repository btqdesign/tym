<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package donald
 */

get_header(); ?>

    <?php if(donald_get_option('page_header')) { ?>
    <?php $img = donald_get_option( 'page_header_bg' ) ? donald_get_option( 'page_header_bg' ) : get_template_directory_uri().'/images/bg-subheader-blog.jpg'; ?>
    <!-- Subheader -->
    <section class="boxed no-padding bg-img " style="background-image: url(<?php echo esc_url($img); ?>);">
        <div class="sub-header depen-on-img">
            <img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
            <div class="sub-header-inner center-center">
                <h2><?php echo esc_html__('BLOG', 'donald'); ?></h2>               
            </div>
        </div>
    </section>
    <!-- /Subheader -->
    <?php } ?>
    <!-- Main Content -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    <div class="blog-list">
                        <?php if( have_posts() ) : ?>
                            <?php 
                                while (have_posts()) : the_post();
                                    get_template_part( 'content', get_post_format() ) ;
                                endwhile;
                            ?>
                            
                            <nav class="page-pagination style-1 text-center mgt-30">
                                <span class="current-page"></span>
                                <?php echo donald_pagination(); ?>    
                            </nav>

                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sidebar">
                        <?php get_sidebar();?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    

<?php get_footer(); ?>
